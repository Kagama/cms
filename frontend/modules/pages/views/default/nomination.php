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

<?=\common\modules\contentBlock\widget\ContentBlockWidget::widget([
    'id' => 10
]);?>
<section class="nominees">
<div class="container">
	<h2>Основной конкурс</h2>
	<div class="row">
	    <?php
	    $nomination_category_1  = \common\modules\nomination\models\Nomination::find()->where(['category_id' => 1])->all();
	    
	    foreach($nomination_category_1 as $item) {
	        ?>
	        <div class="col-md-3 item">
    			<a href="<?=($item->link == "" ? "#" : $item->link)?>">
    			<h3><?=$item->name?></h3>
    			</a>
    		</div>
	        <?php
	    }
	    ?>
	</div>
</div>
</section>
<section class="nominees">
<div class="container">
	<h2>Специальные номинации</h2>
	<?php
	    $nomination_category_1  = \common\modules\nomination\models\Nomination::find()->where(['category_id' => 2])->all();
	    
	    foreach($nomination_category_1 as $item) {
	        ?>
	        <div class="col-md-6">
        		<h3><?=$item->name?></h3>
        		<?=$item->intro?>
        	</div>
	        <?php
	    }
	    ?>
</div>
</section>