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
    <title>About EduSpark</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Clash+Display:wght@400;500;600;700&family=Satoshi:wght@400;500;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="asset/css/pages.css">
</head>

<body>
    <div class="page-shell">
        <header class="top-nav">
            <h1 class="brand">About EduSpark</h1>
            <nav class="nav-links">
                <a href="index.php">Home</a>
                <a href="help.php">Help</a>
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
                <h1>Built for skill-first careers</h1>
                <p>EduSpark helps learners move from curiosity to confidence with practical projects, expert mentors,
                    and a
                    learning dashboard that tracks selected courses.</p>

                <div class="actions-row">
                    <a class="btn btn-primary" href="signup.php">Join EduSpark</a>
                    <button class="btn btn-outline" type="button"
                        onclick="requireLoginAndGo('dashboard.php', 'Please login to access the dashboard.')">Open
                        Dashboard</button>
                    <button class="btn btn-outline" type="button"
                        onclick="requireLoginAndGo('index.php#courses', 'Please login to explore member-only actions.')">Protected
                        Action</button>
                </div>
            </section>

            <section class="panel" style="margin-top: 1rem;">
                <h2 style="margin: 0; font-family: 'Clash Display', sans-serif;">Why learners choose us</h2>
                <div class="info-grid">
                    <article class="info-card">
                        <h3>Project-first curriculum</h3>
                        <p>Every topic is tied to hands-on output so learners can build a real portfolio quickly.</p>
                    </article>
                    <article class="info-card">
                        <h3>Mentor-guided pathways</h3>
                        <p>Guided tracks help users avoid random learning and focus on direct career outcomes.</p>
                    </article>
                    <article class="info-card">
                        <h3>Flexible learning model</h3>
                        <p>Pick a short sprint or a deep specialization and continue progress on your own schedule.</p>
                    </article>
                </div>
            </section>
        </main>

        <footer class="page-footer">
            <p>For support questions, visit the Help page.</p>
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