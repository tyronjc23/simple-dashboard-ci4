# Simple Dashboard using CodeIgniter 4 & AdminLTE

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](https://codeigniter.com).

This repository holds a composer-installable app starter.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [CodeIgniter 4](https://forum.codeigniter.com/forumdisplay.php?fid=28) on the forums.

The user guide corresponding to the latest version of the framework can be found
[here](https://codeigniter4.github.io/userguide/).

## Installation

```
composer install --no-dev
```

## Setup

Copy `env` to `.env` for custom setup. Original setup from `env` using hostname `localhost`, database name `mega_test_ci4`
username and password `root`, and port 3306.

### Migration

Create new database

```
php spark db:create mega_test_ci4
```

Database migration

```
php spark migrate
```

Dummy Data

```
php spark db:seed DataSeeder
```

Run Applications

```
php spark serve
```

Application running at [localhost:8080](http://localhost:8080).

## Server Requirements

PHP version 7.4 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

Database MySQL version 5.7
