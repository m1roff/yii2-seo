<?php

use mirkhamidov\seo\Module;

/* @var $this yii\web\View */
/* @var $model mirkhamidov\seo\models\SeoPage */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Module::t('app', 'Seo Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="seo-page-update">

    <?= $this->render('_form', [
        'model' => $model,
        'pageAttributes' => $pageAttributes,
    ]) ?>

</div>
