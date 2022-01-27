<?php
/** @var $model \common\models\News */

use yii\helpers\Url;

?>
<div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
    <div class="card card-blog">
        <div class="card-blog__img">
            <img class="card-img rounded-0" src="<?=$model->getImgLink()?>" alt="">
        </div>
        <div class="card-body">
            <ul class="card-blog__info">
                <li><a href="#">By <?=$model->createdBy->username?></a></li>
                <li><a href="#"><?=date('d M Y H:i', $model->updated_at)?></a></li>
            </ul>
            <h4 class="card-blog__title"><a href="<?= Url::to(['/news/single', 'slug'=>$model->url])?>"><?=$model->title?></a></h4>
            <p>
                <?=\yii\helpers\StringHelper::truncateWords($model->content, 20)?>
            </p>
            <a class="card-blog__link" href="<?= Url::to(['/news/single', 'slug'=>$model->url])?>"><?=Yii::t('app', 'read')?> <i class="ti-arrow-right"></i></a>
        </div>
    </div>
</div>
