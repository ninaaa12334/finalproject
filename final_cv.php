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
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php echo htmlspecialchars($cv['name']) . "'s CV"; ?></title>
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
            <style>
                body {
                    font-family: 'Poppins', sans-serif;
                    background: #f4f7fc;
                    margin: 0;
                    padding: 30px;
                    display: flex;
                    justify-content: center;
                }

                .cv-wrapper {
                    max-width: 700px;
                    background: radial-gradient(#5c67f2, white);
                    padding: 30px;
                    border-radius: 12px;
                    box-shadow: 0 10px 50px rgba(0, 0, 0, 0.15);
                    text-align: center;
                    width: 100%;
                }

                h1 {
                    font-size: 28px;
                    color: rgb(73, 81, 188);
                    margin-bottom: 5px;
                }

                h2 {
                    font-size: 22px;
                    color: #444;
                    border-bottom: 2px solid #ddd;
                    padding-bottom: 5px;
                    margin-bottom: 15px;
                }

                p {
                    color: #666;
                    font-size: 16px;
                    line-height: 1.6;
                }

                .info {
                    display: flex;
                    justify-content: center;
                    gap: 20px;
                    font-size: 16px;
                    font-weight: 500;
                    margin-bottom: 20px;
                }

                .timeline {
                    position: relative;
                    max-width: 600px;
                    margin: 0 auto;
                }

                .timeline__event {
                    display: flex;
                    align-items: center;
                    margin-bottom: 25px;
                    position: relative;
                    padding-left: 40px;
                }

                .timeline__event::before {
                    content: "";
                    position: absolute;
                    left: 8px;
                    width: 4px;
                    height: 100%;
                    background: #5c67f2;
                    top: 0;
                }

                .timeline__event__icon {
                    width: 20px;
                    height: 20px;
                    background: #5c67f2;
                    border-radius: 50%;
                    position: absolute;
                    left: 0;
                    top: 5px;
                }

                .timeline__event__content {
                    background: #fff;
                    padding: 15px;
                    border-radius: 8px;
                    box-shadow: 0 3px 10px rgba(87, 0, 218, 0.1);
                    text-align: left;
                    width: 100%;
                }

                .timeline__event__title {
                    font-size: 18px;
                    font-weight: 600;
                    color: #5c67f2;
                    margin-bottom: 5px;
                }

                .timeline__event__description {
                    font-size: 14px;
                    color: #666;
                }
            </style>
        </head>
        <body>

            <div class="cv-wrapper">
                <h1><?php echo htmlspecialchars($cv['name']) . ' ' . htmlspecialchars($cv['surname']); ?></h1>

                <br>
                
                
                <div class="info">
                    <span><strong>Email:</strong> <?php echo htmlspecialchars($cv['email']); ?></span>
                    <span><strong>Phone:</strong> <?php echo htmlspecialchars($cv['phone']); ?></span>
                </div>

                <div class="timeline">
                    <div class="timeline__event">
                        <div class="timeline__event__icon"></div>
                        <div class="timeline__event__content">
                            <div class="timeline__event__title">Skills</div>
                            <div class="timeline__event__description">
                                <p><?php echo nl2br(htmlspecialchars($cv['skills'])); ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="timeline__event">
                        <div class="timeline__event__icon"></div>
                        <div class="timeline__event__content">
                            <div class="timeline__event__title">Experience</div>
                            <div class="timeline__event__description">
                                <p><?php echo nl2br(htmlspecialchars($cv['experience'])); ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="timeline__event">
                        <div class="timeline__event__icon"></div>
                        <div class="timeline__event__content">
                            <div class="timeline__event__title">Education</div>
                            <div class="timeline__event__description">
                                <p><?php echo nl2br(htmlspecialchars($cv['education'])); ?></p>
                            </div>
                        </div>
                    </div>
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



       