## Laravel 8 Dev Test

## Setup
- Run composer install on your cmd or terminal
- Copy .env.example file to .env on the root folder. You can type copy .env.example .env if using command prompt Windows or cp .env.example .env if using terminal, Ubuntu
- Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.
- Run php artisan key:generate
- Run php artisan migrate:fresh --seed
- Run php artisan serve

## Laravel Features Used
- Resource Collection
- Form Request Validation
- Migrations & Seeders
- Auth Modification
- Route Prefix, Group, Middleware
- Eloquent ORM
- Resource Controller
- Repository/Service Class
- Route Model Binding
- Model Trait Modification
- Payload Encryption
- Const Values using Enums

## Registration Successful Email Sent Feature
- I used my MailTrap credentials in .env.example. Please change credentials to reflect email working.

## Account Locked[Failed Login 5x] Feature
- Run php artisan optimize:clear
- Run php artisan migrate:fresh --seed
- Run php artisan serve
- Test Account Locked

## Unit Testing Register, Login & Order Product
- Run php artisan migrate:fresh --seed
- Run php artisan test --testsuite=Feature

 ## Exported Postman Collection 
 - Please download the exported postman json collection below.
 - https://drive.google.com/file/d/1On2ClwN-bMnRFhywF7htFDOi9TDY5Vfj/view?usp=sharing
 - Please ignore Client Token Login Folder