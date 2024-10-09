<?php
return [
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'class' => 'codemix\localeurls\UrlManager',
    'languages' => ['oz','uz','ru','en'],
    'enableDefaultLanguageUrlCode' => false,
    'rules' => [
        '' => 'site/index',
//        [
//            'class' => 'yii\rest\UrlRule',
//            'controller' => 'v1/auth',
//            'extraPatterns' => [
//                'POST reg' => 'reg',
//                'POST auth/login' => 'login',
//
//            ],
//            'pluralize' => false,
//        ],
//        [
//            'class' => 'yii\rest\UrlRule',
//            'controller' => 'rest/city',
//            'extraPatterns' => [
//                'DELETE {id}' => 'delete',
//            ],
//
//        ],
    ],
    'ignoreLanguageUrlPatterns' => [
        '#^admin/#' => '#^admin/#',
    ],
];