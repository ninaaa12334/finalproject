<?php
include 'db.php';

$cv = null;
$deleted = isset($_GET['deleted']) ? true : false;

if (isset($_GET['id']) && !$deleted) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM cvs WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $cv = $result->fetch_assoc();
    } else {
        $deleted = true;  // If no CV found, assume it's deleted
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View CV</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f1f6f9;
            color: #333;
            padding: 20px;
            text-align: center;
        }

        h1 {
            font-size: 2.8em;
            color: #fff;
            background-color: #007bff;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
        }

        .cv-container {
            background-color: #fff;
            max-width: 900px;
            margin: 0 auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: left;
            font-size: 1.2em;
        }

        .cv-container p {
            line-height: 1.8;
        }

        .cv-container p strong {
            color: #007bff;
            font-weight: 600;
        }

        .action-buttons {
            margin-top: 30px;
        }

        .action-buttons a {
            padding: 12px 25px;
            font-size: 1.1em;
            color: #fff;
            text-decoration: none;
            background-color: #007bff;
            border-radius: 5px;
            margin: 10px 15px;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .action-buttons a:hover {
            background-color: #0056b3;
        }

        .deleted-message {
            font-size: 1.5em;
            color: red;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>Generated CV</h1>

    <?php if ($deleted): ?>
        <p class="deleted-message">CV Deleted Successfully.</p>
        <div class="action-buttons">
            <a href="form.php">Add New CV</a>
        </div>
    <?php elseif ($cv): ?>
        <div class="cv-container">
            <p><strong>Name:</strong> <?php echo htmlspecialchars($cv['name']); ?></p>
            <p><strong>Surname:</strong> <?php echo htmlspecialchars($cv['surname']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($cv['email']); ?></p>
            <p><strong>Phone:</strong> <?php echo htmlspecialchars($cv['phone']); ?></p>
            <p><strong>Skills:</strong> <?php echo nl2br(htmlspecialchars($cv['skills'])); ?></p>
            <p><strong>Experience:</strong> <?php echo nl2br(htmlspecialchars($cv['experience'])); ?></p>
            <p><strong>Education:</strong> <?php echo nl2br(htmlspecialchars($cv['education'])); ?></p>
        </div>
        <div class="action-buttons">
            <a href="delete.php?id=<?php echo $cv['id']; ?>">Delete</a>
            <a href="form.php">Add New CV</a>
        </div>
    <?php else: ?>
        <p class="deleted-message">CV Not Found.</p>
        <div class="action-buttons">
            <a href="form.php">Add New CV</a>
        </div>
    <?php endif; ?>
</body>
</html>
