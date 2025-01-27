<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $skills = $_POST['skills'];
    $experience = $_POST['experience'];
    $education = $_POST['education'];

    $sql = "INSERT INTO cvs (name, surname, email, phone, skills, experience, education) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $name, $surname, $email, $phone, $skills, $experience, $education);

    if ($stmt->execute()) {
        // Redirect to the CV view page with the inserted ID
        header("Location: view_cv.php?id=" . $conn->insert_id);
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>



