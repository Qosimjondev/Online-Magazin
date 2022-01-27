<?php
/* @var $this yii\web\View */
/** @var $searchModel \common\models\search\CategorySearch */
/** @var $category \yii\data\ActiveDataProvider */

/** @var $brand \yii\data\ActiveDataProvider */
/** @var $searchModel1 \common\models\search\BrandSearch */

use yii\bootstrap4\Html;
use yii\bootstrap\Modal;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

?>
<div class="row">
    <div class="col-md-6">
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <?= Html::a('Kategoriya Qo\'shish', ['/category/create-category'], ['class' => 'btn btn-success button-add', 'id'=>'button-category']) ?>
                    </h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <?php Pjax::begin(['id'=>'pjax-data']); ?>

                    <?= GridView::widget([
                        'dataProvider' => $category,
                        'filterModel' => $searchModel,
                        'columns' => [
                            [
                                    'class' => 'yii\grid\SerialColumn',

                            ],
                            [
                                'header'=>'Amallar',
                                'headerOptions' => ['style' => 'width:14%;color:#4080e6'],
                                'class' => ActionColumn::class,
                                'template'=>'{update} {delete}',
                                'buttons'=>[
                                        'update'=>function($url, $model){
                                        return Html::a('<i class="glyphicon glyphicon-edit text-info"></i>', ['/category/update-category', 'id'=>$model->id], ['class'=>'button-update']);
                                    },
                                        'delete'=>function($url, $model){
                                        return Html::a('<i class="glyphicon glyphicon-trash text-danger"></i>', ['/category/delete-category', 'id'=>$model->id]);
                                    }
                                ],
                            ],
                            [
                                'attribute' => 'name',
                                'label'=>'Kategoriya Nomi',
                                'headerOptions' => ['style' => 'width:62%;color:#4080e6'],
                            ],
                            array(
                                'attribute'=>'status',
                                'label'=>'Holat',
                                'headerOptions' => ['style' => 'width:24%'],
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

                        ],
                    ]); ?>


                    <?php Pjax::end(); ?>

                </div>
            </div><!-- /.box -->

        </section>



    </div>
    <div class="col-md-6">
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <?= Html::a('Brand Qo\'shish', ['/category/create-brand'], ['class' => 'btn btn-success button-add', 'id'=>'button-brand']) ?>
                    </h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <?php Pjax::begin(['id'=>'pjax-data']); ?>

                    <?= GridView::widget([
                        'dataProvider' => $brand,
                        'filterModel' => $searchModel1,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'header'=>'Amallar',
                                'headerOptions' => ['style' => 'width:14%;color:#4080e6'],
                                'class' => ActionColumn::class,
                                'template'=>'{update} {delete}',
                                'buttons'=>[
                                    'update'=>function($url, $model){
                                        return Html::a('<i class="glyphicon glyphicon-edit text-info"></i>', ['/category/update-brand', 'id'=>$model->id], ['class'=>'button-update']);
                                    },
                                    'delete'=>function($url, $model){
                                        return Html::a('<i class="glyphicon glyphicon-trash text-danger"></i>', ['/category/delete-brand', 'id'=>$model->id]);
                                    }
                                ],
                            ],
                            [
                                'attribute' => 'brand_name',
                                'label'=>'Brand Nomi',
                                'headerOptions' => ['style' => 'width:62%;color:#4080e6'],
                            ],
                            array(
                                'attribute'=>'status',
                                'label'=>'Holat',
                                'headerOptions' => ['style' => 'width:24%'],
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

                        ],
                    ]); ?>


                    <?php Pjax::end(); ?>

                </div>
            </div><!-- /.box -->

        </section>

    </div>
</div>


<?php
Modal::begin(
        [
                'id'=>'my-Modal',
                'closeButton'=>['label'=>'x', 'tag'=>'button'],
                'size'=>'modal-md'
        ]
);

Modal::end();
?>
