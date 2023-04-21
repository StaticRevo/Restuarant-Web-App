<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Seaside Grill</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <link rel="stylesheet" href="css/login-style.css">
    </head>
    <body>
        <header>
            <a href="index.php"><img class="logo" src="images/logoNotext.png" alt="Logo"></a>
            <nav>
                <ul class = "nav_links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="menu.php">Menu</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="reserve.php">Reservation</a></li>
                </ul>
            </nav>
            <div class = "main">
                <a href="login.php" class="user"><i class="ri-user-fill"></i>Sign in</a>
                <a href="register.php">Register</a>
                <div class = "bx bx-menu" id="menu-icon"></div>
            </div>
        </header>
        <div class="login_cont">
            <div class ="box">
                <form>
                    <h2>Sign in</h2>
                    <div class="inputBox">
                        <input type="text" required="required">
                        <span>Email</span>
                        <i></i>
                    </div>
                    <div class="inputBox">
                        <input type="password" required="required">
                        <span>Password</span>
                        <i></i>
                    </div>
                    <div class="links">
                        <a href="#">Forgot Password</a>
                        <a href="#">Sign Up</a>
                    </div>
                    <input type="submit" value="Login">
                </form>
            </div>
        </div>
    </body>
</html>