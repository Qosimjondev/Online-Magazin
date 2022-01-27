<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;

$this->title = "Ro'yhatdan O'tish";
$this->params['breadcrumbs'][] = $this->title;
?>

<!--================Login Box Area =================-->
<section class="login_box_area section-margin">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <div class="hover">
                        <h4><?=Yii::t('app', 'haveaccount')?></h4>
                        <p>There are advances being made in science and technology everyday, and a good example of this is the</p>
                        <a class="button button-account" href="<?= Url::to(['site/login'])?>"><?=Yii::t('app', 'loginin')?></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner register_form_inner">
                    <h3><?=Yii::t('app', 'create')?></h3>
                    <?php $form = ActiveForm::begin(['id' => 'register_form',
                        'options'=>[
                                'class'=>"row login_form",
                                'tag' => false
                        ]]); ?>
                        <div class="col-md-12 form-group">
                            <?= $form->field($model, 'username', ['options' => ['tag' => false]])->textInput(['class'=>'form-control', 'id'=>'name', 'placeholder'=>Yii::t('app', 'username'), 'onfocus'=>"this.placeholder = ''", 'onblur'=>"this.placeholder = '".Yii::t('app', 'username')."'"])->label(false) ?>
                        </div>
                        <div class="col-md-12 form-group">
                            <?= $form->field($model, 'email', ['options' => ['tag' => false]])->textInput(['class'=>'form-control', 'id'=>'name', 'placeholder'=>Yii::t('app', 'email'), 'onfocus'=>"this.placeholder = ''", 'onblur'=>"this.placeholder = '".Yii::t('app', 'email')."'"])->label(false) ?>
                        </div>
                        <div class="col-md-12 form-group">
                            <?= $form->field($model, 'password', ['options' => ['tag' => false]])->PasswordInput([
                                    'class'=>'form-control',
                                    'id'=>'name',
                                'placeholder'=>Yii::t('app', 'password'), 'onfocus'=>"this.placeholder = ''", 'onblur'=>"this.placeholder = '".Yii::t('app', 'password')."'"])->label(false) ?>
                        </div>
                        <div class="col-md-12 form-group">
                            <?= $form->field($model, 'confirm_password', ['options' => ['tag' => false]])->PasswordInput([
                                    'class'=>'form-control', 'id'=>'name',
                                'placeholder'=>Yii::t('app', 'confirm'), 'onfocus'=>"this.placeholder = ''", 'onblur'=>"this.placeholder = '".Yii::t('app', 'confirm')."'"])->label(false) ?>
                        </div>

                        <div class="col-md-12 form-group">
                            <?= Html::submitButton(Yii::t('app', 'create'), ['class' => 'button button-register w-100', 'name' => 'signup-button']) ?>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Login Box Area =================-->

