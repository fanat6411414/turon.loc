<?php

use dosamigos\chartjs\ChartJs;

/** @var $stats */
/** @var $chart */

$this->title = 'Dashboard';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => $stats['warning'].' TA',
                'text' => 'Jarayondagi arizalar',
                'theme' => 'warning',
                'icon' => 'fa fa-check',
                'linkUrl' => ['applications/not-nompleted'],
                'linkText' => 'Barchasini ko\'rish',
            ]) ?>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => $stats['done'].' TA',
                'text' => 'Qabul qilingan arizalar',
                'theme' => 'success',
                'icon' => 'fa fa-check-double',
                'linkUrl' => ['applications/list'],
                'linkText' => 'Barchasini ko\'rish',
            ]) ?>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => $stats['edu'].' TA',
                'text' => 'Ikkinchi mutaxassislik',
                'theme' => 'danger',
                'icon' => 'fa fa-clock',
                'linkUrl' => ['second/list'],
                'linkText' => 'Barchasini ko\'rish',
            ]) ?>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => $stats['transfer'].' TA',
                'text' => 'O\'qishni ko\'chirish bo\'yicha arizalar',
                'icon' => 'fa fa-check-double',
                'linkUrl' => ['transfer/list'],
                'linkText' => 'Barchasini ko\'rish',
            ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card-body card">
                <?= ChartJs::widget([
                    'type' => 'line',
                    'options' => [
                        'height' => 120,
                        'width' => 400
                    ],
                    'data' => [
                        'labels' => ["Yanvar", "Fevral", "Mart", "April", "May", "Iyun", "Iyul", "Avgust", "Sentyabr","Oktyabr", "Noyabr", "Dekabr"],
                        'datasets' => [
                            [
                                'label' => "Abiturientlar",
                                'backgroundColor' => "rgba(179,181,198,0.3)",
                                'borderColor' => "rgba(6,141,0,1)",
                                'pointBackgroundColor' => "rgba(179,181,198,1)",
                                'pointBorderColor' => "#fff",
                                'pointHoverBackgroundColor' => "#fff",
                                'pointHoverBorderColor' => "rgba(179,181,198,1)",
                                'data' => $chart['bar'][0]
                            ],
                            [
                                'label' => "Ikkinchi mutahassislik",
                                'backgroundColor' => "rgba(255,99,132,0.2)",
                                'borderColor' => "rgba(220,53,69,1)",
                                'pointBackgroundColor' => "rgba(255,99,132,1)",
                                'pointBorderColor' => "#fff",
                                'pointHoverBackgroundColor' => "#fff",
                                'pointHoverBorderColor' => "rgba(255,99,132,1)",
                                'data' => $chart['bar'][1]
                            ],
                            [
                                'label' => "O'qishni ko'chirish",
                                'backgroundColor' => "rgba(17,102,118,0.3)",
                                'borderColor' => "rgba(23,162,184,1)",
                                'pointBackgroundColor' => "rgba(255,99,132,1)",
                                'pointBorderColor' => "#fff",
                                'pointHoverBackgroundColor' => "#fff",
                                'pointHoverBorderColor' => "rgba(255,99,132,1)",
                                'data' => $chart['bar'][2]
                            ]
                        ]
                    ]
                ]); ?>
            </div>
        </div>
    </div>
</div>