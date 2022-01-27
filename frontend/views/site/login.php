<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;

$this->title = Yii::t('app', 'login');
$this->params['breadcrumbs'][] = $this->title;
?>

<!--================Login Box Area =================-->
<section class="login_box_area section-margin">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <div class="hover">
                        <h4><?=Yii::t('app', 'newmember')?></h4>
                        <p>There are advances being made in science and technology everyday, and a good example of this is the</p>
                        <a class="button button-account" href="<?= Url::to(['site/signup'])?>"><?=Yii::t('app', 'create')?></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner">
                    <h3><?=Yii::t('app', 'logintext')?></h3>

                    <?php $form = ActiveForm::begin(['id' => 'contactForm',
                        'options'=>['class'=>'row login_form', 'tag'=>false]]); ?>
                        <div class="col-md-12 form-group">
                            <?= $form->field($model, 'username', ['options' => ['tag' => false]])->textInput(['class'=>'form-control', 'id'=>'name', 'placeholder'=>Yii::t('app', 'username'), 'onfocus'=>"this.placeholder = ''", 'onblur'=>"this.placeholder = '".Yii::t('app', 'username')."'"])->label(false) ?>
                        </div>
                        <div class="col-md-12 form-group">
                            <?= $form->field($model, 'password', ['options' => ['tag' => false]])->PasswordInput(['class'=>'form-control', 'id'=>'name', 'placeholder'=>Yii::t('app', 'password'), 'onfocus'=>"this.placeholder = ''", 'onblur'=>"this.placeholder = '".Yii::t('app', 'password')."'"])->label(false) ?>
                        </div>
                        <div class="col-md-12 form-group">
<!--                            <div class="creat_account">-->
                                <?= $form->field($model, 'rememberMe', ['options' => ['class'=>'creat_account']])->checkbox()->label(Yii::t('app', 'remember')); ?>
<!--                            </div>-->
                        </div>
                        <div class="col-md-12 form-group">
                            <?= Html::submitButton(Yii::t('app', 'loginin'), ['class' => 'button button-login w-100', 'name' => 'login-button']) ?>

                            <?= Html::a(Yii::t('app', 'forgot'), ['site/request-password-reset']) ?>
                        </div>


                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Login Box Area =================-->
