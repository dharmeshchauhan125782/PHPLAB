<?php
// 1. Function to display college information
function collegeInfo()
{
    echo "<h3>College Information</h3>";
    echo "College Name: ABC College<br>";
    echo "Course Name: Bachelor of Computer Applications (BCA)<br>";
    echo "Academic Year: 2025-2026<br><br>";
}

// 2. Function to accept student details
function studentDetails($studentName, $enrollmentNo, $semester)
{
    echo "<h3>Student Details</h3>";
    echo "Student Name: $studentName<br>";
    echo "Enrollment Number: $enrollmentNo<br>";
    echo "Semester: $semester<br><br>";
}

// 3. Function to calculate percentage
function calculatePercentage($m1, $m2, $m3, $m4, $m5)
{
    $total = $m1 + $m2 + $m3 + $m4 + $m5;
    $percentage = ($total / 500) * 100; // Assuming each subject is out of 100

    echo "<h3>Marks Details</h3>";
    echo "Total Marks: $total / 500<br>";

    return $percentage;
}

// 4. Function to welcome student
function welcomeStudent()
{
    echo "<h3>Welcome Student!</h3>";
    echo "Welcome to the PHP Programming Course.<br><br>";
}

// Calling functions

collegeInfo();

studentDetails("Rahul Sharma", "ENR12345", 3);

$percentage = calculatePercentage(85, 78, 92, 88, 80);
echo "Percentage: " . number_format($percentage, 2) . "%<br><br>";

// Checking if function exists before calling
if (function_exists("welcomeStudent")) {
    welcomeStudent();
} else {
    echo "Error: welcomeStudent() function does not exist.";
}
?>
