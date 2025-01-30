<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM cvs WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $cv = $result->fetch_assoc();
    } else {
        echo "CV not found.";
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $skills = $_POST['skills'];
    $experience = $_POST['experience'];
    $education = $_POST['education'];

    $sql = "UPDATE cvs SET name=?, surname=?, email=?, phone=?, skills=?, experience=?, education=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssi", $name, $surname, $email, $phone, $skills, $experience, $education, $id);

    if ($stmt->execute()) {
        header("Location: view_cv.php?id=" . $id);
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit CV</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f6f9;
            text-align: center;
            padding: 50px;
        }
        form {
            background: white;
            max-width: 500px;
            margin: auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(189, 181, 181, 0.1);
        }
        input, textarea {
            width: 90%;
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Edit Your CV</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $cv['id']; ?>">
        <input type="text" name="name" value="<?php echo htmlspecialchars($cv['name']); ?>" required>
        <input type="text" name="surname" value="<?php echo htmlspecialchars($cv['surname']); ?>" required>
        <input type="email" name="email" value="<?php echo htmlspecialchars($cv['email']); ?>" required>
        <input type="text" name="phone" value="<?php echo htmlspecialchars($cv['phone']); ?>" required>
        <textarea name="skills" required><?php echo htmlspecialchars($cv['skills']); ?></textarea>
        <textarea name="experience" required><?php echo htmlspecialchars($cv['experience']); ?></textarea>
        <textarea name="education" required><?php echo htmlspecialchars($cv['education']); ?></textarea>
        <button type="submit">Save Changes</button>
    </form>
</body>
</html>
