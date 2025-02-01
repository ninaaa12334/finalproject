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

            background: linear-gradient(#30142b, #2772a1);

            background-color: #f1f6f9;
            text-align: center;
            padding: 50px;
        }
        form {

            background:rgb(221, 168, 168);

            background: white;
            max-width: 500px;
            margin: auto;
            padding: 20px;
            border-radius: 10px;
            background: rgba(0,0,0,.5);
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.6);



            box-shadow: 0 4px 10px rgba(161, 155, 155, 0.1);

        }
        input, textarea {
            width: 90%;
            margin: 10px 0;

            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            
           
        }
        h1{
            color:white;

        }
        button {
            background-image: linear-gradient(to right, #29323c, #485563, #2b5876, #4e4376);
    box-shadow: 0 4px 15px 0 rgba(45, 54, 65, 0.75);
    flex: 1; 
  min-width: 120px; 
  padding: 12px 20px;
  font-size: 16px;
  color: #fff;
  text-align: center;
  text-decoration: none;
  border-radius: 5px;
  transition: background-color 0.3s ease;
  white-space: nowrap; 
           
=======
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

        .delete-btn {
            background-image: linear-gradient(to right, #25aae1, #4481eb, #04befe, #3f86ed);
            box-shadow: 0 4px 15px 0 rgba(65, 132, 234, 0.75);
            width: 200px;
    font-size: 16px;
    font-weight: 600;
    color: #fff;
    cursor: pointer;
    margin: 20px;
    height: 55px;
    text-align:center;
    border: none;
    background-size: 300% 100%;
    border-radius: 50px;
    moz-transition: all .4s ease-in-out;
    -o-transition: all .4s ease-in-out;
    -webkit-transition: all .4s ease-in-out;
    transition: all .4s ease-in-out;}
    
    
   
    .add-btn {
        background-image: linear-gradient(to right, #29323c, #485563, #2b5876, #4e4376);
    box-shadow: 0 4px 15px 0 rgba(45, 54, 65, 0.75);}
        
.action-buttons a {
    
  flex: 1; 
  min-width: 120px; 
  padding: 12px 20px;
  font-size: 16px;
  color: #fff;
  text-align: center;
  text-decoration: none;
  border-radius: 5px;
  transition: background-color 0.3s ease;
  white-space: nowrap; 
  background-image: linear-gradient(to right, #29323c, #485563, #2b5876, #4e4376);
    box-shadow: 0 4px 15px 0 rgba(45, 54, 65, 0.75);}


  label {
            font-weight: bold;
            display: flex;
            margin-bottom: 3px;
            flex-direction: column;
            color:white;
            
        }

 

    </style>
</head>
<body>
    <h1>Edit Your CV</h1>
    <form method="POST">

    <input type="hidden" name="id" value="<?php echo $cv['id']; ?>">
    <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($cv['name']); ?>" required>
        <label for="surname">Surname:</label>
        <input type="text" name="surname" value="<?php echo htmlspecialchars($cv['surname']); ?>" required>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($cv['email']); ?>" required>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" value="<?php echo htmlspecialchars($cv['phone']); ?>" required>
        <label for="skills">Skills:</label>
        <textarea name="skills" required><?php echo htmlspecialchars($cv['skills']); ?></textarea>
        <label for="experience">Experience:</label>
        <textarea name="experience" required><?php echo htmlspecialchars($cv['experience']); ?></textarea>
        <label for="education">Education:</label>
        <textarea name="education" required><?php echo htmlspecialchars($cv['education']); ?></textarea>
        
        <div class="action-buttons">
        <a href="delete.php?id=<?php echo $cv['id']; ?>" class="delete-btn">Delete</a>
        
        <button type="submit">Save Changes</button>
        <a href="form.php" class="add-btn">Add New CV</a>
        </div>
        
    </form>
</body>
</html>
