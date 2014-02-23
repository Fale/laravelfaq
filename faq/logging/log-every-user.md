# How can I log all user requests?

You can do it like this:

## Create a migration

    ~/myapp$ php artisan migrate:create create_activity_table

Change the generated file replacing the up method with:

    public function up()
    {
        Schema::create('activities', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('datetime');
            $table->string('ip');
            $table->string('uri');
        });
    }

## Create a model
Create the file `~/myapp/app/models/Activity.php` with content:

    class Activity extends Eloquent {
        public $timestamps = false;
    }

## Add call from filter
Edit the `~/myapp/app/filter.php` file adding to the `App::after` function the following code:

    $a = new Activity();
    $a->datetime = Carbon::now();
    $a->ip = Request::getClientIp();
    $a->uri = Request::path();
    $a->save();

If you are using Red Hat OpenShift, subsitute the third line with this one:

    $a->ip = Request::header('X-Forwarded-For');

## See access logs
Now to see the access logs you can add in a controller:

    $activities = Activity::all();
    return Response::json(array(
            'error' => false,
            'activity' => $activities->toArray()
        ), 200
    )->setCallback(Input::get('callback'));

## Filter access logs
Some times you will want to hide all private addresses. To do it, just add between the two commands this one:

    $activities = $activities->filter(function($activity)
    {
        if (!preg_match("/^10\..*/i", $activity->ip))
            if (!preg_match("/^127\..*/i", $activity->ip))
                if (!preg_match("/^192\.168\..*/i", $activity->ip))
                    return $activity;
    });

{"tags": ["users", "logs", "security", "statistics", "OpenShift", "Red Hat", "Eloquent", "model", "migration", "filters"]}
