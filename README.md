# Project Part 2
This repository contains the code and documentation to the Restaurant Website that was required from part 2.

- **Isaac Attard:**    Home Page, Login Page, Register Page, Profile Page, Sign Out

- **Luca Gatt:**       About Page, Reservation Page (with database tables for forms)

- **Kayla Formosa:**   Menu, Favourites

**Disclaimer:** Accurate information about team responsibilities and participation can be found in the documentation, which is not provided in the repository.

## Important notes:
- A **server** is needed. Using XAMPP, the developer has an Apache server to run the website locally. Follow [instructions to install XAMPP](https://github.com/StaticRevo/cis1054-part1-isaacattard-kaylaformosa-lucagatt/blob/main/Q1-setup-explaination.md).
- **Database functionality:** [project.sql](project.sql) contains the SQL backup to import. If using XAMPP, import into your local [phpMyAdmin](localhost/phpmyadmin)
- To use **Mailer**, one must enter his own username and password in [config.ini](config.ini) under `[mailer]` section. These are made up by a strings of characters which are given by [Mailtrap](https://mailtrap.io/inboxes) 'Email Testing' account. To apply your account details in [config.ini](config.ini):
   1. Click the [link](https://mailtrap.io/inboxes)
   2. Under integrations, select `PHPMailer`
   3. Copy the username and password (with the single quotes) in [config.ini](config.ini) under `[mailer]` section, where specified.
  
  Note that this Mailer does not send to the specified recipients, but is used to test the email transactions.
- **.htaccess and 404:** [.htaccess](.htaccess) does not support relative paths. So, path to enter in statement cannot be known cross-platform. Tester to adjust path to [404.php](404.php) in the htaccess `ErrorDocument 404` statement. Replace `path-inside-htdocs` with the path to file, starting frmo the folder inside `htdocs` (the root folder). For example, if [404.php](404.php) is directly under the root folder then `path-inside-htdocs` should be removed without entering anything else. The folder and path would be simply `/404.php`.
