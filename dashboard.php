<?php

declare(strict_types=1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$sessionUser = isset($_SESSION['user']) && is_array($_SESSION['user']) ? $_SESSION['user'] : null;
$sessionUserName = isset($sessionUser['name']) ? trim((string) $sessionUser['name']) : '';
$sessionUserEmail = isset($sessionUser['email']) ? strtolower(trim((string) $sessionUser['email'])) : '';
$sessionDisplayName = $sessionUserName !== '' ? $sessionUserName : $sessionUserEmail;

if ($sessionUserEmail === '') {
    $params = http_build_query([
        'message' => 'Please login to view your dashboard.',
        'redirect' => 'dashboard.php',
    ]);
    header('Location: login.php?' . $params);
    exit;
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduSpark Dashboard</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Clash+Display:wght@400;500;600;700&family=Satoshi:wght@400;500;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="asset/css/pages.css">
</head>

<body>
    <div class="page-shell">
        <header class="top-nav">
            <h1 class="brand">EduSpark Dashboard</h1>
            <nav class="nav-links">
                <a href="index.php">Home</a>
                <a href="about.php">About</a>
                <a href="help.php">Help</a>
                <span class="nav-profile">Hi, <?= htmlspecialchars($sessionDisplayName, ENT_QUOTES, 'UTF-8') ?></span>
                <button type="button" id="logoutBtn">Log Out</button>
            </nav>
        </header>

        <main class="page-main">
            <section class="panel hero-panel">
                <h1>Your Learning Dashboard</h1>
                <p>Signed in as <strong id="dashboardEmail"></strong>. These are the courses you selected from the
                    landing page.</p>

                <div class="actions-row">
                    <a class="btn btn-primary" href="index.php#courses">Browse More Courses</a>
                    <button class="btn btn-outline" type="button" id="refreshBtn">Refresh Selections</button>
                </div>

                <div class="kpi-grid">
                    <article class="kpi-card">
                        <h3>Selected Courses</h3>
                        <p id="selectedCount">0</p>
                    </article>
                    <article class="kpi-card">
                        <h3>Account Status</h3>
                        <p>Active</p>
                    </article>
                    <article class="kpi-card">
                        <h3>Next Goal</h3>
                        <p>Pick one new course</p>
                    </article>
                </div>
            </section>

            <section class="panel" style="margin-top: 1rem;">
                <h2 style="margin: 0; font-family: 'Clash Display', sans-serif;">My Selected Courses</h2>
                <p style="margin: 0.6rem 0 0; color: var(--muted);">You can add courses by clicking Enroll on the main
                    page.</p>

                <div id="courseGrid" class="course-grid"></div>
                <div id="emptyState" class="empty-state" hidden>
                    You have not selected any courses yet. Open Browse Courses and click Enroll.
                </div>
                <p class="form-status" id="dashboardStatus"></p>
            </section>
        </main>

        <footer class="page-footer">
            <p>Need help with your account? Open the Help page and choose a protected support action.</p>
        </footer>
    </div>

    <script>
        window.__SESSION_USER__ = <?= json_encode(
                                        ['name' => $sessionDisplayName, 'email' => $sessionUserEmail],
                                        JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
                                    ) ?>;
    </script>
    <script src="asset/js/page-common.js"></script>
    <script src="asset/js/dashboard.js"></script>
</body>

</html>