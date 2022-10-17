CV application, where is possible to see list of all applicants, ordered by latest, edit, add new and delete CV.
Collected data are personal details, education and job experience information, assessment of language skills, info about social sites.


### Used technologies:
- PHP 8.0.19
- Laravel 9.30.1
- MariaDB 10.4.24

### To run program enter commands from here:
- clone project from github
- make sure your gd extension for php is enabled
- composer install
- fill .env file as in .env.example
- create database
- php artisan migrate
- php artisan db:seed (to add some fake applicants)
- php artisan key:generate
- php artisan storage:link
- php artisan serve
