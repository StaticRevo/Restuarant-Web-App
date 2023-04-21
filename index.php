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
        <script src="https://kit.fontawesome.com/9877e2c6ca.js" crossorigin="anonymous"></script>

    </head>
    <body>
        <div class="container">
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
            <section id="Home">
                <h1>Welcome To Seaside Grill</h1>
                <p>Discover a culinary journey like no other at our restaurant, where our talented chefs create mouth-watering dishes inspired by global flavors and cooking techniques</p>
            </section>
            <section id="About">
                <div class="aboutBox">
                    <img src="images/steak.png" class="aboutImage">
                    <div class="aboutContent">
                        <h2>About Seaside Grill</h2>
                        <p>Ever since our founding in 1990, Seaside Grill has been serving delicous, innovative dishes with a welcoming atmosphere for our guests. Over the past 33 years we have built a good reputatation amongst people from all around the island and we continue to strive for excellence in everything we do, from getting the best ingredients to create an unforgettable dining experience! </p>
                        <a href="about.php" class="btn">Read More</a>
                    </div>
                </div>
            </section>
            <section id="Reserve">
                <h1>Reserve a table</h1>
                <p>...</p>
            </section>
            <section id="News">
                <h2>Latest News</h2>
                <div class="news-grid">
                    <div class="news-item">
                        <h3>Updated Menu</h3>
                        <p>"Exciting news for foodies! We're thrilled to announce the launch of our revamped menu, now available on our website. Our talented chefs have been hard at work, crafting delicious new dishes and reimagining old favorites. From savory starters to decadent desserts, there's something for everyone to enjoy. Visit our website to check out the new menu and make a reservation today!"</p>
                        <br>
                    </div>
                    <div class="news-item2">
                        <h3>Now Opened at Bugibba</h3>
                        <p>We're thrilled to announce the opening of our newest restaurant in Bugibba! Our team has been working tirelessly to bring you a dining experience like no other. From the stunning decor to the delectable menu, every detail has been carefully crafted to delight your senses. We can't wait to welcome you to our new location and share our passion for food with the local community.</p>
                        <br>
                    </div>
                </div>
               
            </section>
            <footer>
                    <div class = "col-1">
                        <h3>Useful links</h3>
                        <a href ="menu.php">Menu</a>
                        <a href ="about.php">About</a>
                        <a href ="reserve.php">Reserve</a>
                    </div>
                    <div class = "col-2">
                        <h3>Newsletter</h3>
                        <form>
                            <input type="email" placeholder="Email Address" required> 
                            <br>
                            <button type="submit">Subscribe Now!</button>
                        </form>
                    </div>
                    <div class = "col-3">
                        <h3>Contact</h3>
                        <p>123 Ocean Heart<br>BeachTown, LA 12345</p>
                        <div class="social-icons">
                            <i class="fa-brands fa-facebook"></i>
                            <i class="fa-brands fa-twitter"></i>
                            <i class="fa-brands fa-instagram"></i>
                        </div>
                    </div>
                </footer>
        </div>
    </body>
</html> 
