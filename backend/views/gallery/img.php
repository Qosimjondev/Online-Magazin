<?php
/** @var $data \common\models\Gallery */

use yii\bootstrap4\Html;

?>
<?php for ($i = 0; $i < count($data->getImages()); $i++): ?>

<?= Html::img($data->getImages()[$i], ['width'=>'100px']) ?>

<?php endfor; ?>
