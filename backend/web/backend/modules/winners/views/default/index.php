<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\winners\models\search\WinnersCompetitionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Winners Competitions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="winners-competition-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Winners Competition', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'years',
            'type_id',
            'name',
            'description:ntext',
            // 'position',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
