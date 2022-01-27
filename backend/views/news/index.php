<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Yangiliklar';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">
                <?= Html::a('Yangi Qo\'shish', ['create'], ['class' => 'btn btn-success']) ?>
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
                'header'=>'Amallar',
                'headerOptions' => ['style' => 'color:#4080e6'],
                'class' => ActionColumn::className(),
            ],
            [
                'attribute' => 'title',
                'label'=>'Sarlavha',
                'headerOptions' => ['style' => 'color:#4080e6'],
            ],
            array(
                'attribute'=>'img',
                'label'=>'Rasm',
                'headerOptions' => ['style' => 'width:10%'],
                'format'=>'html',
                'value'=>function($data){
                    return \yii\bootstrap4\Html::img($data->getImgLink(), ['width'=>'80px']);
                }
            ),
            array(
                'attribute'=>'status',
                'label'=>'Holat',
                'headerOptions' => ['style' => 'width:10%'],
                'format'=>'html',
                'filter'=>array(0=>"NoFaol", 1=>"Faol"),
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
    ]); ?>

    <?php Pjax::end(); ?>

        </div>
    </div><!-- /.box -->

</section>