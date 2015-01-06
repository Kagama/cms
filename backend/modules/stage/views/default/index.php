<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->registerAssetBundle('backend\modules\post\assets\PostModuleAsset', \yii\web\View::POS_HEAD);

/* @var $this yii\web\View */
/* @var $searchModel common\modules\stage\models\search\StageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Этапы конкурса';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stage-index padding020 widget">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'number',
            'title',
            'url:url',
            'note',
            'date',
            'current_stage',
            'past_stage',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
