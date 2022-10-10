## Laravel Blog

This is a simple laravel blog.This project is built with laravel 9,alipnejs and tailwind css. It includes features such as:

- Authentication
- Authorization
- CRUD functionality
- Email subscribing
- Image uploading
- Showing posts based on which user created them or what category they belong to
- Detencing wether a user is administrator or not and logging in/showing different pages based on the logged in user's role
- Using dummy user/post profile pictures if no pictures were provided.
- Flash notifications

## To Do

- User verification
- Password reset functionality
- Edit personal info (user specific info)
- CRUD functionality for categories

## Getting Started

Rename `.env.example` file to `.env` inside your project root and fill the database information.
Open the console and cd your project root directory
- Run `composer install`
- Run `php artisan key:generate`
- Run `php artisan migrate:fresh --seed`.This will migrate all the necessary database tables, create an admin with email `admin@admin.com` and password `password` along with 50 dummy posts created by that admin. This can be modified as necessary.
- Run `php artisan serve`<br />
Have fun toying around with your brand new app.

#### Any outside help or ideas are more than welcome.
