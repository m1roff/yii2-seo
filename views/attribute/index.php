<?php

use yii\helpers\Html;
use yii\grid\GridView;
use mirkhamidov\seo\Module;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('app', 'Seo Attributes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seo-attribute-index">

    <p>
        <?= Html::a(Module::t('app', 'Create Seo Attribute'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            'type',
            'description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
