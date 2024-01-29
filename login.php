<?php
include("db_conn.php");


if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows >= 1) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            
            header("Location: index.php");
        } else {
          header("Location: login.php");
        }
    } else {
      header("Location: login.php");
    }
    $stmt->close();
    $conn->close();
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
            <form method="post" action="login.php">
                <h2 style="text-align: center;">Login</h2>
                <div class="input-group">
                    <input type="text" name="username" id="username" required>
                    <label for="username"><i class="fa-solid fa-user"></i> Username</label>
                </div>

                <div class="input-group">
                    <input type="password" name="password" id="password" required>
                    <label for="password"><i class="fa-solid fa-lock"></i> Password</label>
                    
                </div>
                  <a href="register.php">Register a New User? Sign Up</a>     
                <button type="submit" name="login" value="login">Log in</button>
                
            </form>
    </main>

    <footer>
        © 2024 Mugiwara, Inc. All rights reserved.
    </footer>
</body>
</html>