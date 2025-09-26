<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Personal Information
$name = "PAUL C. ALCARAZ";
$title = "Computer Science Student";
$phone = "+63 9764046882";
$email = "alcarazpaul4@gmail.com";
$location = "Matingain 1, Lemery, Batangas";

// Summary Details
$summary = "Driven Computer Science student aiming to secure a remote role that provides opportunities to apply and expand knowledge in web and mobile development, 
            data organization, and IT support. Strong willingness to learn, adaptability, and a meticulous approach to completing tasks.";

// Skills
$skills = [
    "Programming Languages: Python, JavaScript, C++",
    "Web Development: HTML, CSS, C# (React framework)",
    "Mobile Development: Flutter",
    "Databases: MySQL",
    "Tools & IDEs: PyCharm, Visual Studio Code"
];

// Projects Done
$projects = [
    "Suite-Dreams-A-Hotel-Booking-System" => "Developed a Java-based hotel booking system, demonstrating proficiency in backend logic and modular design.",
    "Dice Game" => "Python-based interactive game where players compete against the computer by rolling virtual dice.",
    "Brainiac-challenge" => "Python quiz-style application challenging users across science, math, and history.",
    "Basic Calculator" => "Contributed to a C# Windows Forms calculator featuring arithmetic operations, history, and theme toggle.",
    "AI-Powered Spa Reservation Automation" => "Designed and implemented an automated booking system using GoHighLevel and n8n to streamline spa reservations."
];

// Education - College
$education = [
    "Batangas State University - The National Engineering University" => "Bachelor of Science in Computer Science"
];

// Organizations - 2025-2026 AY
$organizations = [
    "College of Informatics and Computing Sciences (Student Council)" => "Director for Sports Development",
    "Junior Philippine Computer Society - Alangilan Chapter" => "Director for Disaster Risk Reduction Management",
    "Association of Committed Computer Science Students (ACCESS)" => "Director for Disaster Risk Reduction Management"
];

// ================= OUTPUT =================
echo "<!DOCTYPE html>";
echo "<html lang='en'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<title>$name - Resume</title>";
echo "<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background: #eaeaea; /* gray behind paper */
        display: flex;
        justify-content: center;
        align-items: flex-start;
        min-height: 100vh;
    }
    .paper {
        background: #fff;
        width: 210mm;   /* A4 width */
        min-height: 297mm; /* A4 height */
        padding: 10mm;
        margin: 30px 0;
        box-shadow: 0 0 15px rgba(0,0,0,0.25);
        border-radius: 6px;
        box-sizing: border-box;
    }
    .header {
        display: flex;
        align-items: center;
        margin-bottom: 25px;
    }
    .profile-pic {
        width: 100px;
        height: 150px;
        object-fit: cover;
        margin-right: 20px;
    }
    h1 {
        margin-bottom: 10px;
        font-size: 24pt;
    }
    h2 {
        border-bottom: 1px solid #000;
        padding-bottom: 6px;
        margin-top: 35px;
        margin-bottom: 15px;
        font-size: 14pt;
    }
    p, li {
        font-size: 12pt;
        line-height: 1.8;
    }
    ul {
        padding-left: 25px;
        margin-top: 10px;
        margin-bottom: 20px;
        list-style: square;
    }
    .contact {
        margin-bottom: 25px;
        font-size: 11pt;
        line-height: 1.6;
    }
</style>";
echo "</head>";
echo "<body>";

echo "<div class='paper'>";

// Add Picture 
echo "<div class='header'>";
echo "<img src='357806524_178151191901873_7823269622768037914_n-removebg-preview.png' alt='Profile Picture' class='profile-pic'>"; // picture link
echo "<div>";
echo "<h1>$name</h1>";
echo "<p><strong>$title</strong></p>";
echo "<p class='contact'>Email: $email | Phone: $phone | Location: $location</p>";
echo "</div>";
echo "</div>";

echo "<h2>Summary</h2>";
echo "<p>$summary</p>";

echo "<h2>Skills</h2>";
echo "<ul>";
foreach ($skills as $skill) {
    echo "<li>$skill</li>";
}
echo "</ul>";

echo "<h2>Projects & Practical Experience</h2>";
echo "<ul>";
foreach ($projects as $title => $desc) {
    echo "<li><strong>$title:</strong> $desc</li>";
}
echo "</ul>";

echo "<h2>Education</h2>";
foreach ($education as $school => $degree) {
    echo "<p><strong>$school</strong><br>$degree</p>";
}

echo "<h2>Organizations</h2>";
echo "<ul>";
foreach ($organizations as $org => $role) {
    echo "<li><strong>$org:</strong> $role</li>";
}
echo "</ul>";

echo "</div>";
echo "</body>";
echo "</html>";
?>
