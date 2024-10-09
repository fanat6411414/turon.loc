<?php

use yii\helpers\Url;

?>
<div class="btn-group">
    <button class="dropdown-toggle text-white" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="/images/icon/ru.svg" alt="German"> Русский
    </button>
    <div class="dropdown-menu" style="z-index: 9999;">
        <a class="dropdown-item" href="<?= Url::current(['language' => 'oz']) ?>">
            <img src="/images/icon/uz.svg" alt="French"> O'zbek
        </a>
        <a class="dropdown-item" href="<?= Url::current(['language' => 'uz']) ?>">
            <img src="/images/icon/uz.svg" alt="French"> Ўзбек
        </a>
        <a class="dropdown-item" href="<?= Url::current(['language' => 'en']) ?>">
            <img src="/images/icon/en.svg" alt="English"> English
        </a>
    </div>
</div>