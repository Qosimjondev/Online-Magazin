<?php
/* @var $dataProvider \common\models\User */
/* @var $searchModel \common\models\search\UserSearch */

use common\models\User;
use yii\bootstrap4\LinkPager;
use yii\grid\GridView;
use yii2mod\editable\EditableColumn;

$this->title = 'Foydalanuvchilar';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?=$this->title?></h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'pager'=>[
                    'class'=>LinkPager::class,
                ],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                            'attribute'=>'username',
                            'label'=>'Foydalanuvchi'
                    ],
                    'email',
                    [
                        'class' => EditableColumn::class,
                        'attribute' => 'status',
                        'filter'=>array(0=>"O'chirilgan", 9=>"NoFaol", 10=>"Faol"),
                        'url' => ['change-status'],
                        'type' => 'select',
                        'label'=>'Holat',
                        'format'=>'html',
                        'value'=>function ($model){
                            return $model->getStatus();
                        },
                        'editableOptions' => function ($model) {
                            return [
                                'source' => array(0=>"O'chirilgan", 9=>"NoFaol", 10=>"Faol"),
                            ];
                        },


                    ],
                    'created_at:datetime',
                    'updated_at:datetime',

                    [
                            'class' => 'yii\grid\ActionColumn',
                            'template'=>'{view}',
                            'buttons'=>[
//                                'view'=>function($url, $model){
//                                    return \yii\bootstrap4\Html::a('<i class="fas fa-eye"></i>', ['/user/view', 'video_id'=>$model->id]);
//                                },
                            ]
                    ]
                ],
            ]) ?>
        </div><!-- /.box-body -->
    </div><!-- /.box -->

</section>
