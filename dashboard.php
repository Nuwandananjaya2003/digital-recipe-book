<?php
session_start();
require_once 'includes/db.php';
require_once 'includes/functions.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: auth/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$success = '';
$error = '';

// Handle Recipe Submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_recipe'])) {
    $title = sanitize_input($_POST['title']);
    $ingredients = sanitize_input($_POST['ingredients']);
    $instructions = sanitize_input($_POST['instructions']);

    if (empty($title) || empty($ingredients) || empty($instructions)) {
        $error = "All fields are required to add a recipe.";
    } else {
        $stmt = $conn->prepare("INSERT INTO recipes (title, ingredients, instructions, user_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $title, $ingredients, $instructions, $user_id);
        
        if ($stmt->execute()) {
            $success = "Recipe added successfully!";
        } else {
            $error = "Error adding recipe: " . $stmt->error;
        }
        $stmt->close();
    }
}

// Fetch user recipes
$recipes = [];
$stmt = $conn->prepare("SELECT * FROM recipes WHERE user_id = ? ORDER BY created_at DESC");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $recipes[] = $row;
}
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Recipe Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">Recipe Book</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><span class="nav-link text-white">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span></li>
                    <li class="nav-item"><a class="nav-link btn btn-danger text-white ms-2" href="auth/logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5 pt-4 fade-in">
        <h2 class="mb-4">My Dashboard</h2>
        
        <div class="row">
            <!-- Add Recipe Form -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">Add New Recipe</h5>
                    </div>
                    <div class="card-body">
                        <?php if($error): ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>
                        <?php if($success): ?>
                            <div class="alert alert-success"><?php echo $success; ?></div>
                        <?php endif; ?>

                        <form method="POST" action="dashboard.php" class="needs-validation" novalidate>
                            <input type="hidden" name="add_recipe" value="1">
                            <div class="mb-3">
                                <label for="title" class="form-label">Recipe Title</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                                <div class="invalid-feedback">Please provide a title.</div>
                            </div>
                            <div class="mb-3">
                                <label for="ingredients" class="form-label">Ingredients</label>
                                <textarea class="form-control" id="ingredients" name="ingredients" rows="3" required></textarea>
                                <div class="invalid-feedback">Please provide ingredients.</div>
                            </div>
                            <div class="mb-3">
                                <label for="instructions" class="form-label">Instructions</label>
                                <textarea class="form-control" id="instructions" name="instructions" rows="4" required></textarea>
                                <div class="invalid-feedback">Please provide instructions.</div>
                            </div>
                            <button type="submit" class="btn btn-success w-100">Save Recipe</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Recipe List -->
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">My Recipes</h5>
                        <input type="text" id="recipeSearch" class="form-control form-control-sm w-50" placeholder="Search recipes...">
                    </div>
                    <div class="card-body">
                        <?php if (count($recipes) > 0): ?>
                            <div class="row" id="recipeList">
                                <?php foreach($recipes as $recipe): ?>
                                    <div class="col-md-6">
                                        <div class="card recipe-card border-success">
                                            <div class="card-body">
                                                <h5 class="card-title text-success"><?php echo htmlspecialchars($recipe['title']); ?></h5>
                                                <h6 class="card-subtitle mb-2 text-muted">Ingredients</h6>
                                                <p class="card-text small"><?php echo nl2br(htmlspecialchars($recipe['ingredients'])); ?></p>
                                                <h6 class="card-subtitle mb-2 text-muted">Instructions</h6>
                                                <p class="card-text small"><?php echo nl2br(htmlspecialchars($recipe['instructions'])); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <p class="text-muted">You haven't added any recipes yet. Start adding some!</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Scroll to Top Button -->
    <button id="scrollToTopBtn" title="Go to top">↑</button>

    <script src="js/script.js"></script>
</body>
</html>
