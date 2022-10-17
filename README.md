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

- add new cv view:
![add](https://user-images.githubusercontent.com/102672847/196302275-dba38c91-b6a8-466e-af3f-f79d3d522d5d.jpg)
- edit cv view:
![edit](https://user-images.githubusercontent.com/102672847/196302428-2914274c-ea43-4dba-bb69-35652b872fa9.jpg)
- cv view:
![cv](https://user-images.githubusercontent.com/102672847/196302530-ff0367cc-42f4-4deb-8589-4bd86aa05879.jpg)
