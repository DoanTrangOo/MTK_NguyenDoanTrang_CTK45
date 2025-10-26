<#
  setup_xampp.ps1

  Usage: Run this script from the project root in an elevated PowerShell prompt AFTER you install XAMPP to C:\xampp.

  What it does:
  - Verifies XAMPP is installed at C:\xampp (change $XAMPP_PATH at top if different)
  - Copies the project into C:\xampp\htdocs\Dalala
  - Starts Apache and MySQL using XAMPP start scripts
  - Creates database `dalala` and imports database/dalala.sql

  Notes:
  - This script assumes MySQL root has an empty password (default XAMPP). If your root user has a password, run the import manually or edit the script to include -p<password>.
  - Run PowerShell as Administrator to ensure the script can start services and write to Program Files locations.
#>

Param()

$XAMPP_PATH = 'C:\xampp'
$DEST_DIR = Join-Path $XAMPP_PATH 'htdocs\Dalala'
$SQL_DUMP = Join-Path (Get-Location) 'database\dalala.sql'

function Abort([string]$msg){
    Write-Host "ERROR: $msg" -ForegroundColor Red
    exit 1
}

if (-not (Test-Path $XAMPP_PATH)){
    Abort "XAMPP not found at $XAMPP_PATH. Please install XAMPP (https://www.apachefriends.org/) and re-run this script. If you installed XAMPP to a different path, edit the top of this script and set `\$XAMPP_PATH` accordingly."
}

if (-not (Test-Path $SQL_DUMP)){
    Abort "SQL dump not found at $SQL_DUMP. Are you running the script from the project root?"
}

Write-Host "Copying project files to $DEST_DIR ..." -ForegroundColor Cyan
if (Test-Path $DEST_DIR) {
    Write-Host "Destination exists — removing old folder (backup not created)." -ForegroundColor Yellow
    Remove-Item -Recurse -Force $DEST_DIR
}

Copy-Item -Recurse -Force -Path (Get-Location).Path -Destination $DEST_DIR
Write-Host "Files copied." -ForegroundColor Green

# Start Apache and MySQL via XAMPP start scripts
$apacheStart = Join-Path $XAMPP_PATH 'apache_start.bat'
$mysqlStart = Join-Path $XAMPP_PATH 'mysql_start.bat'

if (Test-Path $apacheStart) {
    Write-Host "Starting Apache (via $apacheStart) ..." -ForegroundColor Cyan
    Start-Process -FilePath $apacheStart -WorkingDirectory $XAMPP_PATH -NoNewWindow -Wait
} else {
    Write-Host "apache_start.bat not found, attempting to start Apache service if present..." -ForegroundColor Yellow
    try { Start-Service -Name 'Apache2.4' -ErrorAction Stop; Write-Host 'Apache service started.' -ForegroundColor Green } catch { Write-Host 'Could not start Apache service automatically.' -ForegroundColor Yellow }
}

if (Test-Path $mysqlStart) {
    Write-Host "Starting MySQL (via $mysqlStart) ..." -ForegroundColor Cyan
    Start-Process -FilePath $mysqlStart -WorkingDirectory $XAMPP_PATH -NoNewWindow -Wait
} else {
    Write-Host "mysql_start.bat not found, attempting to start MySQL service if present..." -ForegroundColor Yellow
    try { Start-Service -Name 'mysql' -ErrorAction Stop; Write-Host 'MySQL service started.' -ForegroundColor Green } catch { Write-Host 'Could not start MySQL service automatically.' -ForegroundColor Yellow }
}

Write-Host "Waiting 6 seconds for MySQL to be ready..." -NoNewline
Start-Sleep -Seconds 6
Write-Host " done." -ForegroundColor Green

$mysqlExe = Join-Path $XAMPP_PATH 'mysql\bin\mysql.exe'
if (-not (Test-Path $mysqlExe)){
    Abort "mysql.exe not found at expected path: $mysqlExe. Ensure XAMPP MySQL is installed."
}

Write-Host "Creating database 'dalala' (if not exists)..." -ForegroundColor Cyan
& $mysqlExe -u root -e "CREATE DATABASE IF NOT EXISTS dalala CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;" 2>$null
if ($LASTEXITCODE -ne 0) {
    Write-Host "Warning: automatic DB creation may have failed. If your MySQL root user has a password, edit this script to add -p<password> or import manually." -ForegroundColor Yellow
}

Write-Host "Importing SQL dump into 'dalala' from $SQL_DUMP ..." -ForegroundColor Cyan
# Use cmd.exe to allow input redirection
$importCmd = "`"$mysqlExe`" -u root dalala < `"$SQL_DUMP`""
Start-Process -FilePath cmd -ArgumentList "/c $importCmd" -NoNewWindow -Wait

if ($LASTEXITCODE -eq 0) {
    Write-Host "Database import finished." -ForegroundColor Green
} else {
    Write-Host "Database import may have failed (exit code $LASTEXITCODE). Check MySQL logs or import manually via phpMyAdmin." -ForegroundColor Yellow
}

Write-Host "Setup complete. Open http://localhost/Dalala/home_guest.php or http://localhost/Dalala/login.php" -ForegroundColor Magenta
