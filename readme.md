# Sample API

This is a repo which provide sample RESTful API to CRUD post & tag. One post has many tags and otherwise.

## Server Requirements

* [Laravel 5.5](https://laravel.com/docs/5.2)
* [Git](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git)
* [memcached](http://memcached.org/)

## Installation on Mac
### Clone the source code
```
cd ~
git clone https://github.com/tailehuu/laravel-sample-api.git
cd laravel-sample-api
```
### Update app's configuration in __.env__ file
```
...
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sampleapi
DB_USERNAME=root
DB_PASSWORD=

CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MEMCACHED_HOST=127.0.0.1
MEMCACHED_PORT=11211

MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=xxx
MAIL_PASSWORD=yyy
MAIL_ENCRYPTION=tls

ADMIN_EMAIL_ADDRESS=admin@example.com
ADMIN_NAME=admin
```
### Update composer
```
composer update
```   
### Create tables & dummies data
```
php artisan migrate:refresh --seed
```
### Start server
```
php artisan serve
```
## Usage


| Method    | URI                       | Description |
|:----------|:--------------------------|:-----------|
| GET/HEAD  | post                      | get all posts |
| POST      | post                      | create a post |
| PUT/PATCH | post/{post}               | update a post |
| DELETE    | post/{post}               | delete a post |
| GET/HEAD  | post/{post}               | show a post |
| POST      | post/getPostsByTags       | get posts by tags |
| POST      | post/{post}/addTagsToPost | add tags to post |
| POST      | post/countPostsByTags     | count posts by tags |
| GET/HEAD  | tag                       | get all tags |
| POST      | tag                       | create a tag |
| PUT/PATCH | tag/{tag}                 | update a tag |
| GET/HEAD  | tag/{tag}                 | show a tag |
| DELETE    | tag/{tag}                 | delete a tag |