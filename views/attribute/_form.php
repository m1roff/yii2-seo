<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mirkhamidov\seo\models\SeoAttribute;

/* @var $this yii\web\View */
/* @var $model mirkhamidov\seo\models\SeoAttribute */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="seo-attribute-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList(SeoAttribute::$types, ['prompt' => '']) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
