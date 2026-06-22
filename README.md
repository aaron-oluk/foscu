# FoSCU Website

Official website for the **Food Safety Coalition of Uganda (FoSCU)** — a coalition of civil society organisations working to strengthen food safety policy, advocacy, and public awareness across Uganda.

Built with Laravel 12, Tailwind CSS, and PostgreSQL.

---

## Requirements

- PHP 8.2+
- Composer
- Node.js & npm
- PostgreSQL

---

## Local Setup

### 1. Install dependencies

```bash
composer install
npm install
```

### 2. Configure environment

```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env` and set your database credentials:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=laravel_foscu
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password
```

### 3. Run migrations and seed data

```bash
php artisan migrate
php artisan db:seed
```

This seeds:

- An admin user (`admin@admin.com` / `password`)
- 43 recent events from FoSCU's event history

### 4. Build assets

```bash
npm run dev       # development with hot reload
npm run build     # production build
```

### 5. Start the server

```bash
php artisan serve
```

The site runs at `http://localhost:8000`.

---

## Admin Access

The admin panel is accessible at `/admin-access` (hidden from the public nav). Log in with the seeded admin credentials or any account created via the database.

Admin capabilities:

- **Events** — create, edit, and delete upcoming and recent events
- **Event Photos** — manage photo gallery categories and images shown on the events section
- **Logos** — manage partner/member organisation logos displayed on the home page

---

## Public Pages

| Route | Page |
| --- | --- |
| `/` | Home |
| `/focus` | Our Focus |
| `/who-we-are` | Who We Are |
| `/our-work` | Our Work |
| `/updates` | FoSCU Updates (news & activities) |
| `/information-resources` | Information Resources hub |
| `/videos` | Videos |
| `/audio` | Audio |
| `/posters` | Posters |
| `/articles` | Articles |
| `/papers` | Papers |
| `/reports` | Reports |
| `/research-briefs` | Research Briefs |
| `/policy-briefs` | Policy Briefs |
| `/e-learning` | E-Learning |
| `/relevant-sites` | Relevant Sites |

---

## Project Structure

```text
app/
  Http/Controllers/
    HomeController.php          — all public page methods
    DownloadController.php      — tracked PDF downloads
    Admin/EventController.php   — admin event management
    Admin/LogoController.php    — admin logo management
    EventPhotoController.php    — admin event photo management
    Api/EventPhotosApiController.php — JSON API for event photos

resources/views/
  layouts/
    main.blade.php              — public site layout (nav, footer)
    guest.blade.php             — auth pages layout (login)
  home.blade.php                — home page
  pages/                        — all public page views
  dashboard/                    — admin panel views

public/
  audio-files/                  — MP3 audio recordings
  briefs/                       — PDF articles, reports, research briefs
  gallery/                      — event and updates photo galleries
  images/                       — site images and logos
  poster-files/                 — poster images (JPG/PNG)
  video/                        — video files
```

---

## PDF Downloads

PDFs are stored directly in `public/briefs/` and served through the `/track-download` route, which logs each download to the `downloads` table before streaming the file. Sub-directories:

- `public/briefs/articles/`
- `public/briefs/reports/`
- `public/briefs/research/`
- `public/briefs/policies/`

---

## Notes

- The `public/poster-files/` directory is intentionally named to avoid a conflict with the `/posters` Laravel route. Do not rename it back to `public/posters/`.
- PHP's built-in server (`php artisan serve`) does not read `.htaccess`. For Apache deployments, the root `.htaccess` rewrites requests through `public/index.php`.
- Upcoming events are managed through the admin panel, not seeded.
