<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAUL C. ALCARAZ - Resume</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
            position: relative;
        }

        /* Floating Login Button */
        .login-btn-float {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1rem;
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .login-btn-float:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 30px rgba(102, 126, 234, 0.6);
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
            margin-top: 60px;
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

        /* Banner at bottom */
        .edit-banner {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
            margin-top: 40px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.3);
        }
        .edit-banner h3 {
            margin-bottom: 15px;
            font-size: 1.5rem;
        }
        .edit-banner p {
            color: rgba(255,255,255,0.9);
            margin-bottom: 20px;
        }
        .btn-edit {
            background: white;
            color: #667eea;
            border: none;
            padding: 12px 40px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        .btn-edit:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(255,255,255,0.3);
            color: #667eea;
        }
        
        @media print {
            body {
                background: white;
                padding: 0;
            }
            .paper {
                box-shadow: none;
                width: 100%;
                margin: 0;
                padding: 10mm;
            }
            .login-btn-float, .edit-banner {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .login-btn-float {
                top: 10px;
                right: 10px;
                padding: 10px 20px;
                font-size: 0.9rem;
            }
            .paper {
                padding: 10mm;
                width: 100%;
                margin-top: 70px;
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
    <!-- Floating Login Button -->
    <a href="{{ route('login') }}" class="login-btn-float">
        <i class="fas fa-sign-in-alt"></i> Login to Edit
    </a>

    <div class="paper">
        <!-- Header -->
        <div class="header">
            <img src="/357806524_178151191901873_7823269622768037914_n-removebg-preview.png" alt="Profile" class="profile-pic">
            
            <div class="header-info">
                <h1>PAUL C. ALCARAZ</h1>
                <div class="title">Computer Science Student</div>
                <div class="contact">
                    📧 alcarazpaul4@gmail.com | 
                    📱 +63 9764046882 | 
                    📍 Matingain 1, Lemery, Batangas
                </div>
            </div>
        </div>

        <!-- Summary -->
        <h2>Professional Summary</h2>
        <p class="summary">
            Driven Computer Science student aiming to secure a remote role that provides opportunities to apply and expand knowledge in web and mobile development, 
            data organization, and IT support. Strong willingness to learn, adaptability, and a meticulous approach to completing tasks.
        </p>

        <!-- Skills -->
        <h2>Skills</h2>
        <ul>
            <li>Programming Languages: Python, JavaScript, C++</li>
            <li>Web Development: HTML, CSS, C# (React framework)</li>
            <li>Mobile Development: Flutter</li>
            <li>Databases: MySQL</li>
            <li>Tools & IDEs: PyCharm, Visual Studio Code</li>
        </ul>

        <!-- Projects -->
        <h2>Projects & Practical Experience</h2>
        <div class="project-item">
            <span class="project-title">Suite-Dreams-A-Hotel-Booking-System:</span> Developed a Java-based hotel booking system, demonstrating proficiency in backend logic and modular design.
        </div>
        <div class="project-item">
            <span class="project-title">Dice Game:</span> Python-based interactive game where players compete against the computer by rolling virtual dice.
        </div>
        <div class="project-item">
            <span class="project-title">Brainiac-challenge:</span> Python quiz-style application challenging users across science, math, and history.
        </div>
        <div class="project-item">
            <span class="project-title">Basic Calculator:</span> Contributed to a C# Windows Forms calculator featuring arithmetic operations, history, and theme toggle.
        </div>
        <div class="project-item">
            <span class="project-title">AI-Powered Spa Reservation Automation:</span> Designed and implemented an automated booking system using GoHighLevel and n8n to streamline spa reservations.
        </div>

        <!-- Education -->
        <h2>Education</h2>
        <div class="edu-item">
            <div class="school-name">Batangas State University - The National Engineering University</div>
            <div>Bachelor of Science in Computer Science</div>
        </div>

        <!-- Organizations -->
        <h2>Organizations & Leadership</h2>
        <ul>
            <li class="org-item">
                <span class="org-name">College of Informatics and Computing Sciences (Student Council):</span> Director for Sports Development
            </li>
            <li class="org-item">
                <span class="org-name">Junior Philippine Computer Society - Alangilan Chapter:</span> Director for Disaster Risk Reduction Management
            </li>
            <li class="org-item">
                <span class="org-name">Association of Committed Computer Science Students (ACCESS):</span> Director for Disaster Risk Reduction Management
            </li>
        </ul>

        <!-- Edit Banner -->
        <div class="edit-banner">
            <h3><i class="fas fa-edit"></i> Want to Create Your Own Resume?</h3>
            <p>Login to customize your own professional resume with our easy-to-use editor!</p>
            <a href="{{ route('login') }}" class="btn-edit">
                <i class="fas fa-user-circle"></i> Login to Get Started
            </a>
        </div>
    </div>
</body>
</html>