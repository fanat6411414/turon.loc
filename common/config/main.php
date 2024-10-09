<?php

use kartik\mpdf\Pdf;

return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'name' => 'Turon universiteti',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => \yii\caching\FileCache::class,
        ],
        'mailer'             => [
            'class'            => \yii\symfonymailer\Mailer::class,
            'viewPath'         => '@common/mail',
            'transport'        => [
                'class'      => 'Swift_SmtpTransport',
                'host'       => env('SMTP_HOST'),
                'username'   => env('EMAIL_LOGIN'),
                'password'   => env('EMAIL_PASSWORD'),
                'port'       => env('SMTP_PORT'),
                'encryption' => 'tls',
            ],
            'useFileTransport' => false,
        ],
        'db'                 => require(__DIR__ . '/db.php'),
        'redis'              => [
            'class'    => 'yii\redis\Connection',
            'hostname' => env('REDIS_HOST') ?: 'localhost',
            'port'     => 6379,
            'database' => YII_DEBUG ? 0 : 1,
        ],
        'formatter'          => [
//            'class'             => 'common\components\Formatter',
            'currencyCode'      => 'UZS',
            'dateFormat'        => 'dd.MM.yyyy',
            'datetimeFormat'    => 'dd.MM.yyyy HH:mm:ss',
            'decimalSeparator'  => '.',
            'thousandSeparator' => ' ',
            'timeZone'          => 'Asia/Samarkand',
            'defaultTimeZone'   => 'Asia/Samarkand',
        ],
        'pdf' => [
            'class' => Pdf::classname(),
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            // refer settings section for all configuration options
        ]
    ],
];
