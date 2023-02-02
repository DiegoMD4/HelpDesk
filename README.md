# HelpDesk
HelpDesk Chumbagua

To start the application running use: php artisan serve
Migrations to database phpmyadmin: php artisan migrate

Creating UI for login: composer require laravel/ui
Command to integrate ui from bootstrap: php artisan ui bootstrap --auth & use npm install and npm run dev 

php artisan make:model -mcr
On development must be running apache server, php artisan serve and npm run dev

$users = new User();
        $areas = Areas::Pluck('nombre_area', 'id');
        return view('auth.register', compact('users', 'areas'));
