<?php 
session_start();
$logged = false;

if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
    $logged = true;
    $user_id = $_SESSION['user_id'];
}
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebToonCNU</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'inc/NavBar.php'; ?>

<!-- HERO SECTION -->
<section style="
	display: flex;
  	align-items: center;       /* CENTRARE VERTICALĂ */
   	justify-content: center;
    background-image: url('img/background.png');
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    min-height: 100vh;">

    <div class="overlay"></div>

    <div class="hero-content container text-center">
        <h1 class="hero-title">WebToon CNU</h1>

        <p class="hero-subtitle">
            Platforma oficială a concursului de benzi desenate și webtoonuri.
        </p>
        <p class="hero-subtitle">
            Locul în care  tehnologia se întâlnește cu creativitatea. 
        </p>

        <div class="hero-buttons mt-4">
            <?php if (!$logged): ?>
                <a href="signup.php" class="btn btn-light btn-lg m-2">
                    <i class="fa fa-user-plus"></i> Înregistrare
                </a>
            <?php endif; ?>

            <a href="category.php" class="btn btn-light btn-lg m-2">
                <i class="fa fa-th-large"></i> Categorii
            </a>

            <a href="form-1.php" class="btn btn-warning btn-lg m-2">
                <i class="fa fa-pencil"></i> Înscriere 2025–2026
            </a>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
