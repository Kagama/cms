<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 25.06.14
 * Time: 15:27
 */


$this->title = $menu->seo_title." - ".Yii::$app->params['seo_title'];
Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $menu->seo_keywords]);
Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $menu->seo_description]);
?>
<div style="position: relative;">
<?php
//\common\widget\html\ActiveEdit::begin(['model' => $model, 'url' => "/pages/simple-edit/edit"]);
?>
<section class="about">
<div class="container">
	<?=\common\modules\contentBlock\widget\ContentBlockWidget::widget([
        'id' => 3
    ]);?>
</div>
</section><section class="levels">
<div class="container">
	<div class="row">
		<h1>Этапы 2014</h1>
		<div class="row">
			<?php
            $stages = \common\modules\stage\models\Stage::find()->all();
            foreach ($stages as $index => $stage) {
                ?>
                <div class="col-xs-6 col-sm-4 col-md-3 level <?=$stage->past_stage == 1  ? "disabled" : ""?> <?=$stage->current_stage == 1  ? "current" : ""?>">
                    <h2><?=$stage->number?></h2>
                    <span class="date <?=(count($stages) == ($index + 1) ? "t-g" : "")?>"><?=$stage->date?></span>
                    <a class="title"><?=$stage->title?></a>
                    <span class="stat"><?=($stage->past_stage == 1 ? "Этап завершен" : $stage->note)?></span>
                </div>
            <?php
            }
            ?>
		</div>
	</div>
</div>
</section><section class="about">
<div class="container">
	<?=\common\modules\contentBlock\widget\ContentBlockWidget::widget([
        'id' => 8
    ]);?>
</div>
</section>
<?php
//\common\widget\html\ActiveEdit::end();
?>
</div>
