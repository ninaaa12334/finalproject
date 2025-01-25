<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $skills = $_POST['skills'];
    $experience = $_POST['experience'];
    $education = $_POST['education'];

    $sql = "INSERT INTO cvs (name, surname, email, phone, skills, experience, education) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $name, $surname, $email, $phone, $skills, $experience, $education);
    $stmt->execute();
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>write your cv</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
<style>
body{
	margin: 0;
	padding: 0;
	display: flex;
	justify-content: center;
	align-items: center;
	min-height: 100vh;
	font-family: 'Jost', sans-serif;
	background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);
}
.main{
	width: 350px;
	height: 500px;
	background: red;
	overflow: hidden;
	background: url("https://doc-08-2c-docs.googleusercontent.com/docs/securesc/68c90smiglihng9534mvqmq1946dmis5/fo0picsp1nhiucmc0l25s29respgpr4j/1631524275000/03522360960922298374/03522360960922298374/1Sx0jhdpEpnNIydS4rnN4kHSJtU1EyWka?e=view&authuser=0&nonce=gcrocepgbb17m&user=03522360960922298374&hash=tfhgbs86ka6divo3llbvp93mg4csvb38") no-repeat center/ cover;
	border-radius: 10px;
	box-shadow: 5px 20px 50px #000;
}
#chk{
	display: none;
}
.signup{
	position: relative;
	width:100%;
	height: 100%;
	
}
label{
	color: #fff;
	font-size: 2.3em;
	justify-content: center;
	display: flex;
	margin: 40px;
	font-weight: bold;
	cursor: pointer;
	transition: .5s ease-in-out;
}
input{
	
	width: 70%;
	height: 25px;
	background: #e0dede;
	justify-content: center;
	display: flex;
	margin: 20px auto;
	padding: 10px;
	border: none;
	outline: none;
	border-radius: 5px;
}
button{
	width: 60%;
	height: 40px;
	margin: 10px auto;
	justify-content: center;
	display: block;
	color: #fff;
	background: #573b8a;
	font-size: 1em;
	font-weight: bold;
	margin-top: 14px;
	outline: none;
	border: none;
	border-radius: 5px;
	transition: .2s ease-in;
	cursor: pointer;
	
}
button:hover{
	background: #6d44b8;
}
.login{
	height: 460px;
	background: #eee;
	border-radius: 60% / 10%;
	transform: translateY(-180px);
	transition: .8s ease-in-out;
}
.login label{
	color: #573b8a;
	transform: scale(.6);
}

#chk:checked ~ .login{
	transform: translateY(-500px);
}
#chk:checked ~ .login label{
	transform: scale(1);	
}
#chk:checked ~ .signup label{
	transform: scale(.6);
}
#skills{
	
}
.page2 input{
	height: 50px;
}

             </style>                            
            
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form>
					<label for="chk" aria-hidden="true">CV</label>
					<input type="text" name="txt" placeholder="Name" required="">
					<input type="text" name="txt" placeholder="Surname" required="">
					<input type="email" name="email" placeholder="Email" required="">
					<input type="text" name="phone" placeholder="Phone" required="">
					
				</form>
			</div>

			<div class="login">
				<form>
					<label for="chk" aria-hidden="true">More</label>
					<div class="page2">
					<input id=" skills" type="text" name="txt" placeholder="Skills" required="">
					<input type="text" name="txt" placeholder="Experience" required="">
					<input type="text" name="txt" placeholder="Education" required="">
</div>
					<button>Generate cv</button>
				</form>
			</div>
	</div>
</body>
</html>   