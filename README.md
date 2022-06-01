# SimpleTasklist
A Simple Tasklist app made in Laravel, Tailwind with daisyUI. With a user system, a simple registration of activities, with the possibility to edit, remove and mark them as done.

Originally created as an application test at a local company. 


## Install and Run
To install, change the .en.example to .env
and setup the database (named 'tasklist' in MySQL, by default).

Then, run these commands in order on prompt:

```
composer install
```
```
php artisan key:generate
```
```
php artisan migrate
```
```
npm install
```
```
npm run dev
```

To run, command in separeted prompts:
```
php artisan serve
```
```
npm run watch
```
