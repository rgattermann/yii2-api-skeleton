<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => getenv('DB_DSN'),
    'username' => getenv('DB_USERNAME'),
    'password' => getenv('DB_PASSWORD'),
    'charset' => 'utf8',
    'enableSchemaCache' => true,
    'schemaCacheDuration' => 864000,
    'schemaCache' => 'cache',
    'on afterOpen'  => function ($event) {
        $event->sender->createCommand('ALTER SESSION SET NLS_NUMERIC_CHARACTERS = ". "')->execute();
        $event->sender->createCommand('ALTER SESSION SET NLS_TIMESTAMP_TZ_FORMAT = "YYYY-MM-DD HH24:MI:SSXFF TZR"')->execute();
        $event->sender->createCommand('ALTER SESSION SET NLS_TIMESTAMP_FORMAT = "YYYY-MM-DD HH24:MI:SSXFF"')->execute();
        $event->sender->createCommand('ALTER SESSION SET NLS_DATE_FORMAT = "YYYY-MM-DD"')->execute();
    }
];
