<?php

return array(

    'default' => 'mysql',
    'connections' => array(
        'mysql' => array(
            'driver'    => 'mysql',
            'host'      => $_ENV['OPENSHIFT_MYSQL_DB_HOST'],
            'port'      => $_ENV['OPENSHIFT_MYSQL_DB_PORT'],
            'database'  => $_ENV['OPENSHIFT_APP_NAME'],
            'username'  => $_ENV['OPENSHIFT_MYSQL_DB_USERNAME'],
            'password'  => $_ENV['OPENSHIFT_MYSQL_DB_PASSWORD'],
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ),
    ),

);
