<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Gallery */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Galleries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">

                <?= Html::a('Yangilash', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

            </h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            array(
                'attribute'=>'images',
                'label'=>'Rasm',
                'format'=>'html',
                'value'=>function($data){
                    return $this->render('img', compact('data'));
                }
            ),
            array(
                'attribute'=>'status',
                'label'=>'Holat',
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
    ]) ?>

</div>
    </div>
</section>