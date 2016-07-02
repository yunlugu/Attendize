## Modularity

Attendize is sporting an incredibly powerful modularity framework,
and can easily be extended though modules.

### What are the modules capable of?

The Modules function as a miniature Laravel installation inside the
main installation.
This allows for incredibly powerful implementations, because
a module may overrule a built-in route and thus customize even
native Attendize methods.

Every module also includes it's own `composer.json` and may require packages
just like the main Laravel installation.

### Installation
Modules can only be installed by the sysadmin, but installed modules
can be enabled and disabled on a per-event basis.

Installing a module is super easy, all you have to do is run:

`php artisan module:install($author/$package, $branch)`
NOTE: $branch defaults to 'dev-master'.

eg. `php artisan module:install japseyz/attendize-volunteers master

It then get's that module off of Packagist.

It's now time to publish the modules assets and run the migrations, this is done with
the following commands:

`php artisan module:publish` Optionally you may append a module name to publish only
that modules assets.

`php artisan module:migrate` Again this optionally takes a module name as a parameter.

Once the module has been installed, you'll be able to enable it
from the event dashboard ( */event/$eventId/modules* )

### Updating Module dependencies

To update a module you may do `php artisan module:update $moduleName`

### Creating Module
To create a module just run this command:

* run `php artisan module:make $moduleName`

After this you have a mini-version of a full Laravel app.
It takes advantage of the Laravel app that it is a part of.


### Artisan for modules
To generate controllers, models middleware etc. for modules the syntax is
almost the same, follow this convention:

`php artisan module:make-$type $name $moduleName`

This would give you something that looks like this:

`php artisan module:make-controller UsersController Volunteers`

There are a few guidelines to keep modules in sync with the rest
of the app.

## Guidelines

### Routes

**Backend** Routes for a module consists of 3 segments like this:
* module
* $eventId
* $moduleName

You will then get a route that looks like:
`/module/1/volunteers`

**Frontend** routes will have the following format
* m
* $eventId
* $moduleName

Giving you a route that looks like:
`/m/1/volunteers`


This format follows the rest of the *Attendize* code,
and should make maintaining easier in the long run.

It is also possible for a Module to overwrite generic routes,
allowing for a module to create a front-page, or disallow new users.

### Migrations
Database tables should be prefixed with the module-name
to prevent potential conflicts.

This would mean that the users table from the Volunteers module
would be named:
`volunteers_users`

### Controllers

Controllers should extend `App\Http\Controllers\MyModuleController`
as it will automatically block requests to *disabled* modules.
MyModuleController will also populate all Module-views with relevant
variables.


### Views

Default Views should extend `Shared.Layouts.Master`

**HTML ids** in views should also be prefixed with the module-name
to prevent conflicts

## TODO:
* Improve Documentation
