<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->title;
?>
<div class="row news-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'alt_title',
            'small_text:html',
            'text:html',
            'date',
            'seo_title',
            'seo_keywords',
            'seo_description:ntext',
        ],
    ]) ?>

</div>