<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch CV details
    $sql = "SELECT * FROM cvs WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $cv = $result->fetch_assoc();
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
}

h1 {
    text-align: center;
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
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-gap: 20px;
    font-size: 1.2em;
}

.cv-container p {
    line-height: 1.8;
}

.cv-container p strong {
    color: #007bff;
    font-weight: 600;
}

.cv-container .section-title {
    font-size: 1.4em;
    color: #007bff;
    margin-bottom: 15px;
    text-transform: uppercase;
}

.cv-container .personal-info {
    grid-column: span 2;
    background-color: #e3f2fd;
    padding: 20px;
    border-radius: 8px;
}

.cv-container .skills, .cv-container .experience, .cv-container .education {
    background-color: #f1f8e9;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
}

.cv-container .skills p, .cv-container .experience p, .cv-container .education p {
    margin-bottom: 10px;
}

.cv-container .skills p strong, .cv-container .experience p strong, .cv-container .education p strong {
    color: #388e3c;
}

.action-buttons {
    grid-column: span 2;
    text-align: center;
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
    transition: background-color 0.3s ease;
}

.action-buttons a:hover {
    background-color: #0056b3;
}

@media (max-width: 768px) {
    .cv-container {
        grid-template-columns: 1fr;
        padding: 15px;
    }

    h1 {
        font-size: 2.5em;
    }

    .action-buttons a {
        font-size: 1em;
    }
}

            </style>
        </head>
        <body>
            <h1>Generated CV</h1>
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
                <a href="delete.php?delete_id=<?php echo $cv['id']; ?>">Delete</a>
                <a href="index.php">Back to Home</a>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "CV not found.";
    }
}
?>

