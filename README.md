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
- Pagination
- Using databse seeders
- Added CRUD functionality for categories
- Added CRUD functionality for users (Users can now view/edit their accounts)
- Admins can now view all users including their status and how many posts they've created.

## Getting Started

Rename `.env.example` file to `.env` inside your project root and fill the database information.
Open the console and `cd` into your project root directory.
- Run `composer install` too install necesary files
- Run `php artisan key:generate` to generate a unique app key.
- Run `php artisan migrate:fresh --seed`.This will migrate all the necessary database tables, create an admin with email `admin@admin.com` and password `password` along with 50 dummy posts created by that admin. This can be modified as necessary. If you prefer not to use database seeders you can manually register a user but to turn that user into an admin you'd have to manually update it from the database table. If you'd like to do that on the admin cloumn on users table update the value from `0` to `1`. This will tell the database that this user has administrator permissions and give you the administrator privilages. After that you'd have to create a category so you can associate your future posts to a category.
- To give the users the ability to subscribe make sure to change `'server' => 'your-server-nr-here'` to your server code on `AppServiceProvider.php` and `MAILCHIMP_KEY=...your-mailchimp-key-here...
MAILCHIMP_LIST_SUBSCRIBERS=...your-list-id-here...` to your server  id's on your `.env` file.
- Run `php artisan serve` to boot up the app.<br />
- `barryvdh/laravel-debugbar` has been added for testing. The debug bar with only show if `APP_DEBUG` is set to true on `.env` file.
Have fun toying around with your brand new app.

#### Any outside help or ideas are more than welcome.
