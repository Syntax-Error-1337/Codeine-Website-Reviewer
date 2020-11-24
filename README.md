# Codeine-Website-Reviewer
Codeine Website Reviewer is a SEO tool which will help you analyze your web page. This script provides a full information about links, meta tags of chosen domain.

# Features
PageSpeed Insights
Link Exstractor
Content Analysis
Multilanguage Interface (Russian, English, French, Danish, Deutsch, Spanish, Dutch (Thanks designs2love for the free translation into Dutch)
Complite Website Review
Website Speed Tips
Advice System
Meta Tags Crawler and Analyzer
Score System
Responsive Layout
Social Sharing
Export as PDF
Sitemap Generator
Websites Ratings
Contact Page

# Requirements
PHP 5.1.0 or higher
cURL Extension
GD Extension
PDO Extension (Mysql driver)
Multibyte String Functions
PHP OpenSSL extension
Script execution time must be greater than 120 seconds
Rewrite module (optional)
Cron Jobs (optional)
SMTP Mail Server (optional)
DOMDocument (optional. For sitemap generation)

# Installation
Upload files to your web server or hosting
Make sure following directories are executable (chmod 755)
~/root/assets
~/root/codeine_website_reviewer/runtime
~/root/sitemap
~/root/pdf

# Database Settings
The main Web application configuration file located in ~/root/codeine_website_reviewer/config/main.php
Open this file and let's begin with configure database settings. Find following lines and set your own mysql settings

