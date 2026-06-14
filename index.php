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
<html lang="en" class="h-full">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EduSpark – Learn Without Limits</title>
  <script src="/_sdk/element_sdk.js"></script>
  <script src="https://cdn.tailwindcss.com/3.4.17"></script>
  <script src="https://cdn.jsdelivr.net/npm/lucide@0.263.0/dist/umd/lucide.min.js"></script>
  <link
    href="https://fonts.googleapis.com/css2?family=Clash+Display:wght@400;500;600;700&amp;family=Satoshi:wght@400;500;700&amp;display=swap"
    rel="stylesheet">
  <script src="/_sdk/data_sdk.js" type="text/javascript"></script>
  <link rel="stylesheet" href="asset/css/style.css">
</head>

<body class="h-full">
  <div class="app-wrapper"><!-- NAV -->
    <nav>
      <div class="nav-inner"><span class="logo-text" id="site-name">EduSpark</span>
        <div class="nav-links desktop-nav"><a href="#courses" onclick="scrollTo('courses')">Courses</a> <a
            href="#categories" onclick="scrollTo('categories')">Categories</a> <a href="#instructors"
            onclick="scrollTo('instructors')">Instructors</a> <a href="#testimonials"
            onclick="scrollTo('testimonials')">Reviews</a> <a href="about.php">About</a> <a href="help.php">Help</a>
          <?php if ($sessionUserEmail !== ''): ?>
            <span class="nav-profile">Hi, <?= htmlspecialchars($sessionDisplayName, ENT_QUOTES, 'UTF-8') ?></span>
            <button class="btn-outline" onclick="openDashboard()">Dashboard</button>
            <a class="btn-primary nav-button-link" href="logout.php?redirect=index.php">Log Out</a>
          <?php else: ?>
            <button class="btn-outline" onclick="handleLoginPrompt()">Log In</button>
            <button class="btn-outline" onclick="openDashboard()">Dashboard</button>
            <button class="btn-primary" onclick="handleSignupPrompt()">Sign Up</button>
          <?php endif; ?>
        </div><button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Toggle menu"> <i data-lucide="menu"
            style="width:24px;height:24px;"></i> </button>
      </div>
      <div class="mobile-nav" id="mobileNav"><a href="#courses">Courses</a> <a href="#categories">Categories</a> <a
          href="#instructors">Instructors</a> <a href="#testimonials">Reviews</a> <a href="about.php">About</a> <a
          href="help.php">Help</a>
        <?php if ($sessionUserEmail !== ''): ?>
          <span class="nav-profile">Hi, <?= htmlspecialchars($sessionDisplayName, ENT_QUOTES, 'UTF-8') ?></span>
          <button class="btn-outline" style="width:fit-content;" onclick="openDashboard()">Dashboard</button>
          <a class="btn-primary nav-button-link" style="width:fit-content;" href="logout.php?redirect=index.php">Log Out</a>
        <?php else: ?>
          <button class="btn-outline" style="width:fit-content;"
            onclick="handleLoginPrompt()">Log In</button> <button class="btn-primary" style="width:fit-content;"
            onclick="handleSignupPrompt()">Sign Up Free</button>
        <?php endif; ?>
      </div>
    </nav><!-- HERO -->
    <section>
      <div class="hero-section">
        <div class="hero-content">
          <div class="hero-badge"><span class="dot-pulse"></span> New: AI-Powered Learning Paths
          </div>
          <h1 class="hero-title" id="hero-title">Learn Without<br><span class="highlight">Limits.</span></h1>
          <p class="hero-subtitle" id="hero-subtitle">Master in-demand skills with expert-led courses, hands-on
            projects, and a global community of 2M+ learners. Your future starts today.</p>
          <div class="hero-cta"><button class="btn-hero" id="cta-button" onclick="handleGetStartedAction()"> Start
              Learning Free →
            </button> <button class="btn-outline" onclick="handleProtectedAction('the demo')"> Watch Demo
            </button>
          </div>
          <div class="hero-social-proof">
            <div class="avatar-stack"><span style="background: linear-gradient(135deg,#6c63ff,#22d3a5);">A</span> <span
                style="background: linear-gradient(135deg,#f59e0b,#ef4444);">B</span> <span
                style="background: linear-gradient(135deg,#22d3a5,#3b82f6);">C</span> <span
                style="background: linear-gradient(135deg,#ec4899,#8b5cf6);">D</span>
            </div><span>Joined by <strong style="color:var(--text)">50,000+</strong> learners this month</span>
          </div>
        </div><!-- Hero Visual -->
        <div class="hero-visual">
          <div style="position:relative; padding: 1rem;">
            <div class="floating-badge badge-top float-anim" style="animation-delay:0.5s"><span
                style="color:#22d3a5">✓</span> Certificate Earned!
            </div>
            <div class="hero-card">
              <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1rem;"><span
                  style="font-family:'Syne',sans-serif;font-weight:700;font-size:0.9rem;">My Learning</span> <span
                  style="font-size:0.75rem;color:var(--muted);">3 active</span>
              </div>
              <div class="course-preview-item">
                <div class="course-icon" style="background:rgba(108,99,255,0.15);">
                  🎨
                </div>
                <div style="flex:1;min-width:0;">
                  <div style="font-size:0.85rem;font-weight:600;margin-bottom:4px;">
                    UI/UX Design Masterclass
                  </div>
                  <div class="progress-bar-bg">
                    <div class="progress-bar-fill" style="width:72%"></div>
                  </div>
                  <div style="font-size:0.72rem;color:var(--muted);margin-top:3px;">
                    72% complete
                  </div>
                </div>
              </div>
              <div class="course-preview-item">
                <div class="course-icon" style="background:rgba(34,211,165,0.12);">
                  ⚛️
                </div>
                <div style="flex:1;min-width:0;">
                  <div style="font-size:0.85rem;font-weight:600;margin-bottom:4px;">
                    React &amp; Next.js Complete
                  </div>
                  <div class="progress-bar-bg">
                    <div class="progress-bar-fill" style="width:45%"></div>
                  </div>
                  <div style="font-size:0.72rem;color:var(--muted);margin-top:3px;">
                    45% complete
                  </div>
                </div>
              </div>
              <div class="course-preview-item">
                <div class="course-icon" style="background:rgba(245,158,11,0.12);">
                  🤖
                </div>
                <div style="flex:1;min-width:0;">
                  <div style="font-size:0.85rem;font-weight:600;margin-bottom:4px;">
                    Machine Learning A-Z
                  </div>
                  <div class="progress-bar-bg">
                    <div class="progress-bar-fill" style="width:18%"></div>
                  </div>
                  <div style="font-size:0.72rem;color:var(--muted);margin-top:3px;">
                    18% complete
                  </div>
                </div>
              </div>
            </div>
            <div class="floating-badge badge-bottom float-anim">
              🔥 <span style="color:#f59e0b;font-weight:700;">12,400</span>&nbsp;enrolled today
            </div>
          </div>
        </div>
      </div>
    </section><!-- STATS -->
    <section class="stats-section" id="stats">
      <div class="section-wrapper" style="padding-top:3rem;padding-bottom:3rem;">
        <div style="text-align:center;margin-bottom:2rem;">
          <div class="section-label">
            By the numbers
          </div>
          <h2 class="section-title" id="stats-title">Our Impact in Numbers</h2>
        </div>
        <div class="stats-grid">
          <div class="stat-card">
            <div class="stat-number" id="statLearners">
              2M+
            </div>
            <div class="stat-label">
              Active Learners
            </div>
          </div>
          <div class="stat-card">
            <div class="stat-number" id="statCourses">
              1,200+
            </div>
            <div class="stat-label">
              Expert Courses
            </div>
          </div>
          <div class="stat-card">
            <div class="stat-number" id="statInstructors">
              350+
            </div>
            <div class="stat-label">
              Top Instructors
            </div>
          </div>
          <div class="stat-card">
            <div class="stat-number" id="statRating">
              4.9★
            </div>
            <div class="stat-label">
              Average Rating
            </div>
          </div>
        </div>
      </div>
    </section><!-- CATEGORIES -->
    <section id="categories">
      <div class="section-wrapper">
        <div class="section-header">
          <div class="section-label">
            Explore by Topic
          </div>
          <h2 class="section-title">Browse Categories</h2>
          <p class="section-subtitle">From code to creativity — discover learning paths crafted for every ambition.</p>
        </div>
        <div class="categories-grid">
          <div class="category-card" onclick="filterCourses('Development')">
            <div class="category-icon">
              💻
            </div>
            <div class="category-name">
              Development
            </div>
            <div class="category-count">
              420 courses
            </div>
          </div>
          <div class="category-card" onclick="filterCourses('Design')">
            <div class="category-icon">
              🎨
            </div>
            <div class="category-name">
              Design
            </div>
            <div class="category-count">
              186 courses
            </div>
          </div>
          <div class="category-card" onclick="filterCourses('Data Science')">
            <div class="category-icon">
              📊
            </div>
            <div class="category-name">
              Data Science
            </div>
            <div class="category-count">
              238 courses
            </div>
          </div>
          <div class="category-card" onclick="filterCourses('Business')">
            <div class="category-icon">
              💼
            </div>
            <div class="category-name">
              Business
            </div>
            <div class="category-count">
              310 courses
            </div>
          </div>
          <div class="category-card" onclick="filterCourses('Marketing')">
            <div class="category-icon">
              📣
            </div>
            <div class="category-name">
              Marketing
            </div>
            <div class="category-count">
              142 courses
            </div>
          </div>
          <div class="category-card" onclick="filterCourses('AI &amp; ML')">
            <div class="category-icon">
              🤖
            </div>
            <div class="category-name">
              AI &amp; ML
            </div>
            <div class="category-count">
              198 courses
            </div>
          </div>
          <div class="category-card" onclick="filterCourses('Photography')">
            <div class="category-icon">
              📷
            </div>
            <div class="category-name">
              Photography
            </div>
            <div class="category-count">
              94 courses
            </div>
          </div>
          <div class="category-card" onclick="filterCourses('Finance')">
            <div class="category-icon">
              💰
            </div>
            <div class="category-name">
              Finance
            </div>
            <div class="category-count">
              175 courses
            </div>
          </div>
        </div>
      </div>
    </section><!-- FEATURED COURSES -->
    <section id="courses" style="background: var(--surface);">
      <div class="section-wrapper">
        <div
          style="display:flex;align-items:flex-end;justify-content:space-between;flex-wrap:wrap;gap:1rem;margin-bottom:2rem;">
          <div>
            <div class="section-label">
              Top Picks
            </div>
            <h2 class="section-title" id="featured-courses-title">Featured Courses</h2>
            <p class="section-subtitle">Handpicked by our experts. Loved by learners worldwide.</p>
          </div><button class="btn-outline" onclick="handleProtectedAction('all courses')">View All →</button>
        </div><!-- Filter Tabs -->
        <div class="tab-btns" id="courseTabs"><button class="tab-btn active" onclick="setTab(this,'All')">All</button>
          <button class="tab-btn" onclick="setTab(this,'Development')">Development</button> <button class="tab-btn"
            onclick="setTab(this,'Design')">Design</button> <button class="tab-btn"
            onclick="setTab(this,'Data Science')">Data Science</button> <button class="tab-btn"
            onclick="setTab(this,'AI &amp; ML')">AI &amp; ML</button> <button class="tab-btn"
            onclick="setTab(this,'Business')">Business</button>
        </div>
        <div class="courses-grid" id="coursesGrid"><!-- Cards injected by JS -->
        </div>
      </div>
    </section><!-- INSTRUCTORS -->
    <section id="instructors">
      <div class="section-wrapper">
        <div class="section-header">
          <div class="section-label">
            Learn from the best
          </div>
          <h2 class="section-title">Top Instructors</h2>
          <p class="section-subtitle">Industry veterans and passionate educators guiding you every step.</p>
        </div>
        <div class="instructors-grid">
          <div class="instructor-card">
            <div class="instructor-avatar" style="background:linear-gradient(135deg,#6c63ff,#22d3a5);">
              A
            </div>
            <div class="instructor-name">
              Alex Rivera
            </div>
            <div class="instructor-role">
              Full-Stack Developer
            </div>
            <div class="instructor-stats"><span><i data-lucide="users" style="width:12px;height:12px;"></i> 48k</span>
              <span><i data-lucide="star" style="width:12px;height:12px;"></i> 4.9</span>
            </div>
          </div>
          <div class="instructor-card">
            <div class="instructor-avatar" style="background:linear-gradient(135deg,#ec4899,#f59e0b);">
              S
            </div>
            <div class="instructor-name">
              Sarah Chen
            </div>
            <div class="instructor-role">
              UX/Product Designer
            </div>
            <div class="instructor-stats"><span><i data-lucide="users" style="width:12px;height:12px;"></i> 35k</span>
              <span><i data-lucide="star" style="width:12px;height:12px;"></i> 4.8</span>
            </div>
          </div>
          <div class="instructor-card">
            <div class="instructor-avatar" style="background:linear-gradient(135deg,#3b82f6,#8b5cf6);">
              M
            </div>
            <div class="instructor-name">
              Marcus Obi
            </div>
            <div class="instructor-role">
              ML / AI Engineer
            </div>
            <div class="instructor-stats"><span><i data-lucide="users" style="width:12px;height:12px;"></i> 62k</span>
              <span><i data-lucide="star" style="width:12px;height:12px;"></i> 4.9</span>
            </div>
          </div>
          <div class="instructor-card">
            <div class="instructor-avatar" style="background:linear-gradient(135deg,#22d3a5,#3b82f6);">
              P
            </div>
            <div class="instructor-name">
              Priya Mehta
            </div>
            <div class="instructor-role">
              Data Scientist
            </div>
            <div class="instructor-stats"><span><i data-lucide="users" style="width:12px;height:12px;"></i> 41k</span>
              <span><i data-lucide="star" style="width:12px;height:12px;"></i> 4.7</span>
            </div>
          </div>
        </div>
      </div>
    </section><!-- TESTIMONIALS -->
    <section class="testimonials-section" id="testimonials">
      <div class="section-wrapper">
        <div class="section-header" style="text-align:center;">
          <div class="section-label">
            Student Stories
          </div>
          <h2 class="section-title">What Learners Say</h2>
          <p class="section-subtitle" style="margin:0 auto;">Real experiences from people who transformed their careers
            with EduSpark.</p>
        </div>
        <div class="testimonials-grid">
          <div class="testimonial-card">
            <div class="stars">
              ★★★★★
            </div>
            <p class="testimonial-text">"EduSpark completely transformed my career. I went from a junior developer to a
              senior role in 8 months. The courses are concise, practical, and taught by genuine experts."</p>
            <div class="testimonial-author">
              <div class="author-avatar" style="background:linear-gradient(135deg,#6c63ff,#22d3a5);">
                J
              </div>
              <div>
                <div class="author-name">
                  James Walker
                </div>
                <div class="author-role">
                  Software Engineer @ Google
                </div>
              </div>
            </div>
          </div>
          <div class="testimonial-card">
            <div class="stars">
              ★★★★★
            </div>
            <p class="testimonial-text">"The UI/UX course was a game-changer. The projects were hands-on and the
              instructor feedback was detailed. I landed my dream design job within 3 months!"</p>
            <div class="testimonial-author">
              <div class="author-avatar" style="background:linear-gradient(135deg,#ec4899,#f59e0b);">
                L
              </div>
              <div>
                <div class="author-name">
                  Lisa Park
                </div>
                <div class="author-role">
                  Product Designer @ Airbnb
                </div>
              </div>
            </div>
          </div>
          <div class="testimonial-card">
            <div class="stars">
              ★★★★★
            </div>
            <p class="testimonial-text">"The Machine Learning path was incredibly well-structured. Marcus explains
              complex concepts so clearly. I applied what I learned directly to my data science internship."</p>
            <div class="testimonial-author">
              <div class="author-avatar" style="background:linear-gradient(135deg,#3b82f6,#8b5cf6);">
                R
              </div>
              <div>
                <div class="author-name">
                  Rayan Karimi
                </div>
                <div class="author-role">
                  ML Intern @ OpenAI
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- CTA BANNER -->
    <div style="padding: 3rem 0;">
      <div class="cta-banner">
        <h2 class="cta-title">Ready to Level Up Your Skills?</h2>
        <p class="cta-subtitle">Join 2 million+ learners worldwide. Start with free access to 100+ courses — no credit
          card required.</p>
        <div><button class="btn-cta-white" onclick="handleGetStartedAction()">Get Started Free</button>
          <button class="btn-cta-outline" onclick="handleBrowseCoursesAction()">Browse Courses</button>
        </div>
      </div>
    </div><!-- FOOTER -->
    <footer>
      <div class="footer-inner">
        <div class="footer-grid">
          <div class="footer-brand"><span class="logo-text">EduSpark</span>
            <p>Empowering learners worldwide with world-class education. Learn at your own pace, from anywhere.</p>
          </div>
          <div>
            <div class="footer-col-title">
              Learn
            </div>
            <ul class="footer-links">
              <li><a href="#" onclick="handleProtectedAction('all courses'); return false;">All Courses</a></li>
              <li><a href="#" onclick="handleProtectedAction('learning paths'); return false;">Learning Paths</a></li>
              <li><a href="#" onclick="handleProtectedAction('certifications'); return false;">Certifications</a></li>
              <li><a href="#" onclick="handleProtectedAction('live classes'); return false;">Live Classes</a></li>
            </ul>
          </div>
          <div>
            <div class="footer-col-title">
              Company
            </div>
            <ul class="footer-links">
              <li><a href="about.php">About Us</a></li>
              <li><a href="#" onclick="handleProtectedAction('careers'); return false;">Careers</a></li>
              <li><a href="#" onclick="handleProtectedAction('blog'); return false;">Blog</a></li>
              <li><a href="#" onclick="handleProtectedAction('press updates'); return false;">Press</a></li>
            </ul>
          </div>
          <div>
            <div class="footer-col-title">
              Support
            </div>
            <ul class="footer-links">
              <li><a href="help.php">Help Center</a></li>
              <li><a href="#" onclick="handleProtectedAction('contact support'); return false;">Contact Us</a></li>
              <li><a href="#" onclick="handleProtectedAction('privacy policy'); return false;">Privacy Policy</a></li>
              <li><a href="#" onclick="handleProtectedAction('terms of use'); return false;">Terms of Use</a></li>
            </ul>
          </div>
        </div>
        <div class="footer-bottom">
          <p>© 2025 EduSpark. All rights reserved.</p>
          <div class="social-links"><button class="social-btn" onclick="showToast('Follow us on Twitter! 🐦')"
              aria-label="Twitter"> <i data-lucide="twitter" style="width:15px;height:15px;"></i> </button> <button
              class="social-btn" onclick="showToast('Follow us on LinkedIn! 💼')" aria-label="LinkedIn"> <i
                data-lucide="linkedin" style="width:15px;height:15px;"></i> </button> <button class="social-btn"
              onclick="showToast('Follow us on Instagram! 📸')" aria-label="Instagram"> <i data-lucide="instagram"
                style="width:15px;height:15px;"></i> </button> <button class="social-btn"
              onclick="showToast('Join our GitHub! 💻')" aria-label="GitHub"> <i data-lucide="github"
                style="width:15px;height:15px;"></i> </button>
          </div>
        </div>
      </div>
    </footer>
  </div><!-- TOAST -->
  <div class="toast" id="toast"><i data-lucide="check-circle"
      style="width:16px;height:16px;color:#22d3a5;flex-shrink:0;"></i> <span id="toastMsg">Action completed!</span>
  </div>
  <script>
    window.__SESSION_USER__ = <?= $sessionUserEmail !== ''
                                ? json_encode(['name' => $sessionDisplayName, 'email' => $sessionUserEmail], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
                                : 'null' ?>;
  </script>
  <script src="asset/js/main.js"></script>
</body>

</html>