<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">
                <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
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
                'attribute' => 'name',
                'label'=>'Nomi',
                'headerOptions' => ['style' => 'width:20%;color:#4080e6'],
            ],
            [
                'attribute' => 'category_id',
                'label'=>'Kategoriya',
                'headerOptions' => ['style' => 'width:15%;color:#4080e6'],
                'value'=>'category.name'
            ],
            [
                'attribute' => 'brand_id',
                'label'=>'Brend',
                'headerOptions' => ['style' => 'width:15%;color:#4080e6'],
                'value'=>'brand.brand_name'
            ],
            'price',
            array(
                'attribute'=>'img',
                'label'=>'Rasm',
//                'headerOptions' => ['style' => 'width:10%'],
                'format'=>'html',
                'value'=>function($data){
                    return \yii\bootstrap4\Html::img($data->getImages()[0], ['width'=>'100px']);
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
                'class' => ActionColumn::className(),
//                'urlCreator' => function ($action, Product $model, $key, $index, $column) {
//                    return Url::toRoute([$action, 'id' => $model->id]);
//                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
    </div>
</section>