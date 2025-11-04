<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $resume->name }} - Resume</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Arial', sans-serif;
            background: #eaeaea;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            padding: 30px 10px;
        }

        /* Top Navigation Bar */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: white;
            padding: 15px 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #667eea;
        }

        .navbar-buttons {
            display: flex;
            gap: 10px;
        }

        .btn-nav {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 0.95rem;
        }

        .btn-back {
            background: #6c757d;
            color: white;
        }

        .btn-back:hover {
            background: #5a6268;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            color: white;
        }

        .btn-print {
            background: #667eea;
            color: white;
        }

        .btn-print:hover {
            background: #764ba2;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
            color: white;
        }

        .paper {
            background: #fff;
            width: 210mm;
            max-width: 100%;
            min-height: 297mm;
            padding: 15mm;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
            border-radius: 8px;
            margin-top: 80px;
        }

        .header {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            gap: 20px;
        }

        .profile-pic {
            width: 100px;
            height: 130px;
            object-fit: cover;
            border-radius: 8px;
            border: 3px solid #333;
        }

        .header-info h1 {
            font-size: 28pt;
            margin-bottom: 8px;
            color: #222;
            font-weight: 700;
        }

        .header-info .title {
            font-size: 14pt;
            color: #555;
            font-weight: 600;
            margin-bottom: 12px;
        }

        .contact {
            font-size: 11pt;
            color: #444;
            line-height: 1.6;
        }

        .contact i {
            margin-right: 5px;
            color: #666;
        }

        h2 {
            border-bottom: 2px solid #333;
            padding-bottom: 8px;
            margin-top: 30px;
            margin-bottom: 15px;
            font-size: 16pt;
            color: #222;
        }

        p, li {
            font-size: 11pt;
            line-height: 1.7;
            color: #333;
        }

        ul {
            padding-left: 25px;
            margin-top: 10px;
            margin-bottom: 20px;
            list-style: square;
        }

        .summary {
            text-align: justify;
            margin-bottom: 20px;
        }

        .project-item, .edu-item, .org-item {
            margin-bottom: 12px;
        }

        .project-title, .org-name, .school-name {
            font-weight: 700;
            color: #222;
        }
        
        @media print {
            * {
                margin: 0 !important;
                padding: 0 !important;
            }
            html, body {
                background: white !important;
                padding: 0 !important;
                margin: 0 !important;
                height: auto !important;
                width: 100% !important;
                font-size: 11pt !important;
            }
            .navbar {
                display: none !important;
                visibility: hidden !important;
            }
            .paper {
                box-shadow: none !important;
                width: 100% !important;
                max-width: 100% !important;
                margin: 0 !important;
                padding: 0.5in !important;
                background: white !important;
                border-radius: 0 !important;
                min-height: 100% !important;
                display: block !important;
            }
            .header {
                display: flex !important;
                flex-direction: row !important;
                align-items: flex-start !important;
                margin-bottom: 25px !important;
                gap: 20px !important;
                page-break-inside: avoid !important;
                width: 100% !important;
                justify-content: flex-start !important;
            }
            .profile-pic {
                width: 100px !important;
                height: 130px !important;
                object-fit: cover !important;
                border-radius: 8px !important;
                border: 3px solid #333 !important;
                flex-shrink: 0 !important;
                display: inline-block !important;
                vertical-align: top !important;
            }
            .header-info {
                flex: 1 !important;
                display: inline-block !important;
                vertical-align: top !important;
                max-width: calc(100% - 120px) !important;
            }
            .header-info h1 {
                font-size: 28pt !important;
                margin: 0 0 3px 0 !important;
                padding: 0 !important;
                color: #222 !important;
                font-weight: 700 !important;
                line-height: 1 !important;
                display: block !important;
            }
            .header-info .title {
                font-size: 14pt !important;
                color: #555 !important;
                font-weight: 600 !important;
                margin: 0 0 8px 0 !important;
                padding: 0 !important;
                display: block !important;
            }
            .contact {
                font-size: 10pt !important;
                color: #444 !important;
                line-height: 1.5 !important;
                margin: 0 !important;
                padding: 0 !important;
                display: block !important;
            }
            h2 {
                border-bottom: 2px solid #333 !important;
                padding-bottom: 5px !important;
                margin-top: 20px !important;
                margin-bottom: 10px !important;
                font-size: 16pt !important;
                color: #222 !important;
                page-break-after: avoid !important;
                display: block !important;
            }
            p {
                font-size: 11pt !important;
                line-height: 1.6 !important;
                color: #333 !important;
                margin: 0 0 8px 0 !important;
                padding: 0 !important;
            }
            li {
                font-size: 11pt !important;
                line-height: 1.6 !important;
                color: #333 !important;
                margin: 0 0 4px 0 !important;
                padding: 0 !important;
            }
            ul {
                padding-left: 25px !important;
                margin: 8px 0 15px 0 !important;
                list-style: square !important;
            }
            .summary {
                text-align: justify !important;
                margin-bottom: 15px !important;
            }
            .project-item {
                margin-bottom: 10px !important;
                page-break-inside: avoid !important;
                display: block !important;
            }
            .edu-item {
                margin-bottom: 10px !important;
                page-break-inside: avoid !important;
                display: block !important;
            }
            .org-item {
                margin-bottom: 8px !important;
                page-break-inside: avoid !important;
            }
            .project-title, .org-name, .school-name {
                font-weight: 700 !important;
                color: #222 !important;
            }
        }

        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                gap: 15px;
                padding: 10px 15px;
            }

            .navbar-buttons {
                width: 100%;
                justify-content: space-between;
            }

            .btn-nav {
                padding: 8px 15px;
                font-size: 0.85rem;
            }

            .paper {
                padding: 10mm;
                width: 100%;
                margin-top: 140px;
            }
            .header {
                flex-direction: column;
                text-align: center;
            }
            .profile-pic {
                width: 80px;
                height: 100px;
            }
            .header-info h1 {
                font-size: 22pt;
            }
        }
       
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <div class="navbar">
        <div class="navbar-title">
            <i class="fas fa-file-alt"></i> Resume Preview
        </div>
        
<div class="navbar-buttons">
    @auth
        {{-- Show "Back to Edit" only if logged in AND viewing your own resume --}}
        @if(Auth::id() == $resume->user_id)
            <a href="{{ route('resume.edit', ['id' => Auth::id()]) }}" class="btn-nav btn-back">
                <i class="fas fa-arrow-left"></i> Back to Edit
            </a>
        @endif
    @else
        {{-- Show "Login to Edit" if not logged in --}}
        <a href="{{ route('login') }}" class="btn-nav btn-back">
            <i class="fas fa-sign-in-alt"></i> Login to Edit
        </a>
    @endauth
    
    <button onclick="window.print()" class="btn-nav btn-print">
        <i class="fas fa-print"></i> Print Resume
    </button>
</div>
    </div>

    <div class="paper">
        <!-- Header -->
        <div class="header">
            @if($resume->profile_picture)
                <img src="{{ asset('storage/' . $resume->profile_picture) }}" alt="Profile" class="profile-pic">
            @endif
            
            <div class="header-info">
                <h1>{{ $resume->name }}</h1>
                <div class="title">{{ $resume->title }}</div>
                <div class="contact">
                    📧 {{ $resume->email }} | 
                    📱 {{ $resume->phone }} | 
                    📍 {{ $resume->location }}
                </div>
            </div>
        </div>

        <!-- Summary -->
        <h2>Professional Summary</h2>
        <p class="summary">{{ $resume->summary }}</p>

        <!-- Skills -->
        <h2>Skills</h2>
        <ul>
            @foreach($resume->skills as $skill)
                <li>{{ $skill }}</li>
            @endforeach
        </ul>

        <!-- Projects -->
        @if($resume->projects && count($resume->projects) > 0)
            <h2>Projects & Practical Experience</h2>
            @foreach($resume->projects as $title => $desc)
                <div class="project-item">
                    <span class="project-title">{{ $title }}:</span> {{ $desc }}
                </div>
            @endforeach
        @endif

        <!-- Education -->
        @if($resume->education && count($resume->education) > 0)
            <h2>Education</h2>
            @foreach($resume->education as $school => $degree)
                <div class="edu-item">
                    <div class="school-name">{{ $school }}</div>
                    <div>{{ $degree }}</div>
                </div>
            @endforeach
        @endif

        <!-- Organizations -->
        @if($resume->organizations && count($resume->organizations) > 0)
            <h2>Organizations & Leadership</h2>
            <ul>
                @foreach($resume->organizations as $org => $role)
                    <li class="org-item">
                        <span class="org-name">{{ $org }}:</span> {{ $role }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</body>
</html>