# Dalala (PHP + MySQL) — run instructions

This project is a PHP/MySQL web app. This README explains three easy ways to run it on Windows: using XAMPP (GUI), using Docker Compose, or using PHP built-in server + separate MySQL (advanced).

Important files

- `config.php` — reads DB settings from environment variables (`DB_HOST`, `DB_NAME`, `DB_USER`, `DB_PASS`) with sensible defaults.
- `database/dalala.sql` — SQL dump used to create tables and sample data.
- `docker-compose.yml` — optional: runs MySQL and PHP-Apache in containers and initializes DB from the dump.

Option A — Easiest (recommended for Windows): Install XAMPP

1. Download and install XAMPP from https://www.apachefriends.org/index.html
2. Start Apache and MySQL from the XAMPP Control Panel.
3. Copy the project folder into XAMPP's `htdocs` (or set up a virtual host): e.g. `C:\xampp\htdocs\Dalala`.
4. Create the database `dalala` and import the SQL dump:

```powershell
# Open phpMyAdmin at http://localhost/phpmyadmin or run from PowerShell with MySQL client (if available)
# In phpMyAdmin: create a database named 'dalala' (utf8mb4) and import database/dalala.sql
```

5. Ensure `uploaded_img` folder is writable by Apache (Windows usually OK).
6. Open in the browser: http://localhost/Dalala/home_guest.php or http://localhost/Dalala/login.php

Option B — Docker Compose (recommended if you want containers)

1. Install Docker Desktop for Windows and enable WSL2 backend if prompted: https://docs.docker.com/desktop/windows/
2. From the project root, run in PowerShell (as a normal user):

```powershell
docker compose up --build
```

3. Service behavior:

- MySQL will initialize a database named `dalala` from `database/dalala.sql` on first run.
- The PHP-Apache service maps port 80 inside the container to port 8000 on the host.

4. Visit http://localhost:8000/home_guest.php or http://localhost:8000/login.php

Notes about Docker and credentials

- The project `config.php` will use environment variables when present. The compose file sets `DB_HOST=db`, `DB_NAME=dalala`, `DB_USER=root`, and an empty `DB_PASS` (MySQL is started with `MYSQL_ALLOW_EMPTY_PASSWORD=yes` so the root password is blank). This is only for local development; do not use this in production.

Option C — PHP built-in server + local MySQL (advanced)

1. Install PHP (add `php` to PATH) and MySQL server.
2. Create DB `dalala` and import `database/dalala.sql` using `mysql` client or phpMyAdmin.
3. From project root run:

```powershell
php -S localhost:8000
```

4. Visit http://localhost:8000/home_guest.php

Troubleshooting

- If pages show DB connection errors: open `config.php` and verify `DB_HOST`, `DB_USER`, `DB_PASS` are correct for your environment. When using XAMPP, host should be `localhost` and user often `root` (password empty by default).
- If images fail to upload: ensure `uploaded_img` has write permissions.

If you want, I can:

- Generate a Windows PowerShell script to automate the XAMPP import steps.
- Try to start the Docker Compose stack here (but I can't install Docker for you). I can run it if you install Docker and then tell me and I will run the commands.
