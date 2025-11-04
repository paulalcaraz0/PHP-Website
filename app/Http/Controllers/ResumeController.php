<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resume;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ResumeController extends Controller
{
    // Show edit form (dashboard) - PRIVATE (requires login)
    public function edit($id)
    {
        try {
            // Get the user from the ID
            $user = User::findOrFail($id);
            
            // Security check: Make sure the logged-in user can only edit their own resume
            if (Auth::id() !== (int)$id) {
                abort(403, 'Unauthorized action.');
            }
            
            // Log for debugging
            Log::info('User accessing edit page:', ['user_id' => $user->id]);
            
            // Get user's resume (or null if doesn't exist)
            $resume = $user->resume;
            
            // Log resume status
            Log::info('Resume status:', ['has_resume' => $resume !== null]);
            
            // Check if view exists
            if (!view()->exists('edit-resume')) {
                return response('View edit-resume.blade.php not found!', 500);
            }
            
            return view('edit-resume', compact('resume'));
            
        } catch (\Exception $e) {
            // Show the actual error
            return response('Error: ' . $e->getMessage() . '<br><br>File: ' . $e->getFile() . '<br>Line: ' . $e->getLine(), 500);
        }
    }
    
    // Save/Update resume data - PRIVATE
    public function update(Request $request, $id)
    {
        try {
            // Get the user from the ID
            $user = User::findOrFail($id);
            
            // Security check: Make sure the logged-in user can only update their own resume
            if (Auth::id() !== (int)$id) {
                abort(403, 'Unauthorized action.');
            }
            
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'title' => 'required|string|max:255',
                'phone' => 'required|string|max:20',
                'email' => 'required|email|max:255',
                'location' => 'required|string|max:255',
                'summary' => 'required|string',
                'skills' => 'required|array',
                'skills.*' => 'string',
                'project_titles' => 'nullable|array',
                'project_descriptions' => 'nullable|array',
                'schools' => 'nullable|array',
                'degrees' => 'nullable|array',
                'org_names' => 'nullable|array',
                'org_roles' => 'nullable|array',
                'profile_picture' => 'nullable|image|max:2048'
            ]);
            
            // Process projects (combine titles and descriptions)
            $projects = [];
            if ($request->project_titles && $request->project_descriptions) {
                foreach ($request->project_titles as $index => $title) {
                    if (!empty($title)) {
                        $projects[$title] = $request->project_descriptions[$index] ?? '';
                    }
                }
            }
            
            // Process education (combine schools and degrees)
            $education = [];
            if ($request->schools && $request->degrees) {
                foreach ($request->schools as $index => $school) {
                    if (!empty($school)) {
                        $education[$school] = $request->degrees[$index] ?? '';
                    }
                }
            }
            
            // Process organizations (combine names and roles)
            $organizations = [];
            if ($request->org_names && $request->org_roles) {
                foreach ($request->org_names as $index => $org) {
                    if (!empty($org)) {
                        $organizations[$org] = $request->org_roles[$index] ?? '';
                    }
                }
            }
            
            // Prepare data for saving
            $data = [
                'name' => $validated['name'],
                'title' => $validated['title'],
                'phone' => $validated['phone'],
                'email' => $validated['email'],
                'location' => $validated['location'],
                'summary' => $validated['summary'],
                'skills' => $validated['skills'],
                'projects' => $projects,
                'education' => $education,
                'organizations' => $organizations,
            ];
            
            // Handle profile picture upload
            if ($request->hasFile('profile_picture')) {
                // Delete old picture if exists
                if ($user->resume && $user->resume->profile_picture) {
                    Storage::disk('public')->delete($user->resume->profile_picture);
                }
                
                $path = $request->file('profile_picture')->store('profile_pictures', 'public');
                $data['profile_picture'] = $path;
            }
            
            // Update or create resume
            Resume::updateOrCreate(
                ['user_id' => $user->id],
                $data
            );
            
            return redirect()->route('resume.edit', ['id' => $user->id])
                ->with('success', 'Resume updated successfully!');
                
        } catch (\Exception $e) {
            return redirect()->route('resume.edit', ['id' => $id])
                ->with('error', 'Error: ' . $e->getMessage());
        }
    }
    
    // Public view - NO LOGIN REQUIRED
    public function show($id)
    {
        try {
            $resume = Resume::where('user_id', $id)->firstOrFail();
            return view('public-resume', compact('resume'));
        } catch (\Exception $e) {
            return response('Resume not found or error: ' . $e->getMessage(), 404);
        }
    }
    
    // Preview own resume (before making it public)
    public function preview($id)
    {
        try {
            // Get the user from the ID
            $user = User::findOrFail($id);
            
            // Security check: Make sure the logged-in user can only preview their own resume
            if (Auth::id() !== (int)$id) {
                abort(403, 'Unauthorized action.');
            }
            
            $resume = $user->resume;
            
            if (!$resume) {
                return redirect()->route('resume.edit', ['id' => $user->id])
                    ->with('error', 'Please create your resume first.');
            }
            
            return view('public-resume', compact('resume'));
        } catch (\Exception $e) {
            return redirect()->route('resume.edit', ['id' => $id])
                ->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
