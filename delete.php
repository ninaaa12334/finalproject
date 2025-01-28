<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Ensure ID is an integer
    $sql = "DELETE FROM cvs WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: delete1.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
