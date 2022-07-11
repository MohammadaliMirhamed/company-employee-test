<p align="center"><a href="https://independesk.com/en-de/" target="_blank"><img src="https://independesk.com/wp-content/uploads/200824_PM.png" width="400"></a></p>

## About Independesk

Independesk helps you to keep track of your company&#039;s New Work process. ✓ Individual hybrid work concept ✓ Coworking ✓ Management of own workplaces

## Quick Start
- Create a copy from ```.env.example``` name it as ```.env```
- ```composer install```
- ```./vendor/bin/sail up```
- ```./vendor/bin/sail artisan migrate --seed```
### Notice:
Organization structure has been provided as ```Laravel Seed```, no need for ```SQL``` file

## Routes
| Url                          | About                      | Auth |
|------------------------------|----------------------------|------|
| ```/```                      | See Organization Structure | No   |
| ```/management/employee```   | Manage Employees           | Yes  |
| ```/management/division```   | Manage Divisions           | Yes  |
| ```/management/department``` | Manage Departments         | Yes  |
| ```/management/team```       | Manage Teams               | Yes  |
| ```/management/login```      | Login User                 | No   |
| ```/management/register```   | Register User              | No   |

### Notice:
Register as user befor going to ```management``` routes

## What's Run
- Laravel
- Redis
- MariaDB
- Docker
