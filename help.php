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
    <title>EduSpark Help Center</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Clash+Display:wght@400;500;600;700&family=Satoshi:wght@400;500;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="asset/css/pages.css">
</head>

<body>
    <div class="page-shell">
        <header class="top-nav">
            <h1 class="brand">Help Center</h1>
            <nav class="nav-links">
                <a href="index.php">Home</a>
                <a href="about.php">About</a>
                <?php if ($sessionUserEmail !== ''): ?>
                    <span class="nav-profile">Hi, <?= htmlspecialchars($sessionDisplayName, ENT_QUOTES, 'UTF-8') ?></span>
                    <a href="dashboard.php">Dashboard</a>
                    <a class="accent-link" href="logout.php?redirect=index.php">Log Out</a>
                <?php else: ?>
                    <a href="login.php">Log In</a>
                    <a class="accent-link" href="signup.php">Sign Up</a>
                <?php endif; ?>
            </nav>
        </header>

        <main class="page-main">
            <section class="panel hero-panel">
                <h1>Need help with courses or account?</h1>
                <p>Find quick answers below. Protected support actions require login for account safety.</p>

                <div class="actions-row">
                    <button class="btn btn-primary" type="button"
                        onclick="requireLoginAndGo('dashboard.php', 'Please login to access account support.')">Open
                        Account Support</button>
                    <button class="btn btn-outline" type="button"
                        onclick="requireLoginAndGo('index.php#courses', 'Please login before contacting course support.')">Contact
                        Course Mentor</button>
                    <a class="btn btn-outline" href="index.php#courses">Browse Courses</a>
                </div>
            </section>

            <section class="panel" style="margin-top: 1rem;">
                <h2 style="margin: 0; font-family: 'Clash Display', sans-serif;">Frequently Asked Questions</h2>
                <div class="faq-list">
                    <article class="faq-item">
                        <h3>How do I enroll in a course?</h3>
                        <p>Open the Home page, click Browse Courses, then click Enroll on any course card. If you are
                            not logged in,
                            you are redirected to login first.</p>
                    </article>
                    <article class="faq-item">
                        <h3>Where do selected courses appear?</h3>
                        <p>All selected courses are shown on your Dashboard after login.</p>
                    </article>
                    <article class="faq-item">
                        <h3>Can I use EduSpark from mobile?</h3>
                        <p>Yes, all pages were built to work on both desktop and mobile screens.</p>
                    </article>
                </div>
            </section>
        </main>

        <footer class="page-footer">
            <p>If your issue continues, use a protected support action and login first.</p>
        </footer>
    </div>

    <script>
        window.__SESSION_USER__ = <?= $sessionUserEmail !== ''
                                        ? json_encode(['name' => $sessionDisplayName, 'email' => $sessionUserEmail], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
                                        : 'null' ?>;
    </script>
    <script src="asset/js/page-common.js"></script>
</body>

</html>