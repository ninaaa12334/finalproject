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
        echo "<h1>CV Details</h1>";
        echo "<p><strong>Name:</strong> " . $cv['name'] . "</p>";
        echo "<p><strong>Email:</strong> " . $cv['email'] . "</p>";
        echo "<p><strong>Phone:</strong> " . $cv['phone'] . "</p>";
        echo "<p><strong>Address:</strong> " . $cv['address'] . "</p>";
        echo "<p><strong>Experience:</strong> " . $cv['experience'] . "</p>";
        echo "<p><strong>Skills:</strong> " . $cv['skills'] . "</p>";

        echo "<a href='delete.php?delete_id=" . $cv['id'] . "'>Delete</a>";
        echo "<a href='form.html'>Add New</a>";
    } else {
        echo "CV not found.";
    }
}
?>