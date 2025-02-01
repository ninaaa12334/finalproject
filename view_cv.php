<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Ensure ID is an integer

    $sql = "SELECT * FROM cvs WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $cv = $result->fetch_assoc();
    } else {
        die("CV not found.");
    }
    $stmt->close();
    $conn->close();
} else {
    die("Invalid request.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Generated CV</title>
  <style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:300');
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body {
      height: 100vh;
      background: #01939c;
      font-family: 'Poppins', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .form {
      background: #12141d;
      padding: 40px;
      max-width: 600px;
      width: 100%;
      border-radius: 15px;
      box-shadow: 0 4px 10px rgba(19, 35, 47, 0.3);
      text-align: center;
    }
    h1 {
      color: #fff;
      font-weight: 300;
      margin-bottom: 20px;
      background: #01939c;
      padding: 16px;
      border-radius: 10px;
    }
    .cv-container {
      background: #1a1d27;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(12, 175, 167, 0.3);
      color: white;
      text-align: left;
      height: 400px;
    }
    .cv-container p {
      line-height: 1.6;
      font-size: 16px;
    }
    .cv-container p strong {
      color: #01939c;
    }
    .action-buttons {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
    }
    .action-buttons a {
      flex: 1;
      margin: 5px;
      padding: 12px;
      font-size: 16px;
      color: #fff;
      text-align: center;
      text-decoration: none;
      border-radius: 5px;
      transition: 0.3s;
    }
    .finish-btn {
      background: linear-gradient(to right, #25aae1, #40e495, #2cb6b2);
      box-shadow: 0 4px 15px rgba(49, 196, 190, 0.75);
    }
    .edit-btn {
      background: linear-gradient(to right, #25aae1, #40e495, #2bb673);
      box-shadow: 0 4px 15px rgba(49, 196, 190, 0.75);
    }
    .action-buttons a:hover {
      opacity: 0.8;
    }
  </style>
</head>
<body>
  <div class="form">
    <h1>Generated CV</h1>
    <div class="cv-container">
      <p><strong>Name:</strong> <?php echo htmlspecialchars($cv['name']); ?></p>
      <br>
      <p><strong>Surname:</strong> <?php echo htmlspecialchars($cv['surname']); ?></p>
      <br>
      <p><strong>Email:</strong> <?php echo htmlspecialchars($cv['email']); ?></p>
      <br>
      <p><strong>Phone:</strong> <?php echo htmlspecialchars($cv['phone']); ?></p>
      <br>
      <p><strong>Skills:</strong> <?php echo nl2br(htmlspecialchars($cv['skills'])); ?></p>
      <br>
      <p><strong>Experience:</strong> <?php echo nl2br(htmlspecialchars($cv['experience'])); ?></p>
      <br>
      <p><strong>Education:</strong> <?php echo nl2br(htmlspecialchars($cv['education'])); ?></p>
    </div>
    <div class="action-buttons">
      <a href="edit_cv.php?id=<?php echo $cv['id']; ?>" class="edit-btn">Edit CV</a>
      <a href="final_cv.php?id=<?php echo $cv['id']; ?>" class="finish-btn">Finish CV</a>
    </div>
  </div>
</body>
</html>
