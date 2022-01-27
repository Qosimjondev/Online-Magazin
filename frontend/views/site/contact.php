<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;

$this->title = Yii::t('app', 'contact');
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- ================ contact section start ================= -->
<section class="section-margin--small">
    <div class="container">
        <div class="d-none d-sm-block mb-5 pb-4">
            <div id="map" style="height: 420px;"></div>
            <script>
                function initMap() {
                    var uluru = {lat: -25.363, lng: 131.044};
                    var grayStyles = [
                        {
                            featureType: "all",
                            stylers: [
                                { saturation: -90 },
                                { lightness: 50 }
                            ]
                        },
                        {elementType: 'labels.text.fill', stylers: [{color: '#A3A3A3'}]}
                    ];
                    var map = new google.maps.Map(document.getElementById('map'), {
                        center: {lat: -31.197, lng: 150.744},
                        zoom: 9,
                        styles: grayStyles,
                        scrollwheel:  false
                    });
                }

            </script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&callback=initMap"></script>

        </div>


        <div class="row">
            <div class="col-md-4 col-lg-3 mb-4 mb-md-0">
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-home"></i></span>
                    <div class="media-body">
                        <h3>California United States</h3>
                        <p>Santa monica bullevard</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-headphone"></i></span>
                    <div class="media-body">
                        <h3><a href="tel:454545654">00 (440) 9865 562</a></h3>
                        <p>Mon to Fri 9am to 6pm</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-email"></i></span>
                    <div class="media-body">
                        <h3><a href="mailto:support@colorlib.com">support@colorlib.com</a></h3>
                        <p>Send us your query anytime!</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-lg-9">

                <?php $form = ActiveForm::begin(['id' => 'contactForm', 'options'=>[
                        'class'=>'form-contact contact_form',
                    'novalidate'=>"novalidate"
                ]]); ?>
                <div class="row">
                    <div class="col-lg-5">
                        <?= $form->field($model, 'name')->textInput(['class'=>'form-control', 'placeholder'=>"Enter your name"])->label(false) ?>

                        <?= $form->field($model, 'email')->input('email', ['class'=>'form-control', 'placeholder'=>'Enter email address'])->label(false) ?>

                        <?= $form->field($model, 'subject')->textInput(['class'=>'form-control', 'placeholder'=>'Enter Subject'])->label(false) ?>
                    </div>
                    <div class="col-lg-7">
                        <?= $form->field($model, 'body')->textarea(['class'=>"form-control different-control w-100", 'cols'=>"30", 'rows'=>"5", 'placeholder'=>"Enter Message"])->label(false) ?>
                    </div>
                </div>

                <div class="form-group text-center text-md-right mt-3">
                    <?= Html::submitButton('Send Message', ['class' => 'button button--active button-contactForm', 'name' => 'contact-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->
