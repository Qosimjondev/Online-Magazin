<?php
/** @var $model \common\models\News */

use yii\helpers\Url;

?>

<article class="row blog_item">
    <div class="col-md-3">
        <div class="blog_info text-right">
            <div class="post_tag">
                <a href="#">Food,</a>
                <a class="active" href="#">Technology,</a>
                <a href="#">Politics,</a>
                <a href="#">Lifestyle</a>
            </div>
            <ul class="blog_meta list">
                <li>
                    <a href="#">By <?=$model->createdBy->username?>
                        <i class="lnr lnr-user"></i>
                    </a>
                </li>
                <li>
                    <a href="#"><?=($model->created_at == $model->updated_at)? date('d M Y H:i', $model->created_at): date('d M Y H:i', $model->updated_at);?>
                        <i class="lnr lnr-calendar-full"></i>
                    </a>
                </li>
                <li>
                    <a href="#">1.2M Views
                        <i class="lnr lnr-eye"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-9">
        <div class="blog_post">
            <img src="<?=$model->getImgLink()?>" alt="" width="100%">
            <div class="blog_details">
                <a href="<?= Url::to(['/news/single', 'slug'=>$model->url])?>">
                    <h2><?=$model->title?></h2>
                </a>
                <p>
                <?=\yii\helpers\StringHelper::truncateWords($model->content, 20)?>
                </p>
                <a href="<?= Url::to(['/news/single', 'slug'=>$model->url])?>" class="button button-blog">View More</a>
            </div>
        </div>
    </div>
</article>
