<?php

use common\models\Brand;
use common\models\Category;
use kartik\file\FileInput;
use kartik\switchinput\SwitchInput;
use mihaildev\ckeditor\CKEditor;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yeesoft\multilingual\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">
                <?= Html::encode($this->title) ?>
            </h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">

    <?php $form = ActiveForm::begin([
            'options'=>['enctype'=>'multipart/form-data']
    ]); ?>
    <?= $form->languageSwitcher($model); ?>

    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(
            Category::findAll(['status'=>true]),
            'id',
        'name'
    ),
    ['prompt'=>'Kategoriyani tanlang...']
    ) ?>


    <?= $form->field($model, 'brand_id')->dropDownList(ArrayHelper::map(
        Brand::findAll(['status'=>true]),
        'id',
        'brand_name'
    ),
        ['prompt'=>'Brendni tanlang...']
    ) ?>
    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'discount')->textInput() ?>

    <?= $form->field($model, 'description1')->widget(CKEditor::class, [
        'editorOptions' => [
            'preset' => 'standard',
            'height'=>250,
            'inline' => false,
        ],
    ]) ?>
    <?= $form->field($model, 'description2')->widget(CKEditor::class, ['editorOptions' => [
        'preset' => 'standard',
        'height'=>250,
        'inline' => false,
    ]]) ?>
    <?= $form->field($model, 'specification')->widget(CKEditor::class, [
        'editorOptions' => [
            'preset' => 'standard',
            'height'=>250,
            'inline' => false,
        ],
    ]) ?>


    <?= $form->field($model, 'image[]')->widget(FileInput::class, [
        'options' => [
            'multiple' => true,
            'accept' => 'image/*'
        ],
        'pluginOptions' => [
            'showCaption' => false,
            'showUpload' => false,
            'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
            'maxFileCount'=>4,
            'allowedFileExtensions' => ['jpg','gif','png', 'jpeg'],
        ],

    ]) ?>

    <?= $form->field($model, 'status')->widget(SwitchInput::class) ?>

    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
    </div>

</section>