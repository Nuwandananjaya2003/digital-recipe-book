<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Recipe Book</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">Recipe Book</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#features">Features</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link btn btn-danger text-white ms-2" href="auth/logout.php">Logout</a></li>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link" href="auth/login.php">Login</a></li>
                        <li class="nav-item"><a class="nav-link btn btn-success text-white ms-2" href="auth/register.php">Register</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="hero-section fade-in">
        <div class="container">
            <h1 class="display-4 fw-bold">Welcome to Digital Recipe Book</h1>
            <p class="lead">Discover, save, and share your favorite recipes with the world.</p>
            <a href="auth/register.php" class="btn btn-success btn-lg mt-3">Get Started</a>
        </div>
    </header>

    <!-- Features Section -->
    <section id="features" class="container my-5 fade-in">
        <h2 class="text-center mb-4">Features</h2>
        <div class="row">
            <div class="col-md-4 text-center mb-3">
                <div class="p-4 border rounded shadow-sm">
                    <h4>Organize Recipes</h4>
                    <p>Keep all your recipes in one place, easily accessible anywhere, anytime.</p>
                </div>
            </div>
            <div class="col-md-4 text-center mb-3">
                <div class="p-4 border rounded shadow-sm">
                    <h4>Share with Friends</h4>
                    <p>Share your culinary masterpieces with the community and friends.</p>
                </div>
            </div>
            <div class="col-md-4 text-center mb-3">
                <div class="p-4 border rounded shadow-sm">
                    <h4>Discover New Tastes</h4>
                    <p>Explore a variety of recipes added by other passionate cooks.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Scroll to Top Button -->
    <button id="scrollToTopBtn" title="Go to top">↑</button>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; <?php echo date("Y"); ?> Digital Recipe Book. All Rights Reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
