<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\News */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Yangiliklar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">

                <?= Html::a('Yangilash', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('O\'chirish', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'O\'chirishni tasdiqlaysizmi?',
                        'method' => 'post',
                    ],
                ]) ?>

            </h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            [
                'attribute' => 'title',
                'label'=>'Sarlavha',
            ],
            [
                'attribute' => 'content',
                'label'=>'Matn',
            ],

            array(
                'attribute'=>'img',
                'label'=>'Rasm',
                'format'=>'html',
                'value'=>function($data){
                    return \yii\bootstrap4\Html::img($data->getImgLink(), ['width'=>'80px']);
                }
            ),
            array(
                'attribute'=>'status',
                'label'=>'Holat',
                'format'=>'html',
                'value'=>function($data){
                    if ($data['status']==0){
                        return "<span style='font-size: 12px;' class='label label-danger'>NoFaol</span>";
                    }else{
                        return "<span style='font-size: 12px;' class='label label-success'>Faol</span>";
                    }
                }
            ),
            [
                'attribute'=>'created_at',
                'label'=>'Yaratildi',
                'value'=>function($data){
                    return date('H:i d/m/Y', $data->created_at);
                }
            ],

            [
                'attribute'=>'updated_at',
                'label'=>'Tahrirlandi',
                'value'=>function($data){
                    return date('H:i d/m/Y', $data->updated_at);
                }
            ],
        ],
    ]) ?>

</div>
    </div>
</section>