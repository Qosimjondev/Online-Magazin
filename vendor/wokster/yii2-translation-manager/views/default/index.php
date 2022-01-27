<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel wokster\translationmanager\models\SourceMessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tarjimalar';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="source-message-index row">
    <div class="col-xs-12">
        <a href="<?=\yii\helpers\Url::to(['create'])?>" class="btn btn-success">create new</a>
        <div class="box box-default">
            <div class="box-header with-border">
                <span class="label label-default">записей <?= $dataProvider->getCount()?> из <?= $dataProvider->getTotalCount()?></span>
            </div>
            <div class="box-body">
                <?php \yii\widgets\Pjax::begin()?>
                <?= GridView::widget([
                    'summary' => '',
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => Yii::$app->controller->module->grid_column,
                ]); ?>
                <?php \yii\widgets\Pjax::end();?>
            </div>
        </div>
    </div>
</div>
