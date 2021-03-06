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
chmod -R 777 storage/
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
*[Allowing less secure apps to access your account](https://support.google.com/accounts/answer/6010255?hl=en) when using Google SMTP server.*

### Install composer
```
composer install
```   
### Create tables & dummies data
```
php artisan migrate:refresh --seed
```
### Testing
```
phpunit
```
### Start server
```
php artisan serve
```
Then development server started on http://localhost:8000. You can use [PostMan](https://chrome.google.com/webstore/detail/postman/fhbjgbiflinjbdggehcddcbncdddomop?hl=en) to test it out. 

## Usage


| Method    | URI                       |  Description  |
|:----------|:--------------------------|:--------------|
| GET/HEAD  | post                      | Get all posts |
| POST      | post                      | Create a post |
| PUT/PATCH | post/{post}               | Update a post |
| DELETE    | post/{post}               | Delete a post |
| GET/HEAD  | post/{post}               | Show a post   |
| POST      | post/getPostsByTags       | Get posts by tags   |
| POST      | post/{post}/addTagsToPost | Add tags to post    |
| POST      | post/countPostsByTags     | Count posts by tags |
| GET/HEAD  | tag                       | Get all tags  |
| POST      | tag                       | Create a tag  |
| PUT/PATCH | tag/{tag}                 | Update a tag  |
| GET/HEAD  | tag/{tag}                 | Show a tag    |
| DELETE    | tag/{tag}                 | Delete a tag  |

For getPostsByTags, addTagsToPost & countPostsByTags, we require **'tags_id[]'** is the name param.

Example:
```
# get posts
curl -i -H "Accept: application/json" -H "Content-Type: application/json" -X GET http://localhost:8000/post
# create post
curl -X POST -H "Content-Type: application/json" -d '{"title":"xyz”,"body":"xyz”}' http://localhost:8000/post
```