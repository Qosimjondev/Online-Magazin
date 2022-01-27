<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\MessagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Messages';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">
                <?= $this->title ?>
            </h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'class' => ActionColumn::className(),
                'template'=>'{view} {delete}'
            ],
            'name',
            'email:email',
            'subject',
            array(
                'attribute'=>'status',
                'label'=>'Holat',
                'headerOptions' => ['style' => 'width:10%'],
                'format'=>'html',
                'filter'=>array(0=>"O'qilmagan", 1=>"O'qilgan"),
                'value'=>function($data){
                    if ($data['status']==false){
                        return "<span style='font-size: 12px;' class='label label-info'>O'qilmagan</span>";
                    }else{
                        return "<span style='font-size: 12px;' class='badge badge-danger'>O'qilgan</span>";
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

        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
    </div>
</section>