<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\GallerySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Galleriya';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">
                <?=$this->title?>
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
                'template'=>'{view} {update}'
            ],
            'title',
            array(
                'attribute'=>'images',
                'label'=>'Rasm',
                'headerOptions' => ['style' => 'width:70%'],
                'format'=>'html',
                'value'=>function($data){
                    return $this->render('img', compact('data'));
                }
            ),
            array(
                'attribute'=>'status',
                'label'=>'Holat',
                'headerOptions' => ['style' => 'width:12%'],
                'format'=>'html',
                'filter'=>array(0=>"NoFaol", 1=>"Faol"),
                'value'=>function($data){
                    if ($data['status']==false){
                        return "<span style='font-size: 12px;' class='label label-danger'>NoFaol</span>";
                    }else{
                        return "<span style='font-size: 12px;' class='label label-success'>Faol</span>";
                    }
                }
            ),

        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
    </div>
</section>