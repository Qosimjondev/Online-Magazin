<?php

use common\models\News;
use yii\helpers\Url;
/* @var $lastnews \common\models\News */

$lastnews = News::find()->where(['status'=>1])->limit(4)->all();
?>

<div class="col-lg-4">
    <div class="blog_right_sidebar">
        <aside class="single_sidebar_widget search_widget">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search Posts">
                <span class="input-group-btn">
																	<button class="btn btn-default" type="button">
																			<i class="lnr lnr-magnifier"></i>
																	</button>
															</span>
            </div>
            <!-- /input-group -->
            <div class="br"></div>
        </aside>
        <aside class="single_sidebar_widget popular_post_widget">
            <h3 class="widget_title">Popular Posts</h3>
            <?php foreach ($lastnews as $news): ?>
                <div class="media post_item">
                    <img src="<?=$news->getImgLink()?>" alt="post" width="25%">
                    <div class="media-body">
                        <a href="<?= Url::to(['/news/single', 'slug'=>$news->url])?>">
                            <h3><?=$news->title?></h3>
                        </a>
                        <p><?=Yii::$app->formatter->asRelativeTime($news->updated_at)?></p>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="br"></div>
        </aside>
        <aside class="single_sidebar_widget ads_widget">
            <a href="#">
<!--                <img class="img-fluid" src="img/blog/add.jpg" alt="">-->
            </a>
            <div class="br"></div>
        </aside>
        <aside class="single-sidebar-widget tag_cloud_widget">
            <h4 class="widget_title">Tag Clouds</h4>
            <ul class="list">
                <li>
                    <a href="#">Technology</a>
                </li>
                <li>
                    <a href="#">Fashion</a>
                </li>
                <li>
                    <a href="#">Architecture</a>
                </li>
                <li>
                    <a href="#">Fashion</a>
                </li>
                <li>
                    <a href="#">Food</a>
                </li>
                <li>
                    <a href="#">Technology</a>
                </li>
                <li>
                    <a href="#">Lifestyle</a>
                </li>
                <li>
                    <a href="#">Art</a>
                </li>
                <li>
                    <a href="#">Adventure</a>
                </li>
                <li>
                    <a href="#">Food</a>
                </li>
                <li>
                    <a href="#">Lifestyle</a>
                </li>
                <li>
                    <a href="#">Adventure</a>
                </li>
            </ul>
        </aside>
    </div>
</div>
