<?php
    /* @var $id */
    /* @var $class */
    /* @var $size */
    /* @var $title */
    /* @var $content */
?>
<div class="modal fade" id="<?= $id ?>">
    <div class="modal-dialog <?=$size?>">
        <div class="modal-content <?= $class ?>">
            <div class="modal-header">
                <h4 class="modal-title"><?= $title ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body"><?= $content ?></div>
        </div>
    </div>
</div>