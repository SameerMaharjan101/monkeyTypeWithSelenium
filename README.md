# MonkeyType Automation with Selenium

This project integrates Selenium to automate typing tests on MonkeyType using PHP WebDriver.

## Installation Steps

### 1. Install PHP WebDriver Package
Run the following command to install the required PHP WebDriver package:
```bash
composer require php-webdriver/webdriver
```

### 2. Install Selenium
Download Selenium Server and ensure it is properly set up on your system.

### 3. Run Selenium Server
Start the Selenium server by running:
```bash
java -jar selenium-server-4.9.0.jar standalone
```

### 4. Execute the Script
Run the PHP script to start the automation:
```bash
php index.php
```

## Description
This project uses PHP WebDriver to automate interactions with the MonkeyType typing test website. It dynamically retrieves the words to type and simulates typing them in real-time.

## Requirements
- PHP 7.4 or higher
- Composer
- Selenium Server
- Google Chrome with ChromeDriver installed

## Notes
Ensure that Selenium Server is running and accessible at `http://localhost:4444/wd/hub` before executing the script.
