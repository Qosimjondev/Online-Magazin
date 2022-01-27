<?php
/* @var $this yii\web\View */
/* @var $newsDataProvider \common\models\News */


use yii\bootstrap4\LinkPager;
use yii\helpers\Url;
use yii\widgets\ListView;

$this->title = Yii::t('app', 'news');
$this->params['breadcrumbs'][] = $this->title;
?>

<!--================Blog Area =================-->
<section class="blog_area section-margin--small">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">

                    <?php
                    echo ListView::widget([
                        'dataProvider' => $newsDataProvider,
                        'itemView' => '_item',
                        'layout'=>'{items}',
                        'options'=>[
                                'tag'=>'div',
                                'class'=>'blog_left_sidebar',
                        ],
                        'itemOptions'=>[
                            'tag'=>false,
                        ]
                    ]);
                    ?>

                <nav class="blog-pagination justify-content-center d-flex">
                <?= LinkPager::widget([
                        'pagination'=>$newsDataProvider->pagination,
                        'nextPageLabel'=>'<span class="lnr lnr-chevron-right"></span>',
                        'prevPageLabel'=>'<span class="lnr lnr-chevron-left"></span>',
                        'pageCssClass'=>'page-item',
                        'activePageCssClass'=>'active',
                ])?>
                </nav>

<!--                    <article class="row blog_item">-->
<!--                        <div class="col-md-3">-->
<!--                            <div class="blog_info text-right">-->
<!--                                <div class="post_tag">-->
<!--                                    <a href="#">Food,</a>-->
<!--                                    <a class="active" href="#">Technology,</a>-->
<!--                                    <a href="#">Politics,</a>-->
<!--                                    <a href="#">Lifestyle</a>-->
<!--                                </div>-->
<!--                                <ul class="blog_meta list">-->
<!--                                    <li>-->
<!--                                        <a href="#">Mark wiens-->
<!--                                            <i class="lnr lnr-user"></i>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#">12 Dec, 2017-->
<!--                                            <i class="lnr lnr-calendar-full"></i>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#">1.2M Views-->
<!--                                            <i class="lnr lnr-eye"></i>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#">06 Comments-->
<!--                                            <i class="lnr lnr-bubble"></i>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-md-9">-->
<!--                            <div class="blog_post">-->
<!--                                <img src="img/blog/main-blog/m-blog-1.jpg" alt="">-->
<!--                                <div class="blog_details">-->
<!--                                    <a href="single-blog.html">-->
<!--                                        <h2>Astronomy Binoculars A Great Alternative</h2>-->
<!--                                    </a>-->
<!--                                    <p>MCSE boot camps have its supporters and its detractors. Some people do not understand-->
<!--                                        why you should have to spend money on boot camp when you can get the MCSE study-->
<!--                                        materials yourself at a fraction.</p>-->
<!--                                    <a class="button button-blog" href="single-blog.html">View More</a>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </article>-->
<!--                    <article class="row blog_item">-->
<!--                        <div class="col-md-3">-->
<!--                            <div class="blog_info text-right">-->
<!--                                <div class="post_tag">-->
<!--                                    <a href="#">Food,</a>-->
<!--                                    <a class="active" href="#">Technology,</a>-->
<!--                                    <a href="#">Politics,</a>-->
<!--                                    <a href="#">Lifestyle</a>-->
<!--                                </div>-->
<!--                                <ul class="blog_meta list">-->
<!--                                    <li>-->
<!--                                        <a href="#">Mark wiens-->
<!--                                            <i class="lnr lnr-user"></i>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#">12 Dec, 2017-->
<!--                                            <i class="lnr lnr-calendar-full"></i>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#">1.2M Views-->
<!--                                            <i class="lnr lnr-eye"></i>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#">06 Comments-->
<!--                                            <i class="lnr lnr-bubble"></i>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-md-9">-->
<!--                            <div class="blog_post">-->
<!--                                <img src="img/blog/main-blog/m-blog-2.jpg" alt="">-->
<!--                                <div class="blog_details">-->
<!--                                    <a href="single-blog.html">-->
<!--                                        <h2>The Basics Of Buying A Telescope</h2>-->
<!--                                    </a>-->
<!--                                    <p>MCSE boot camps have its supporters and its detractors. Some people do not understand-->
<!--                                        why you should have to spend money on boot camp when you can get the MCSE study-->
<!--                                        materials yourself at a fraction.</p>-->
<!--                                    <a href="single-blog.html" class="button button-blog">View More</a>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </article>-->
<!--                    <article class="row blog_item">-->
<!--                        <div class="col-md-3">-->
<!--                            <div class="blog_info text-right">-->
<!--                                <div class="post_tag">-->
<!--                                    <a href="#">Food,</a>-->
<!--                                    <a class="active" href="#">Technology,</a>-->
<!--                                    <a href="#">Politics,</a>-->
<!--                                    <a href="#">Lifestyle</a>-->
<!--                                </div>-->
<!--                                <ul class="blog_meta list">-->
<!--                                    <li>-->
<!--                                        <a href="#">Mark wiens-->
<!--                                            <i class="lnr lnr-user"></i>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#">12 Dec, 2017-->
<!--                                            <i class="lnr lnr-calendar-full"></i>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#">1.2M Views-->
<!--                                            <i class="lnr lnr-eye"></i>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#">06 Comments-->
<!--                                            <i class="lnr lnr-bubble"></i>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-md-9">-->
<!--                            <div class="blog_post">-->
<!--                                <img src="img/blog/main-blog/m-blog-3.jpg" alt="">-->
<!--                                <div class="blog_details">-->
<!--                                    <a href="single-blog.html">-->
<!--                                        <h2>The Glossary Of Telescopes</h2>-->
<!--                                    </a>-->
<!--                                    <p>MCSE boot camps have its supporters and its detractors. Some people do not understand-->
<!--                                        why you should have to spend money on boot camp when you can get the MCSE study-->
<!--                                        materials yourself at a fraction.</p>-->
<!--                                    <a href="single-blog.html" class="button button-blog">View More</a>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </article>-->
<!--                    <article class="row blog_item">-->
<!--                        <div class="col-md-3">-->
<!--                            <div class="blog_info text-right">-->
<!--                                <div class="post_tag">-->
<!--                                    <a href="#">Food,</a>-->
<!--                                    <a class="active" href="#">Technology,</a>-->
<!--                                    <a href="#">Politics,</a>-->
<!--                                    <a href="#">Lifestyle</a>-->
<!--                                </div>-->
<!--                                <ul class="blog_meta list">-->
<!--                                    <li>-->
<!--                                        <a href="#">Mark wiens-->
<!--                                            <i class="lnr lnr-user"></i>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#">12 Dec, 2017-->
<!--                                            <i class="lnr lnr-calendar-full"></i>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#">1.2M Views-->
<!--                                            <i class="lnr lnr-eye"></i>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#">06 Comments-->
<!--                                            <i class="lnr lnr-bubble"></i>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-md-9">-->
<!--                            <div class="blog_post">-->
<!--                                <img src="img/blog/main-blog/m-blog-4.jpg" alt="">-->
<!--                                <div class="blog_details">-->
<!--                                    <a href="single-blog.html">-->
<!--                                        <h2>The Night Sky</h2>-->
<!--                                    </a>-->
<!--                                    <p>MCSE boot camps have its supporters and its detractors. Some people do not understand-->
<!--                                        why you should have to spend money on boot camp when you can get the MCSE study-->
<!--                                        materials yourself at a fraction.</p>-->
<!--                                    <a href="single-blog.html" class="button button-blog">View More</a>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </article>-->
<!--                    <article class="row blog_item">-->
<!--                        <div class="col-md-3">-->
<!--                            <div class="blog_info text-right">-->
<!--                                <div class="post_tag">-->
<!--                                    <a href="#">Food,</a>-->
<!--                                    <a class="active" href="#">Technology,</a>-->
<!--                                    <a href="#">Politics,</a>-->
<!--                                    <a href="#">Lifestyle</a>-->
<!--                                </div>-->
<!--                                <ul class="blog_meta list">-->
<!--                                    <li>-->
<!--                                        <a href="#">Mark wiens-->
<!--                                            <i class="lnr lnr-user"></i>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#">12 Dec, 2017-->
<!--                                            <i class="lnr lnr-calendar-full"></i>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#">1.2M Views-->
<!--                                            <i class="lnr lnr-eye"></i>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#">06 Comments-->
<!--                                            <i class="lnr lnr-bubble"></i>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-md-9">-->
<!--                            <div class="blog_post">-->
<!--                                <img src="img/blog/main-blog/m-blog-5.jpg" alt="">-->
<!--                                <div class="blog_details">-->
<!--                                    <a href="single-blog.html">-->
<!--                                        <h2>Telescopes 101</h2>-->
<!--                                    </a>-->
<!--                                    <p>MCSE boot camps have its supporters and its detractors. Some people do not understand-->
<!--                                        why you should have to spend money on boot camp when you can get the MCSE study-->
<!--                                        materials yourself at a fraction.</p>-->
<!--                                    <a href="single-blog.html" class="button button-blog">View More</a>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </article>-->
<!--                    --><?//=\yii\widgets\LinkPager::?>


            </div>
            <?=$this->render('sidebar')?>
        </div>
    </div>
</section>
<!--================Blog Area =================-->

<!--================Instagram Area =================-->
<?=$this->render('instagram')?>
<!--================End Instagram Area =================-->



