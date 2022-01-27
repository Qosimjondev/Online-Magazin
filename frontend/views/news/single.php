<?php
/** @var $model \common\models\News */

use yii\helpers\Url;

$this->title = Yii::t('app', 'news');
$this->params['breadcrumbs'][] = $this->title;
?>

<!--================Blog Area =================-->
<section class="blog_area single-post-area py-80px section-margin--small">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post row">
                    <div class="col-lg-12">
                        <div class="feature-img">
                            <img class="img-fluid" src="<?=$model->getImgLink()?>" alt="" width="100%">
                        </div>
                    </div>
                    <div class="col-lg-3  col-md-3">
                        <div class="blog_info text-right">
                            <div class="post_tag">
                                <a href="#">Food,</a>
                                <a class="active" href="#">Technology,</a>
                                <a href="#">Politics,</a>
                                <a href="#">Lifestyle</a>
                            </div>
                            <ul class="blog_meta list">
                                <li>
                                    <a href="#">Mark wiens
                                        <i class="lnr lnr-user"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <?=($model->created_at == $model->updated_at)? date('d M Y H:i', $model->created_at): date('d M Y H:i', $model->updated_at);?>
                                        <i class="lnr lnr-calendar-full"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">1.2M Views
                                        <i class="lnr lnr-eye"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="social-links">
                                <li>
                                    <a href="#">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-github"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-behance"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 blog_details">
                        <h2><?=$model->title?></h2>
                        <p class="excert">
                            <?=$model->content?>
                        </p>
                    </div>
                </div>
            </div>
            <?=$this->render('sidebar');?>
        </div>
    </div>
</section>
<!--================Blog Area =================-->


<!--================Instagram Area =================-->
<?=$this->render('instagram')?>
<!--================End Instagram Area =================-->
