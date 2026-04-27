# Disaster Reporting System

A web-based disaster reporting and management system built with Laravel PHP Framework using MVC architecture.

## Overview

The Disaster Reporting System allows citizens to report emergency situations, natural disasters, and incidents in real-time. It enables authorities to monitor, validate, and respond to reported disasters efficiently, improving disaster response time and resource allocation.

## Features

- **Disaster Reporting** - Users can submit reports with location, type, severity, and description
- **Real-time Updates** - Live status tracking of reported incidents
- **User Roles** - Citizens, Responders, and Administrators
- **Map Integration** - Visualize disaster locations on interactive maps
- **Notification System** - Alerts for nearby users and authorities
- **Report Management** - CRUD operations for disaster reports
- **Analytics Dashboard** - Statistics and trends visualization

## Technology Stack

- **Backend**: Laravel 11.x (PHP)
- **Frontend**: Blade templates, Bootstrap 5
- **Database**: MySQL / MariaDB
- **Additional**: Eloquent ORM, Laravel Sanctum (API authentication)

## Installation

### Prerequisites
- PHP >= 8.1
- Composer
- MySQL >= 5.7
- Node.js & NPM (optional, for frontend assets)

### Setup Instructions

```bash
# Clone the repository
git clone https://github.com/barnedojennifer23/disaster-reporting-system.git

# Navigate to project directory
cd disaster-reporting-system

# Install dependencies
composer install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Configure database in .env file
# DB_DATABASE=disaster_reporting_db
# DB_USERNAME=root
# DB_PASSWORD=

# Run migrations
php artisan migrate

# Start development server
php artisan serve
