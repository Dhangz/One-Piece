
<?php 
include_once ("db_conn.php");

// Registration
if(isset($_POST['register'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if ($password == $password2){

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        header("Location: register.php");
    }
}

?>


<!DOCTYPE html>
<html>
<head>
    <script src="https://kit.fontawesome.com/26625e3238.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!--Nav Bar-->
    <?php include("includes/navbar.php"); ?>

    <main>
            <form method="post" action="register.php">
                <h2 style="text-align: center;">Register</h2>
                <div class="input-group">
                    <input type="text" name="username" id="username" required>
                    <label for="username"><i class="fa-solid fa-user"></i> Username</label>
                </div>

                <div class="input-group">
                    <input type="password" name="password" id="password" required>
                    <label for="password"><i class="fa-solid fa-lock"></i> Password</label>
                    
                </div>

                <div class="input-group">
                    <input type="password" name="password2" id="password2" required>
                    <label for="password2"><i class="fa-solid fa-lock"></i> Confirm Password</label>
                    
                </div>
                <a href="login.php">Already have Account? Sign in</a>
                <button type="submit" name="register" value="register">Register</button>
            </form>
    </main>

    <footer>
        © 2024 Mugiwara, Inc. All rights reserved.
    </footer>
</body>
</html>