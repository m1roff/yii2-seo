<?php

use yii\helpers\Html;
use yii\grid\GridView;
use mirkhamidov\seo\Module;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('app', 'Seo Pages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seo-page-index">

    <p>
        <?= Html::a(Module::t('app', 'Create Seo Page'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'route',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
