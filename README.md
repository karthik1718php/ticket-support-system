<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Objective

Develop a basic version of a customer support ticket system that allows users to submit support requests.

## Core Requirements:

 Laravel Project Setup:
    First of all, we need to get a fresh Laravel 11 version application using below command, So open your terminal OR command prompt and run below command:

    composer create-project laravel/laravel ticket-support-system

## Run below command to install laravel ui package by below command:
 
 composer require laravel/ui

## Next, you have to install the laravel UI package command for creating auth scaffolding using bootstrap 5. so let's run the below command:

php artisan ui bootstrap --auth

## Now let's run below command for install npm:

npm install && npm run dev
It will generate CSS and js min files.

## Design the database with tables for users and tickets
The tickets table should include fields for a title, description, user_id, status (e.g., open, closed)

## Next run migration command:

php artisan migrate

## Create ticket form, ticket list page, Remarks form

Ticket Submission: Authenticated users should be able to submit new tickets and view a list of their submitted tickets.

## Implement Frontend/backend Validation for ticket submission form.

Jquery validation

## Role based access control

Added role in existing users table

Based on role, we are displaying the list of tickets.

## Configure .env file
Here, we need to set up a configuration to be used for sending emails

run below command
    php artisan optimize

## Sending notification to mail

Implement Laravel’s notification mail to alert users when there’s an update on their tickets.

After sending notification, ticket status has been changed from open to closed