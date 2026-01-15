# Implementation Plan - Amazing Portfolio with Admin Panel

## 1. Database Schema
- `settings`: key-value pairs for site-wide content (name, title, bio, hero image, social links).
- `services`: title, description, icon.
- `skills`: name, percentage, category (Design/Development).
- `projects`: title, category, image, link, description.
- `stats`: label, value, icon.
- `messages`: name, email, subject, message (for contact form).

## 2. Backend (Laravel)
- **Models**: `Setting`, `Service`, `Skill`, `Project`, `Stat`, `Message`.
- **Controllers**:
    - `HomeController`: Public view.
    - `AdminController`: Dashboard and settings management.
    - `ProjectController`, `ServiceController`, `SkillController`, `StatController`: CRUD for each section.
- **Authentication**: Use Laravel's built-in authentication (Breeze or simple custom auth).

## 3. Frontend (Blade + Vanilla CSS/JS)
- **Theme**: Dark mode, deep dark background (`#270D15`), accent color (`#FF014F`).
- **Sections**: Hero, About, Services, Stats, Skills, Portfolio, Contact.
- **Animations**: Smooth scroll, hover effects, fade-in on scroll.

## 4. Admin Panel
- Secure login.
- Dashboard with overview.
- Forms to update settings, services, skills, projects, and stats.
- Inbox for contact messages.

## 5. Steps
1. Create migrations and models.
2. Set up authentication.
3. Create Admin UI and CRUD functionality.
4. Create Public UI (Portfolio) inspired by the reference site.
5. Add animations and polish.
