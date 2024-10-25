<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/" class="brand-link">
        <span class="brand-text font-weight-light ml-3">Admin panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <i class="fa fa-user-alt fa-2x text-white"></i>
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= Yii::$app->user->identity['_name']?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    ['label' => 'Dashboard', 'url' => ['/site/index'], 'icon' => 'th', 'iconStyle' => 'fas'],
                    ['label' => 'Asosiy menyular', 'header' => true],
                    [
                        'icon'  => 'newspaper',
                        'iconStyle' => 'fas',
                        'label' => 'Yangiliklar',
                        'items' => [
                            [
                                'label' => 'Ruyhati',
                                'url'   => ['/news/index'],
                                'iconStyle' => 'fa',
                                'icon'  => 'list text-success',
                            ],
                            [
                                'label' => 'Kategoriya',
                                'url'   => ['/news-type/index'],
                                'iconStyle' => 'fa',
                                'icon'  => 'sitemap text-warning',
                            ],
                        ],
                    ],
                    [
                        'icon'  => 'sitemap',
                        'label' => 'Tuzilma',
                        'items' => [
                            [
                                'label' => 'Rahbariyat',
                                'url'   => ['/manager/index'],
                            ],
                            [
                                'label' => 'Fakultetlar',
                                'url'   => ['/fakultet/index'],
                            ],
                            [
                                'label' => 'Kafedralar',
                                'url'   => ['/kafedra/index'],
                            ],
                            [
                                'label' => 'Bo\'limlar',
                                'url'   => ['/bulim/index'],
                            ],
                        ],
                    ],
                    [
                        'icon'  => 'project-diagram',
                        'label' => 'Menyular',
                        'items' => [
                            [
                                'label' => 'Asosiy menyular',
                                'url'   => ['/menus/index'],
                            ],
                            [
                                'label' => 'Footer menyular',
                                'url'   => ['/menu-footer/index'],
                            ],
                        ],
                    ],
                    ['label' => 'Sahifalar',  'icon' => 'window-restore', 'url' => ['/pages/index']],
                    ['label' => 'Xodimlar',  'icon' => 'users', 'url' => ['/managers/index']],
                    ['label' => 'Fayl menejeri',  'icon' => 'file-image', 'url' => ['/file-manager/index']],
                    [
                        'icon'  => 'user-graduate',
                        'label' => 'Qabul',
                        'items' => [
                            [
                                'label' => 'Bog\'lanish',
                                'url'   => ['/qabul/ariza-list'],
                            ],
                            [
                                'label' => 'Yunalishlar',
                                'url'   => ['/qabul/edu-list'],
                            ],
                            [
                                'label' => 'Banner',
                                'url'   => ['/qabul/banner-list'],
                            ],
                        ],
                    ],
                    ['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Statik ma\'lumotlar', 'header' => true],
                    [
                        'icon'  => 'globe',
                        'label' => 'Foydali havolalar',
                        'url' => ['/usefull/index']
                    ],
                    [
                        'icon'  => 'id-card',
                        'iconStyle' => 'fa',
                        'label' => 'Aloqa',
                        'url' => ['/config/contact']
                    ],
                    [
                        'icon'  => 'instagram',
                        'iconStyle' => 'fab',
                        'label' => 'Ijtimoiy tarmoqlar',
                        'url' => ['/config/social']
                    ],
                    [
                        'icon'  => 'chart-bar',
                        'iconStyle' => 'fa',
                        'label' => 'Statistika',
                        'url' => ['/config/statistik']
                    ],
                    ['label' => 'Administrator', 'header' => true],
                    'system' => [
                        'icon'  => 'cog',
                        'iconStyle' => 'fas',
                        'label' => 'System',
                        'items' => [
                            'file-resource/manager' => [
                                'label' => 'File Resource Manager',
                                'url'   => 'file-resource/manager',
                            ],
                            'system/setting'          => [
                                'label' => 'Sozlamalar',
                                'url'   => ['/config/config'],
                            ],
                            'system/users'          => [
                                'label' => 'Administrators',
                                'url'   => ['system/users'],
                            ],
                            'system/admin'          => [
                                'label' => 'Administrators',
                                'url'   => 'system/admin',
                            ],
                            'system/role'           => [
                                'label' => 'Administrator Roles',
                                'url'   => 'system/role',
                            ],
                            'system/login'          => [
                                'label' => 'Login History',
                                'url'   => 'system/login',
                            ],
                            'system/system-log'     => [
                                'label' => 'System Logs',
                                'url'   => 'system/system-log',
                            ],
                            'system/configuration'  => [
                                'label' => 'Configuration',
                                'url'   => 'system/configuration',
                            ],
                            'system/classifier'     => [
                                'label' => 'Classifiers',
                                'url'   => 'system/classifier',
                            ],
                        ],
                    ],
                ],
            ]);
            ?>
        </nav>
    </div>
</aside>