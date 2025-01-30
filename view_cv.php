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
                    color: #666;
  background: #0f0c29;  /* fallback for old browsers */
  background: -webkit-linear-gradient(to right, #24243e, #302b63, #0f0c29);  
  background: linear-gradient(to right, #24243e, #302b63, #0f0c29); 
                    padding: 20px;
                    
                }
                .cv-container {
                    position: relative;
    width: 800px;
    height: 65vh;
    margin-left:400px;
    display: grid;
    grid-template-columns: 1fr 1fr;
    border: 3px solid #00ffff;
    box-shadow: 0 0 50px 0 #00a6bc;
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
                    background-image: linear-gradient(to right, #25aae1, #40e495, #30dd8a, #2bb673);
                    box-shadow: 0 4px 15px 0 rgba(49, 196, 190, 0.75);
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
                      moz-transition: all .4s ease-in-out;
                     -o-transition: all .4s ease-in-out;
                   -webkit-transition: all .4s ease-in-out;
                  transition: all .4s ease-in-out;}}
                
                .action-buttons a.delete-btn:hover {
                    background-color:rgb(255, 0, 144);
                }

                
                .action-buttons a.add-btn {
                    background-image: linear-gradient(to right, #ed6ea0, #ec8c69, #f7186a , #FBB03B);
                    box-shadow: 0 4px 15px 0 rgba(236, 116, 149, 0.75);
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
                      moz-transition: all .4s ease-in-out;
                     -o-transition: all .4s ease-in-out;
                   -webkit-transition: all .4s ease-in-out;
                  transition: all .4s ease-in-out;}
                
                .action-buttons a.add-btn:hover {
                    background-color:rgb(227, 224, 41);
                }

              
                .action-buttons a.edit-btn {
                    background-image: linear-gradient(to right, #009245, #FCEE21, #00A8C5, #D9E021);
                      box-shadow: 0 4px 15px 0 rgba(83, 176, 57, 0.75);
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
                      moz-transition: all .4s ease-in-out;
                     -o-transition: all .4s ease-in-out;
                   -webkit-transition: all .4s ease-in-out;
                  transition: all .4s ease-in-out;}
                
                .action-buttons a.edit-btn:hover {
                    background-color:rgb(224, 90, 0);
                }

               
                .action-buttons a.finish-btn {
                    background-image: linear-gradient(to right, #667eea, #764ba2, #6B8DD6, #8E37D7);
                    box-shadow: 0 4px 15px 0 rgba(116, 79, 168, 0.75);
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
                
                .action-buttons a.finish-btn:hover {
                    background-color: #0056b3;
                }

                h1 {
                    background-image: linear-gradient(to right, #6253e1, #852D91, #A3A1FF, #F24645);
                    box-shadow: 0 4px 15px 0 rgba(126, 52, 161, 0.75);
                    border-radius: 5px;
                    color: white;
                    text-align: center;
                    padding: 16px;
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
