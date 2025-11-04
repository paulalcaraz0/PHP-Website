<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Your Resume</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 30px 10px;
            font-family: 'Segoe UI', sans-serif;
        }
        .container {
            max-width: 900px;
        }
        .card {
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            border: none;
            margin-bottom: 30px;
        }
        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 20px 20px 0 0 !important;
            padding: 25px;
        }
        .card-header h2 {
            margin: 0;
            font-weight: 700;
        }
        .card-body {
            padding: 30px;
        }
        .form-label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }
        .form-control, .form-select {
            border-radius: 10px;
            border: 2px solid #e0e0e0;
            padding: 12px;
            transition: all 0.3s;
        }
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        textarea.form-control {
            min-height: 120px;
        }
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 12px 40px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
        }
        .btn-secondary {
            background: #6c757d;
            border: none;
            padding: 12px 40px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s;
        }
        .btn-secondary:hover {
            background: #5a6268;
            transform: translateY(-2px);
        }
        .btn-success {
            background: #28a745;
            border: none;
            padding: 12px 40px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s;
        }
        .btn-success:hover {
            background: #218838;
            transform: translateY(-2px);
        }
        .btn-danger {
            background: #dc3545;
            border: none;
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 0.9rem;
            transition: all 0.3s;
        }
        .alert {
            border-radius: 15px;
            padding: 15px 20px;
            margin-bottom: 20px;
        }
        .dynamic-field {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 15px;
            border: 2px solid #e0e0e0;
        }
        .profile-preview {
            max-width: 150px;
            max-height: 150px;
            border-radius: 10px;
            margin-top: 10px;
            border: 3px solid #667eea;
        }
        .section-divider {
            margin: 30px 0;
            border-top: 2px solid #e0e0e0;
        }
        .logout-btn {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
        }
        .yes-no-group {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }
        .yes-no-btn {
            flex: 1;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            background: white;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
            max-width: 200px;
        }
        .yes-no-btn:hover {
            border-color: #667eea;
            background: #f8f9fa;
        }
        .yes-no-btn.active {
            background: #667eea;
            color: white;
            border-color: #667eea;
        }
        .projects-section {
            display: none;
            animation: slideDown 0.3s ease-out;
        }
        .projects-section.show {
            display: block;
        }
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @media (max-width: 768px) {
            .card-body {
                padding: 20px;
            }
            .logout-btn {
                position: static;
                margin-bottom: 20px;
            }
            .yes-no-group {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Logout Button -->
        <div class="text-end logout-btn">
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>

        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-triangle"></i>
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Edit Resume Form -->
        <div class="card">
            <div class="card-header">
                <h2><i class="fas fa-edit"></i> Edit Your Resume</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('resume.update', ['id' => Auth::id()]) }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Personal Information -->
                    <h4 class="mb-3"><i class="fas fa-user"></i> Personal Information</h4>
                    
                    <div class="mb-3">
                        <label class="form-label">Full Name *</label>
                        <input type="text" name="name" class="form-control" 
                               value="{{ old('name', $resume->name ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Professional Title *</label>
                        <input type="text" name="title" class="form-control" 
                               placeholder="e.g., Computer Science Student, Web Developer"
                               value="{{ old('title', $resume->title ?? '') }}" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Phone Number *</label>
                            <input type="text" name="phone" class="form-control" 
                                   value="{{ old('phone', $resume->phone ?? '') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email *</label>
                            <input type="email" name="email" class="form-control" 
                                   value="{{ old('email', $resume->email ?? '') }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Location *</label>
                        <input type="text" name="location" class="form-control" 
                               placeholder="City, Province/State"
                               value="{{ old('location', $resume->location ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Profile Picture</label>
                        <input type="file" name="profile_picture" class="form-control" accept="image/*">
                        @if($resume && $resume->profile_picture)
                            <img src="{{ asset('storage/' . $resume->profile_picture) }}" 
                                 alt="Current Profile" class="profile-preview">
                        @endif
                    </div>

                    <div class="section-divider"></div>

                    <!-- Professional Summary -->
                    <h4 class="mb-3"><i class="fas fa-align-left"></i> Professional Summary</h4>
                    <div class="mb-3">
                        <label class="form-label">Summary *</label>
                        <textarea name="summary" class="form-control" required>{{ old('summary', $resume->summary ?? '') }}</textarea>
                    </div>

                    <div class="section-divider"></div>

                    <!-- Skills -->
                    <h4 class="mb-3"><i class="fas fa-code"></i> Skills</h4>
                    <div id="skills-container">
                        @if($resume && $resume->skills)
                            @foreach($resume->skills as $index => $skill)
                                <div class="dynamic-field mb-2">
                                    <div class="input-group">
                                        <input type="text" name="skills[]" class="form-control" 
                                               value="{{ $skill }}" required>
                                        <button type="button" class="btn btn-danger remove-field">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="dynamic-field mb-2">
                                <div class="input-group">
                                    <input type="text" name="skills[]" class="form-control" 
                                           placeholder="e.g., Python, JavaScript" required>
                                    <button type="button" class="btn btn-danger remove-field">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>
                    <button type="button" class="btn btn-secondary btn-sm mt-2" id="add-skill">
                        <i class="fas fa-plus"></i> Add Skill
                    </button>

                    <div class="section-divider"></div>

                    <!-- Projects Question -->
                    <h4 class="mb-3"><i class="fas fa-project-diagram"></i> Do you have any projects?</h4>
                    <div class="yes-no-group">
                        <button type="button" class="yes-no-btn" data-project="yes">
                            <i class="fas fa-check"></i> Yes
                        </button>
                        <button type="button" class="yes-no-btn active" data-project="no">
                            <i class="fas fa-times"></i> No
                        </button>
                    </div>

                    <!-- Projects Section (Conditional) -->
                    <div id="projects-section" class="projects-section">
                        <div id="projects-container">
                            @if($resume && $resume->projects)
                                @foreach($resume->projects as $title => $description)
                                    <div class="dynamic-field mb-3">
                                        <input type="text" name="project_titles[]" class="form-control mb-2" 
                                               placeholder="Project Title" value="{{ $title }}">
                                        <textarea name="project_descriptions[]" class="form-control mb-2" 
                                                  placeholder="Project Description" rows="2">{{ $description }}</textarea>
                                        <button type="button" class="btn btn-danger btn-sm remove-field">
                                            <i class="fas fa-times"></i> Remove
                                        </button>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <button type="button" class="btn btn-secondary btn-sm" id="add-project">
                            <i class="fas fa-plus"></i> Add Project
                        </button>
                        <div class="section-divider"></div>
                    </div>

                    <!-- Education -->
                    <h4 class="mb-3"><i class="fas fa-graduation-cap"></i> Education (Optional)</h4>
                    <div id="education-container">
                        @if($resume && $resume->education)
                            @foreach($resume->education as $school => $degree)
                                <div class="dynamic-field mb-3">
                                    <input type="text" name="schools[]" class="form-control mb-2" 
                                           placeholder="School Name" value="{{ $school }}">
                                    <input type="text" name="degrees[]" class="form-control mb-2" 
                                           placeholder="Degree/Program" value="{{ $degree }}">
                                    <button type="button" class="btn btn-danger btn-sm remove-field">
                                        <i class="fas fa-times"></i> Remove
                                    </button>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <button type="button" class="btn btn-secondary btn-sm" id="add-education">
                        <i class="fas fa-plus"></i> Add Education
                    </button>

                    <div class="section-divider"></div>

                    <!-- Organizations -->
                    <h4 class="mb-3"><i class="fas fa-users"></i> Organizations (Optional)</h4>
                    <div id="organizations-container">
                        @if($resume && $resume->organizations)
                            @foreach($resume->organizations as $org => $role)
                                <div class="dynamic-field mb-3">
                                    <input type="text" name="org_names[]" class="form-control mb-2" 
                                           placeholder="Organization Name" value="{{ $org }}">
                                    <input type="text" name="org_roles[]" class="form-control mb-2" 
                                           placeholder="Your Role" value="{{ $role }}">
                                    <button type="button" class="btn btn-danger btn-sm remove-field">
                                        <i class="fas fa-times"></i> Remove
                                    </button>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <button type="button" class="btn btn-secondary btn-sm" id="add-organization">
                        <i class="fas fa-plus"></i> Add Organization
                    </button>

                    <div class="section-divider"></div>

                    <!-- Action Buttons -->
                    <div class="d-flex gap-3 justify-content-center mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Save Resume
                        </button>
                        <a href="{{ route('resume.preview', ['id' => Auth::id()]) }}" class="btn btn-success">
                            <i class="fas fa-eye"></i> Preview Resume
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Project Yes/No Toggle
        const projectBtns = document.querySelectorAll('[data-project]');
        const projectsSection = document.getElementById('projects-section');

        projectBtns.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Remove active class from all buttons
                projectBtns.forEach(b => b.classList.remove('active'));
                
                // Add active class to clicked button
                this.classList.add('active');
                
                // Show/hide projects section
                if (this.dataset.project === 'yes') {
                    projectsSection.classList.add('show');
                } else {
                    projectsSection.classList.remove('show');
                    // Clear projects when "No" is selected
                    document.getElementById('projects-container').innerHTML = '';
                }
            });
        });

        // Check if resume has projects and show section
        window.addEventListener('load', function() {
            const projectContainer = document.getElementById('projects-container');
            if (projectContainer.innerHTML.trim().length > 0) {
                projectsSection.classList.add('show');
                document.querySelector('[data-project="yes"]').classList.add('active');
                document.querySelector('[data-project="no"]').classList.remove('active');
            }
        });

        // Add Skill
        document.getElementById('add-skill').addEventListener('click', function() {
            const container = document.getElementById('skills-container');
            const newField = document.createElement('div');
            newField.className = 'dynamic-field mb-2';
            newField.innerHTML = `
                <div class="input-group">
                    <input type="text" name="skills[]" class="form-control" placeholder="e.g., Python, JavaScript" required>
                    <button type="button" class="btn btn-danger remove-field">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            `;
            container.appendChild(newField);
        });

        // Add Project
        document.getElementById('add-project').addEventListener('click', function() {
            const container = document.getElementById('projects-container');
            const newField = document.createElement('div');
            newField.className = 'dynamic-field mb-3';
            newField.innerHTML = `
                <input type="text" name="project_titles[]" class="form-control mb-2" placeholder="Project Title">
                <textarea name="project_descriptions[]" class="form-control mb-2" placeholder="Project Description" rows="2"></textarea>
                <button type="button" class="btn btn-danger btn-sm remove-field">
                    <i class="fas fa-times"></i> Remove
                </button>
            `;
            container.appendChild(newField);
        });

        // Add Education
        document.getElementById('add-education').addEventListener('click', function() {
            const container = document.getElementById('education-container');
            const newField = document.createElement('div');
            newField.className = 'dynamic-field mb-3';
            newField.innerHTML = `
                <input type="text" name="schools[]" class="form-control mb-2" placeholder="School Name">
                <input type="text" name="degrees[]" class="form-control mb-2" placeholder="Degree/Program">
                <button type="button" class="btn btn-danger btn-sm remove-field">
                    <i class="fas fa-times"></i> Remove
                </button>
            `;
            container.appendChild(newField);
        });

        // Add Organization
        document.getElementById('add-organization').addEventListener('click', function() {
            const container = document.getElementById('organizations-container');
            const newField = document.createElement('div');
            newField.className = 'dynamic-field mb-3';
            newField.innerHTML = `
                <input type="text" name="org_names[]" class="form-control mb-2" placeholder="Organization Name">
                <input type="text" name="org_roles[]" class="form-control mb-2" placeholder="Your Role">
                <button type="button" class="btn btn-danger btn-sm remove-field">
                    <i class="fas fa-times"></i> Remove
                </button>
            `;
            container.appendChild(newField);
        });

        // Remove field
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-field') || e.target.closest('.remove-field')) {
                const field = e.target.closest('.dynamic-field');
                if (field) field.remove();
            }
        });
    </script>
</body>
</html> 