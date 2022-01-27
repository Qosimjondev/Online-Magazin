<?php

use kartik\switchinput\SwitchInput;
use yii\helpers\Html;
use yeesoft\multilingual\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $model common\models\Brand */
/* @var $form yii\widgets\ActiveForm */
?>

    <?php $form = ActiveForm::begin([
            'id'=>'my-data'
    ]); ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>


            <?= $form->field($model, 'status')->widget(SwitchInput::class) ?>

    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success', 'id'=>'save-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>
