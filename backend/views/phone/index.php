<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\PhoneSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aloqa Ma\'lumotlari';
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
                'layout'=>'{items}',
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'header'=>'Amallar',
                        'headerOptions' => ['style' => 'color:#4080e6'],
                        'class' => ActionColumn::className(),
                        'template'=>'{view}  {update}'
                    ],
                    'address',
                    'phone',
                    'phone1',
                    'telegram',
                    'email:email',
                ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
    </div>
</section>
