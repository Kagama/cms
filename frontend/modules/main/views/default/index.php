<?php
use \yii\helpers\Html;

/**
 * Created by PhpStorm.
 * User: developer
 * Date: 16.05.14
 * Time: 12:01
 */


$this->title = Yii::$app->params['seo_title'];
Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => Yii::$app->params['seo_keywords']]);
Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => Yii::$app->params['seo_description']]);
?>
<div class="row">
    <div class="col-lg-6">
        <?=\common\modules\contentBlock\widget\ContentBlockWidget::widget([
            'id' => 1
        ]);?>
    </div>
    <div class="col-lg-6">
        <?=\common\modules\contentBlock\widget\ContentBlockWidget::widget([
            'id' => 2
        ]);?>
    </div>
</div>
