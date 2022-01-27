<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Phone */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Aloqa Ma\'lumotlari', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">

                <?= Html::a('Yangilash', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--                --><?//= Html::a('O\'chirish', ['delete', 'id' => $model->id], [
//                    'class' => 'btn btn-danger',
//                    'data' => [
//                        'confirm' => 'O\'chirishni tasdiqlaysizmi?',
//                        'method' => 'post',
//                    ],
//                ]) ?>

            </h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'address',
            'phone',
            'phone1',
            'telegram',
            'email:email',
        ],
    ]) ?>

</div>
    </div>
</section>