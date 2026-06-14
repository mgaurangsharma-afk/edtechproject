# EDTEL - E-Learning Platform

EDTEL is a PHP-based e-learning web application with a modern frontend and a lightweight backend API. It supports user signup/login, course browsing, enrollment, and a personalized dashboard for tracking selected courses.

## Project Overview

This project combines:

- Multi-page PHP frontend (`index.php`, `login.php`, `signup.php`, `dashboard.php`, `about.php`, `help.php`)
- API-style backend router (`backend/api.php`)
- Service-based backend logic (`backend/services/*`)
- Flexible data access using database-first with JSON fallback (`backend/storage/*`)

Primary user flow:

1. Open landing page.
2. Sign up or log in.
3. Browse courses and categories.
4. Enroll in a course.
5. View enrolled courses in the dashboard.

## Index Page Preview

The landing page (`index.php`) presents:

- Top navigation (Courses, Categories, Instructors, Reviews, About, Help)
- Hero section with CTA actions
- Category discovery cards
- Dynamic course browsing
- Auth-aware actions (Log In / Sign Up or Dashboard / Log Out)

Preview snippet:

```html
<!-- Simplified preview of index page layout -->
<nav>
   <a href="#courses">Courses</a>
   <a href="#categories">Categories</a>
   <a href="about.php">About</a>
   <a href="help.php">Help</a>
</nav>

<section class="hero">
   <h1>Learn Without Limits.</h1>
   <button>Start Learning Free</button>
</section>

<section id="categories">...</section>
<section id="courses">...</section>
```

Run the full page at:

- `http://localhost/EDTEL/index.php`

## Folder Structure

```text
EDTEL/
   index.php
   login.php
   signup.php
   dashboard.php
   about.php
   help.php
   asset/
      css/
      js/
   backend/
      api.php
      config/
      includes/
      services/
      storage/
```

## Tech Stack

- PHP (server-side rendering + API endpoints)
- JavaScript (frontend interactions and API communication)
- CSS (custom styling)
- MySQL (primary persistence)
- JSON files (fallback persistence)

## Setup and Run (XAMPP)

1. Copy the `EDTEL` folder into your XAMPP `htdocs` directory.
2. Start Apache and MySQL in XAMPP Control Panel.
3. Create a database named `edtel` in phpMyAdmin.
4. Import `backend/config/setup.sql`.
5. Open:
    - `http://localhost/EDTEL/index.php`

If schema already exists, import only `backend/config/seed.sql` to reseed sample data.

## Backend Behavior

- Uses DB tables when MySQL is available.
- Falls back to JSON files in `backend/storage/` if DB is not available.
- Enrollment responses are enriched with course media metadata so dashboard cards can show image/video details.

## Key Features

- Account registration and login
- Session-aware navigation
- Course and category browsing
- Course enrollment flow
- Learner dashboard view
- About and Help pages

## Quick Test Checklist

1. Open `index.php`.
2. Create a new account in `signup.php`.
3. Log in via `login.php`.
4. Enroll in at least one course.
5. Verify the course appears in `dashboard.php`.
6. Confirm `about.php` and `help.php` open correctly.

## Notes

- This workspace is prepared for browser-based testing through XAMPP.
- If PHP CLI is missing from terminal PATH, use Apache in XAMPP to run the app.
