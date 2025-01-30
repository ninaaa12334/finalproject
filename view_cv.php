<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

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
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f1f6f9;
                    padding: 20px;
                }
                .cv-container {
                    background-color: #fff;
                    max-width: 900px;
                    margin: 0 auto;
                    padding: 30px;
                    border-radius: 10px;
                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                }
                .cv-container p {
                    line-height: 1.8;
                }
                .cv-container p strong {
                    color: #007bff;
                }
                .action-buttons {
                    text-align: center;
                    margin-top: 30px;
                }
                .action-buttons a {
                    padding: 12px 25px;
                    font-size: 1.1em;
                    color: #fff;
                    text-decoration: none;
                    border-radius: 5px;
                    margin: 10px;
                    transition: background-color 0.3s ease;
                }
                
                .action-buttons a.delete-btn {
                    background-color:rgb(193, 75, 195);
                }
                .action-buttons a.delete-btn:hover {
                    background-color:rgb(255, 0, 144);
                }

                
                .action-buttons a.add-btn {
                    background-color:rgb(144, 193, 19);
                }
                .action-buttons a.add-btn:hover {
                    background-color:rgb(227, 224, 41);
                }

              
                .action-buttons a.edit-btn {
                    background-color: #ffc107;
                }
                .action-buttons a.edit-btn:hover {
                    background-color:rgb(224, 90, 0);
                }

               
                .action-buttons a.finish-btn {
                    background-color: #007bff;
                }
                .action-buttons a.finish-btn:hover {
                    background-color: #0056b3;
                }

                h1 {
                    background-color: #007bff;
                    border-radius: 5px;
                    color: white;
                    text-align: center;
                    padding: 13px;
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
                <a href="delete.php?id=<?php echo $cv['id']; ?>" class="delete-btn">Delete</a>
                <a href="form.php" class="add-btn">Add New CV</a>
                <a href="edit_cv.php?id=<?php echo $cv['id']; ?>" class="edit-btn">Edit CV</a>
            </div>
            <div class="action-buttons">
                <a href="final_cv.php?id=<?php echo $cv['id']; ?>" class="finish-btn">Finish CV</a>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "CV not found.";
    }
}
?>

