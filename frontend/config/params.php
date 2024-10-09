<?php
return [
    'adminEmail' => 'fanat6411414@gmail.com',
    'email' => 'fanat6411414@gmail.com',
    'hail812/yii2-adminlte3' => [
        'pluginMap' => [
            'sweetalert2' => [
                'css' => 'sweetalert2-theme-bootstrap-4/bootstrap-4.min.css',
                'js' => 'sweetalert2/sweetalert2.min.js'
            ],
            'toastr' => [
                'css' => ['toastr/toastr.min.css'],
                'js' => ['toastr/toastr.min.js']
            ],
        ]
    ],
    'bsDependencyEnabled' => false,
    'bsVersion' => '4.6.2',
    'backendMenu' => [

        'edu' => [
            'label' => 'Mutaxassislik',
            'icon' => 'address-book',
            'iconStyle' => 'fas',
            'url' => ['edu/list']
        ],
        'academ' => [
            'icon'  => 'folder-open',
            'label' => 'Qabul ma\'lumotlar',
            'items' => [
                'academ/years' => [
                    'label' => 'O\'quv yili',
                    'url'   => ['academ/years'],
                ],
                'academ/education' => [
                    'label' => 'Ma\'lumoti',
                    'url'   => ['academ/education'],
                ],
                'academ/education-type' => [
                    'label' => 'Ta\'lim muassasasi',
                    'url'   => ['academ/education-type'],
                ],
                'academ/program' => [
                    'label' => 'Ta\'lim turi',
                    'url'   => ['academ/program'],
                ],
                'academ/language' => [
                    'label' => 'Ta\'lim tili',
                    'url'   => ['academ/language'],
                ],
                'academ/form' => [
                    'label' => 'Ta\'lim shakli',
                    'url'   => ['academ/form'],
                ],
                'academ/directions' => [
                    'label' => 'Ta\'lim yo‘nalishi',
                    'url'   => ['academ/directions'],
                ],
            ],
        ],

        'archive'            => [
            'icon'  => 'archive',
            'label' => 'Archive',
            'url'   => '#',
            'items' => [
                'archive/academic-record'           => [
                    'label' => 'Academic record',
                    'url'   => 'archive/academic-record',
                ],
                'archive/diploma'                   => [
                    'label' => 'Diploma Registration',
                    'url'   => 'archive/diploma',
                ],
                'archive/diploma-blank'             => [
                    'label' => 'Diploma Blank',
                    'url'   => 'archive/diploma-blank',
                ],
                'archive/diploma-list'              => [
                    'label' => 'Diploma List',
                    'url'   => 'archive/diploma-list',
                ],
                'archive/transcript'                => [
                    'label' => 'Academic Information',
                    'url'   => 'archive/transcript',
                ],
                'archive/academic-information-data' => [
                    'label' => 'Academic Information Data',
                    'url'   => 'archive/academic-information-data',
                ],
                'archive/accreditation'             => [
                    'label' => 'Accreditation',
                    'url'   => 'archive/accreditation',
                ],
                'archive/batch-rate'                => [
                    'label' => 'Batch Rate',
                    'url'   => 'archive/batch-rate',
                ],
                'archive/employment'                => [
                    'label' => 'Graduate Employment',
                    'url'   => 'archive/employment',
                ],
                'archive/certificate-committee'     => [
                    'label' => 'Certificate Committee',
                    'url'   => 'archive/certificate-committee',
                ],
                'archive/graduate-work'             => [
                    'label' => 'Graduate Work',
                    'url'   => 'archive/graduate-work',
                ],
                'archive/academic-sheet'            => [
                    'label' => 'Archive Academic Sheet',
                    'url'   => 'archive/academic-sheet',
                ],
                'archive/reference'                 => [
                    'label' => 'Archive Reference',
                    'url'   => 'archive/reference',
                ],
                'archive/circulation-sheet'         => [
                    'label' => 'Archive Circulation Sheet',
                    'url'   => 'archive/circulation-sheet',
                ],
                'archive/circulation-sheet-check'   => [
                    'label' => 'Archive Circulation Sheet Check',
                    'url'   => 'archive/circulation-sheet-check',
                ],
                'archive/call-sheet'                => [
                    'label' => 'Call Sheet',
                    'url'   => 'archive/call-sheet',
                ],
                'archive/certificate'               => [
                    'label' => 'Certificate',
                    'url'   => 'archive/certificate',
                ]

            ],
        ],
        'message'      => [
            'icon'  => 'envelope',
            'label' => 'Messages',
            'url'   => 'message/my-messages',
            'items' => [
                'message/index'       => [
                    'label' => 'All Messages',
                    'url'   => 'message/all-messages',
                ],
                'message/my-messages' => [
                    'label' => 'My Messages',
                    'url'   => 'message/my-messages',
                ],
                'message/compose'     => [
                    'label' => 'Compose',
                    'url'   => 'message/compose',
                ],
            ],
        ],

        /*'file-manager' => [
            'icon' => 'folder',
            'label' => 'File Manager',
            'url' => 'files/manager',
            'items' => [
                'files/manager' => [
                    'label' => 'File Manager',
                    'url' => 'files/manager',
                ],
            ],
        ],*/
    ],
];
