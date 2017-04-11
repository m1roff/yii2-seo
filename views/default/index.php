<?php

use \yii\helpers\Html;

?>

<div class="seo-default-index">
    <p>
        <?= Html::a('Управление страницами', ['/seo/page-attribute'], ['class' => 'btn btn-success']) ?>
    </p>
    <p>
        <?= Html::a('Список атрибутов', ['/seo/attribute'], ['class' => 'btn btn-success']) ?>
    </p>
    <p>
        <?= Html::a('Список страниц', ['/seo/page'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
