## Modularity

Attendize is sporting an incredibly powerful modularity framework,
 and can easily be extended though modules.

### Installation
 Modules can only be installed by the sysadmin, but installed modules
 can be enabled and disabled on a per-event basis.

 Installing a module is just like installing a composer package.
 Add the module's Github link to modules.json and run
 <code>php artisan module:install</code>

 Once the module has been installed, you'll be able to enable it
 from the event dashboard ( */event/$eventId/modules* )

### Creating Module
 To create a module just run this command:

 * run <code>php artisan module:make $moduleName</code>

 After this you have a mini-version of a full Laravel app.
 It takes advantage of the Laravel app that it is a part of.

 There are a few guidelines to keep modules in sync with the rest
 of the app.

## Guidelines

### Routes

 **Backend** Routes for a module consists of 3 segments like this:
 * module
 * $eventId
 * $moduleName

 You will then get a route that looks like:
 <code>/module/1/volunteer</code>

 **Frontend** routes will have the following format
 * m
 * $eventId
 * $moduleName

 Giving you a route that looks like:
 <code>/m/1/volunteer</code>


 This format follows the rest of the *Attendize* code,
 and should make maintaining easier in the long run.

 It is also possible for a Module to overwrite generic routes,
 allowing for a module to create a front-page, or disallow new users.

### Migrations
Database tables should be prefixed with the module-name
to prevent potential conflicts.

This would mean that the users table from the Volunteers module
would be named:
<code>volunteers_users</code>

### Controllers

Controllers should extend <code>App\Http\Controllers\MyModuleController</code>
as it will automatically block requests to *disabled* modules.
MyModuleController will also populate all Module-views with relevant
variables.


### Views

Default Views should extend <code>Shared.Layouts.Master</code>

**HTML id's** in views should also be prefixed with the module-name
to prevent conflicts