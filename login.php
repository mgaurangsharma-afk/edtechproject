<?php

declare(strict_types=1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$sessionUser = isset($_SESSION['user']) && is_array($_SESSION['user']) ? $_SESSION['user'] : null;
$sessionUserName = isset($sessionUser['name']) ? trim((string) $sessionUser['name']) : '';
$sessionUserEmail = isset($sessionUser['email']) ? strtolower(trim((string) $sessionUser['email'])) : '';
$sessionDisplayName = $sessionUserName !== '' ? $sessionUserName : $sessionUserEmail;
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduSpark Login</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Clash+Display:wght@400;500;600;700&family=Satoshi:wght@400;500;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="asset/css/pages.css">
</head>

<body>
    <div class="page-shell">
        <header class="top-nav">
            <h1 class="brand">EduSpark</h1>
            <nav class="nav-links">
                <a href="index.php">Home</a>
                <a href="about.php">About</a>
                <a href="help.php">Help</a>
                <?php if ($sessionUserEmail !== ''): ?>
                    <span class="nav-profile">Hi, <?= htmlspecialchars($sessionDisplayName, ENT_QUOTES, 'UTF-8') ?></span>
                    <a href="dashboard.php">Dashboard</a>
                    <a class="accent-link" href="logout.php?redirect=index.php">Log Out</a>
                <?php else: ?>
                    <a class="accent-link" href="signup.php">Sign Up</a>
                <?php endif; ?>
            </nav>
        </header>

        <main class="page-main auth-wrap">
            <section class="auth-card">
                <h2 class="auth-title">Welcome Back</h2>
                <p class="auth-subtitle">Log in to enroll in courses and manage your dashboard.</p>
                <p class="notice" id="loginNotice" hidden></p>

                <form id="loginForm" class="form-grid">
                    <label>
                        Email
                        <input type="email" id="loginEmail" name="email" required autocomplete="email">
                    </label>

                    <label>
                        Password
                        <input type="password" id="loginPassword" name="password" required
                            autocomplete="current-password">
                    </label>

                    <button type="submit" class="btn btn-primary" id="loginSubmitBtn">Log In</button>
                </form>

                <p class="form-status" id="loginStatus"></p>

                <div class="row-links">
                    <a id="signupLink" href="signup.php">Create a new account</a>
                    <a href="index.php">Back to home</a>
                </div>
            </section>
        </main>

        <footer class="page-footer">
            <p>Secure login powered by the EduSpark backend service.</p>
        </footer>
    </div>

    <script>
        window.__SESSION_USER__ = <?= $sessionUserEmail !== ''
                                        ? json_encode(['name' => $sessionDisplayName, 'email' => $sessionUserEmail], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
                                        : 'null' ?>;
    </script>
    <script src="asset/js/page-common.js"></script>
    <script src="asset/js/login.js"></script>
</body>

</html>