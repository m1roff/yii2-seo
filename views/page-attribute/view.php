<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use mirkhamidov\seo\Module;

/* @var $this yii\web\View */
/* @var $model mirkhamidov\seo\models\SeoPageAttribute */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Module::t('app', 'Seo Page Attributes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seo-page-attribute-view">

    <p>
        <?= Html::a(Module::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Module::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Module::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'page_id',
                'value' => $model->pageRoute->route,
            ],
            [
                'label' => 'attribute_id',
                'value' => $model->tagName->name,
            ],
            'content:ntext',
        ],
    ]) ?>

</div>
