<?php
    $url = \common\models\MenuType::getUrlArray($menu);
?>
<div class="main-menu">
    <nav style="display: block;">
        <ul>
            <?php if($menu['parent']==0): ?>
                <?php if( isset ($menu['childs'])): ?>
                    <li>
                        <a href="<?=$url?>"><?= $menu['name']?> <i class="fa-solid fa-angle-down"></i></a>
                        <ul class="sub-menu">
                            <?= $this->getMenuHtml($menu['childs']); ?>
                        </ul>
                    </li>
                <?php else: ?>
                    <li><a href="<?=$url?>"><?= $menu['name']?></a></li>
                <?php endif; ?>
            <?php else: ?>
                <?php if( isset ($menu['childs'])): ?>
                    <li>
                        <a href="<?=$url?>"><?= $menu['name']?> <i class="fa-solid fa-angle-down"></i></a>
                        <ul class="sub-sub-menu">
                            <?= $this->getMenuHtml($menu['childs']); ?>
                        </ul>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="<?=$url?>"><?= $menu['name']?></a>
                    </li>
                <?php endif; ?>
            <?php endif;?>
        </ul>
    </nav>
</div>