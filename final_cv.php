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
            <title>Final CV</title>
            <style>
                body {
                    font-family: 'Arial', sans-serif;
                    background-color: #f8f9fa;
                    padding: 30px;
                }
                .cv-wrapper {
                    max-width: 800px;
                    margin: auto;
                    background: #fff;
                    padding: 30px;
                    border-radius: 10px;
                    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
                }
                h1, h2 {
                    text-align: center;
                    color: #333;
                }
                .section {
                    margin-bottom: 20px;
                    border-bottom: 2px solid #ddd;
                    padding-bottom: 15px;
                }
                .section:last-child {
                    border-bottom: none;
                }
            </style>
        </head>
        <body>
            <div class="cv-wrapper">
                <h1><?php echo htmlspecialchars($cv['name']) . ' ' . htmlspecialchars($cv['surname']); ?></h1>
                <p>Email: <?php echo htmlspecialchars($cv['email']); ?> | Phone: <?php echo htmlspecialchars($cv['phone']); ?></p>
                <div class="section">
                    <h2>Skills</h2>
                    <p><?php echo nl2br(htmlspecialchars($cv['skills'])); ?></p>
                </div>
                <div class="section">
                    <h2>Experience</h2>
                    <p><?php echo nl2br(htmlspecialchars($cv['experience'])); ?></p>
                </div>
                <div class="section">
                    <h2>Education</h2>
                    <p><?php echo nl2br(htmlspecialchars($cv['education'])); ?></p>
                </div>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "CV not found.";
    }
}
?>