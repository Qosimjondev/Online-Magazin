<?php

use common\models\Gallery;

$galleries = Gallery::find()->where(['status'=>true, 'title'=>'Instagram'])->one();

?>
<?php if(!empty($galleries)):?>
<section class="instagram_area">
    <div class="container box_1620">
        <div class="insta_btn">
            <a class="btn theme_btn" href="#">Follow us on instagram</a>
        </div>
        <div class="instagram_image row m0">

                <?php foreach($galleries->getImages() as  $gallery):?>
                    <a href="#"><img src="<?=$gallery?>" alt=""></a>
                <?php endforeach; ?>

        </div>
    </div>
</section>
<?php endif; ?>