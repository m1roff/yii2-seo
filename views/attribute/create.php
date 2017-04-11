<?php

use yii\helpers\Html;
use mirkhamidov\seo\Module;


/* @var $this yii\web\View */
/* @var $model mirkhamidov\seo\models\SeoAttribute */

$this->title = Module::t('app', 'Create Seo Attribute');
$this->params['breadcrumbs'][] = ['label' => Module::t('app', 'Seo Attributes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seo-attribute-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
