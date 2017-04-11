<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mirkhamidov\seo\Module;

/* @var $this yii\web\View */
/* @var $model mirkhamidov\seo\models\SeoPage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="seo-page-form">

    <?php $form = ActiveForm::begin([
        'enableClientValidation' => false,
    ]); ?>

    <?= $form->field($model, 'route')->textInput(['maxlength' => true]) ?>

    <?php foreach ($pageAttributes as $i=>$attribute): ?>
        <?= $form->field($attribute, '[' . $i . ']content')->textInput()->label($attribute->labelForm) ?>
    <?php endforeach; ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Module::t('app', 'Create') : Module::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
