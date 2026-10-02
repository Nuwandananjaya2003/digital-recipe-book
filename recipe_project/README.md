# Digital Recipe Book - Mini Project

This is an interactive web application developed using HTML, CSS, Bootstrap, JavaScript, PHP, and MySQL. It fulfills the requirements for the ICT 2209 - Web Technologies Mini Project.

## Theme
**Digital Recipe Book** - A platform where users can register, login, and maintain their own collection of recipes.

## Features Implemented
1. **Frontend**: HTML5, CSS3, Bootstrap 5 for responsiveness.
2. **JavaScript Features**:
    - **Form Validation**: Client-side validation on Registration, Login, and Contact forms.
    - **Dynamic Content Updates**: Real-time filtering/search of recipes on the Dashboard.
    - **Smooth Scrolling**: "Scroll to top" button with smooth behavior.
    - **Event Handling**: DOM manipulation based on scroll and input events.
    - **Custom Animations**: Fade-in effects for page load.
3. **Backend & Database**:
    - **PHP** used for server-side logic and form handling.
    - **MySQL Database** (`recipe_book`) with `users`, `recipes`, and `messages` tables.
    - **Authentication**: Secure password hashing (`password_hash()`), sessions for login/logout functionality.
    - **Contact Form**: Stores inquiries into the database.

## Setup Instructions
1. Install a local server environment like **XAMPP** or **WAMP**.
2. Clone or extract this project folder into your server's root directory (`htdocs` for XAMPP, `www` for WAMP).
3. Start **Apache** and **MySQL** modules from the XAMPP/WAMP control panel.
4. Open **phpMyAdmin** (usually `http://localhost/phpmyadmin`).
5. Create a new database named `recipe_book` (or directly import the file which contains the CREATE statement).
6. Go to the "Import" tab and select the `database.sql` file provided in this project to create the tables.
7. Open a web browser and navigate to the project directory (e.g., `http://localhost/mtt_project/` or whichever folder name you used).
8. Register a new user, login, and start adding recipes!

## File Structure
- `index.php`: Landing page
- `dashboard.php`: User dashboard for managing recipes
- `contact.php`: Contact form page
- `auth/`: Contains `login.php`, `register.php`, `logout.php`
- `includes/`: Contains `db.php` (DB connection) and `functions.php`
- `css/`: Stylesheet
- `js/`: JavaScript logic
- `database.sql`: MySQL dump file
