<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Blog Platform' ?></title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <header class="main-header">
        <nav>
            <a href="/">Home</a>
            <?php if(isset($_SESSION['user'])): ?>
                <a href="/?action=dashboard">Dashboard</a>
                <a href="/?action=logout">Logout</a>
            <?php else: ?>
                <a href="/?action=login">Login</a>
                <a href="/?action=register">Register</a>
            <?php endif; ?>
        </nav>
    </header>