<?php

use mirkhamidov\seo\Module;

/* @var $this yii\web\View */
/* @var $model mirkhamidov\seo\models\SeoAttribute */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Module::t('app', 'Seo Attributes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $this->title];
?>
<div class="seo-attribute-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
