<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


# Study Planner API

## Introduction
This is a Laravel-based RESTful API that helps students plan and keep track of their study sessions. Users can add subjects, set study schedules, and monitor their weekly progress to reach academic goals.

## Features
- Manage subjects  
- Schedule study sessions  
- Track study time  
- View weekly progress reports  

## Technologies Used
- Laravel (PHP framework)  
- MySQL (database)  
- RESTful API design  

## How It Works
- Users create subjects they want to study  
- Users log their study sessions with date and time  
- The API calculates weekly progress by comparing planned and actual study hours  

## Future Plans
- Build a website or mobile app to use the API easily  
- Add notifications or reminders for study times  
- Export progress reports as PDF or Excel  
- Add calendar views for study plans  
- Use AI to suggest study improvements  

## Installation
1. Clone the repository  
2. Run `composer install` to install dependencies  
3. Set up your `.env` file with database details  
4. Run `php artisan migrate` to create database tables  
5. Run `php artisan serve` to start the server  

## Usage
Use API tools like Postman to test endpoints for subjects, study sessions, and progress reports.
