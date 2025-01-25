<?php
require 'db.php';

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
    $stmt->execute();
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create CV</title>
</head>
<body>
    <h1>Create CV</h1>
    <form method="POST">
        <label>Name:</label><input type="text" name="name" required><br>
        <label>Surname:</label><input type="text" name="surname" required><br>
        <label>Email:</label><input type="email" name="email" required><br>
        <label>Phone:</label><input type="text" name="phone" required><br>
        <label>Skills:</label><textarea name="skills"></textarea><br>
        <label>Experience:</label><textarea name="experience"></textarea><br>
        <label>Education:</label><textarea name="education"></textarea><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>