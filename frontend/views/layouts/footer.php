<?php
/** @var $model Phone */

use common\models\Phone;
use yii\helpers\Url;
use common\models\Gallery;

$model = Phone::find()->one();
$galleries = Gallery::find()->where(['status'=>true, 'title'=>'Gallery'])->one();

?>
  <!--================ Start footer Area  =================-->
  <footer class="footer">
		<div class="footer-area">
			<div class="container">
				<div class="row section_gap">
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets">
							<h4 class="footer_title"><?=Yii::t('app', 'OurMission')?></h4>
							<p>
                                <?=Yii::t('app', 'mission')?>
							</p>
						</div>
					</div>
					<div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets">
							<h4 class="footer_title"><?=Yii::t('app', 'quick')?></h4>
							<ul class="list">
								<li><a href="<?=Url::to(['/site/index'])?>"><?=Yii::t('app', 'home')?></a></li>
								<li><a href="<?=Url::to(['/category/index'])?>"><?=Yii::t('app', 'category')?></a></li>
								<li><a href="<?=Url::to(['/category/index'])?>"><?=Yii::t('app', 'brand')?></a></li>
								<li><a href="<?=Url::to(['/site/news'])?>"><?=Yii::t('app', 'news')?></a></li>
								<li><a href="<?=Url::to(['/site/contact'])?>"><?=Yii::t('app', 'contact')?></a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-2 col-md-6 col-sm-6">
						<div class="single-footer-widget instafeed">
							<h4 class="footer_title"><?=Yii::t('app', 'gallery')?></h4>
							<ul class="list instafeed d-flex flex-wrap">
                                <?php if(!empty($galleries)):?>
                                <?php foreach($galleries->getImages() as  $gallery):?>
                                    <li><img src="<?=$gallery?>" alt=""></li>
                                <?php endforeach; ?>
                                <?php endif; ?>
							</ul>
						</div>
					</div>
					<div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets">
							<h4 class="footer_title">
                                <?=Yii::t('app', 'contactus')?>
                            </h4>
							<div class="ml-40">
								<p class="sm-head">
									<span class="fa fa-map-marked-alt"></span>
                                    <?=Yii::t('app', 'address')?>
                                </p>
								<p><?=$model->address;?></p>
	
								<p class="sm-head">
									<span class="fa fa-phone"></span>
									<?=Yii::t('app', 'phone')?>
								</p>
								<p>
									<?=$model->phone?> <br>
                                    <?=$model->phone1?>
								</p>
                                <p class="sm-head">
                                    <span class="fa fa-location-arrow"></span>
                                    <?=Yii::t('app', 'telegram')?>
                                </p>
                                <p>
                                    <?=$model->telegram?>
                                </p>
								<p class="sm-head">
									<span class="fa fa-envelope"></span>
                                    <?=Yii::t('app', 'email')?>
								</p>
								<p>
									<?=$model->email?>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="container">
				<div class="row d-flex">
					<p class="col-lg-12 footer-text text-center">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Muallif Qosimjon
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
				</div>
			</div>
		</div>
	</footer>
	<!--================ End footer Area  =================-->

