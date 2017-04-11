<?php

use mirkhamidov\seo\Module;


/* @var $this yii\web\View */
/* @var $model mirkhamidov\seo\models\SeoPageAttribute */

$this->title = Module::t('app', 'Create Seo Page Attribute');
$this->params['breadcrumbs'][] = ['label' => Module::t('app', 'Seo Page Attributes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seo-page-attribute-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
