# How can I use Carbon in a Laravel 4 project?

There are two methods:

## Method 1
Every time you need Carbon, you call it as `Carbon\Carbon` (ie: `$carbon = new Carbon\Carbon;`)

## Method 2
Add to the `aliases` array in `app/config/app.conf` the following line:

        'Carbon'          => 'Carbon\Carbon',

Now you can call it from everywhere in the project in the classic way: `$carbon = new Carbon;`.

{"tags": ["Carbon", "aliases", "namespaces"]}
