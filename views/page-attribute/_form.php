<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use mirkhamidov\seo\models\SeoPage;
use mirkhamidov\seo\models\SeoAttribute;

/* @var $this yii\web\View */
/* @var $model mirkhamidov\seo\models\SeoPageAttribute */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="seo-page-attribute-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'page_id')->dropDownList(ArrayHelper::map(SeoPage::listAll(), 'id', 'route'), ['prompt' => '']) ?>

    <?= $form->field($model, 'attribute_id')->dropDownList(ArrayHelper::map(SeoAttribute::listAll(), 'id', 'name'), ['prompt' => '']) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
