# Sample API


This is a repo which provide sample RESTful API to CRUD post & tag. One post has many tags and otherwise.

## Server Requirements

* [Laravel 5.5](https://laravel.com/docs/5.2)
* [Git](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git)
* [memcached](http://memcached.org/)

## Installation on Mac
* Clone the source code


    cd ~
    git clone https://github.com/tailehuu/laravel-sample-api.git
    cd laravel-sample-api

* Update app's configuration like database info, mail info, memcached... in **.env** file

* Update composer
# Sample API


This is a repo which provide sample RESTful API to CRUD post & tag. One post has many tags and otherwise.

## Server Requirements

* [Laravel 5.5](https://laravel.com/docs/5.2)
* [Git](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git)
* [memcached](http://memcached.org/)

## Installation on Mac
* Clone the source code

```
cd ~
git clone https://github.com/tailehuu/laravel-sample-api.git
cd laravel-sample-api
```

* Update app's configuration like database info, mail info, memcached... in **.env** file

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
* Update composer
```
composer update
```
* Create tables & dummies data
```
php artisan migrate:refresh --seed
```
* Start server
```
php artisan serve
```
## Usage


| Method    | URI                       | Name         | Action                                               | Description |
|:----------|:--------------------------|:-------------|:-----------------------------------------------------|:-----------|
| GET/HEAD  | post                      | post.index   | App\Http\Controllers\PostController@index            | get all posts |
| POST      | post                      | post.store   | App\Http\Controllers\PostController@store            | create a post |
| PUT/PATCH | post/{post}               | post.update  | App\Http\Controllers\PostController@update           | update a post |
| DELETE    | post/{post}               | post.destroy | App\Http\Controllers\PostController@destroy          | delete a post |
| GET/HEAD  | post/{post}               | post.show    | App\Http\Controllers\PostController@show             | show a post |
| POST      | post/getPostsByTags       | ..           | App\Http\Controllers\PostController@getPostsByTags   | get posts by tags |
| POST      | post/{post}/addTagsToPost | ..           | App\Http\Controllers\PostController@addTagsToPost    | add tags to post |
| POST      | post/countPostsByTags     | ..           | App\Http\Controllers\PostController@countPostsByTags | count posts by tags |
| GET/HEAD  | tag                       | tag.index    | App\Http\Controllers\TagController@index             | get all tags |
| POST      | tag                       | tag.store    | App\Http\Controllers\TagController@store             | create a tag |
| PUT/PATCH | tag/{tag}                 | tag.update   | App\Http\Controllers\TagController@update            | update a tag |
| GET/HEAD  | tag/{tag}                 | tag.show     | App\Http\Controllers\TagController@show              | show a tag |
| DELETE    | tag/{tag}                 | tag.destroy  | App\Http\Controllers\TagController@destroy           | delete a tag |

    composer update
    
* Create tables & dummies data


    php artisan migrate:refresh --seed
* Start server

    
    php artisan serve


## Usage


| Method    | URI                       | Name         | Action                                               | Description |
|:----------|:--------------------------|:-------------|:-----------------------------------------------------|:-----------|
| GET/HEAD  | post                      | post.index   | App\Http\Controllers\PostController@index            | get all posts |
| POST      | post                      | post.store   | App\Http\Controllers\PostController@store            | create a post |
| PUT/PATCH | post/{post}               | post.update  | App\Http\Controllers\PostController@update           | update a post |
| DELETE    | post/{post}               | post.destroy | App\Http\Controllers\PostController@destroy          | delete a post |
| GET/HEAD  | post/{post}               | post.show    | App\Http\Controllers\PostController@show             | show a post |
| POST      | post/getPostsByTags       | ..           | App\Http\Controllers\PostController@getPostsByTags   | get posts by tags |
| POST      | post/{post}/addTagsToPost | ..           | App\Http\Controllers\PostController@addTagsToPost    | add tags to post |
| POST      | post/countPostsByTags     | ..           | App\Http\Controllers\PostController@countPostsByTags | count posts by tags |
| GET/HEAD  | tag                       | tag.index    | App\Http\Controllers\TagController@index             | get all tags |
| POST      | tag                       | tag.store    | App\Http\Controllers\TagController@store             | create a tag |
| PUT/PATCH | tag/{tag}                 | tag.update   | App\Http\Controllers\TagController@update            | update a tag |
| GET/HEAD  | tag/{tag}                 | tag.show     | App\Http\Controllers\TagController@show              | show a tag |
| DELETE    | tag/{tag}                 | tag.destroy  | App\Http\Controllers\TagController@destroy           | delete a tag |