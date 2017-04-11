<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model mirkhamidov\seo\models\SeoPageAttribute */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Seo Page Attributes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $this->title];
?>
<div class="seo-page-attribute-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
