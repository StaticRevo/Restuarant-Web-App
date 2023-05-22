# Project Part 2
This repository contains the code and documentation to the Restaurant Website that was required from part 2.

**Isaac Attard:**    Home Page, Login Page, Register Page, Profile Page, Sign Out

**Luca Gatt:**       About Page, Reservation Page (with database tables for forms)

**Kayla Formosa:**   Menu, Favourites

Disclaimer: Accurate information about team responsibilities and participation can be found in the documentation, which is not provided in the repository.

## Important notes:
- To use Mailer, one must enter his own username and password in [config.ini](config.ini) under `[mailer]` section. These are made up by a strings of characters which are given by [Mailtrap](https://mailtrap.io/inboxes) 'Email Testing' account. To apply your account details in [config.ini](config.ini):
   1. Click the [link](https://mailtrap.io/inboxes)
   2. Under integrations, select `PHPMailer`
   3. Copy the username and password (with the single quotes) in [config.ini](config.ini) under `[mailer]` section, where specified.
  
  Note that this Mailer does not send to the specified recipients, but is used to test the email transactions.
- `.htaccess` does not support relative paths. So, path to enter in statement cannot be known cross-platform. Tester to adjust path to [404.php](404.php) in the htaccess `ErrorDocument 404` statement.
