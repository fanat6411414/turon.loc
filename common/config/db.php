<?php
return [
    'class' => 'yii\db\Connection',
    'dsn' => env('DB_DSN'),
    'username' => env('DB_USERNAME'),
    'password' => env('DB_PASSWORD'),
    'charset' => 'utf8',
    'enableSchemaCache' => true,
    'enableQueryCache' => !env('YII_DEBUG'),
    'schemaCacheDuration' => 300,
    'queryCacheDuration' => 3600,
//    'on afterOpen' => function ($event) {
//        $event->sender->createCommand("SET TIME ZONE 'UTC';")->execute();
//    },
];