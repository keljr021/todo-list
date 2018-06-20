# Todo List App

A test development project to display a working to-do list app.

### Screenshots

Home page
![home](https://raw.githubusercontent.com/keljr021/todo-list/master/task_screenshots/home.png)

View

![view](https://raw.githubusercontent.com/keljr021/todo-list/master/task_screenshots/view.png)

![view_completee](https://raw.githubusercontent.com/keljr021/todo-list/master/task_screenshots/view_complete.png)

Add Task page
![add](https://raw.githubusercontent.com/keljr021/todo-list/master/task_screenshots/add.png)

Update Task page
![update](https://raw.githubusercontent.com/keljr021/todo-list/master/task_screenshots/update.png)




### Features
* Task list sortable by table headers
* Task is viewed by clicking on table row
* Can add, update, and remove Tasks
* Mark as complete/incomplete

### Development Install

Clone/Download the project file from GitHub


1. Install the Composer dependencies for the project

```
php composer.phar install

```

or

```
composer install

```


2. Install the NPM package dependencies for the project

```
npm install

```

3. Create a new mySQL database. This can be done using either phpMyAdmin or MariaDB.


4. Create a new .env file based on the .env.example. Add database credentials from the new DB.


5. Run the migration scripts and seeders for the database to build the tables.

```
php artisan migrate
php artisan db:seed

```

## Running the Dev Server

Run the server using

```
php artisan serve

```

The project should run at http://127.0.0.1/tasks

## Built With

* [Laravel 5.6](https://laravel.com/docs/5.6) - PHP framework for web apps
* [Composer](https://getcomposer.org/) - PHP Dependency Manager
* [NPM](https://www.npmjs.com/) - Node Package Manager
* [BootStrap 4](https://getbootstrap.com/) - Frontend framework
* [jQuery](https://jquery.com/) - JavaScript framework
