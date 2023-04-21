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
        <link rel="stylesheet" href="css/register-style.css">
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
        <div class="reg_cont">
            <div class ="regbox">
            <form id="registration-form" method="post" onsubmit="return checkPassword() && checkEmail();">
                    <h2>Register</h2>
                    <div class="inputBox">
                        <input type="text" required="required">
                        <span>Name</span>
                        <i></i>
                    </div>
                    <div class="inputBox">
                        <input type="text" required="required">
                        <span>Surname</span>
                        <i></i>
                    </div>
                    <div class="inputBox">
                        <input type="text" id="emailInput" required="required">
                        <span>Email</span>
                        <i></i>
                    </div>
                    <div class="inputBox">
                        <input type="password" id="password" required="required">
                        <span>Password</span>
                        <i></i>
                    </div>
                    <div class="inputBox">
                        <input type="password" id="confirmPassword"required="required">
                        <span>Confirm Password</span>
                        <i></i>
                    </div>
                    <script>
                        function checkPassword() {
                            const password = document.getElementById('password').value;
                            const confirmPassword = document.getElementById('confirmPassword').value;
                            if (password !== confirmPassword) {
                                document.getElementById('confirmPassword').setCustomValidity('Passwords do not match');
                                return false;
                            } else {
                                document.getElementById('confirmPassword').setCustomValidity('');
                                return true;
                            }
                        }
                        const emailInput = document.getElementById('emailInput');
                        emailInput.addEventListener('input', () => {
                            const email = emailInput.value;
                            const isValid = email.includes('@');
                            if (!isValid) {
                                emailInput.setCustomValidity('Email must contain the "@" symbol');
                                return false;
                            } else {
                                emailInput.setCustomValidity('');
                                return true;
                            }
                        });
                    </script>
                    <input type="submit" value="Register">
                </form>
            </div>
        </div>
    </body>
</html>