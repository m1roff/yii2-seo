<?php

use mirkhamidov\seo\Module;


/* @var $this yii\web\View */
/* @var $model mirkhamidov\seo\models\SeoPage */

$this->title = Module::t('app', 'Create Seo Page');
$this->params['breadcrumbs'][] = ['label' => Module::t('app', 'Seo Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seo-page-create">

    <?= $this->render('_form', [
        'model' => $model,
        'pageAttributes' => $pageAttributes,
    ]) ?>

</div>
