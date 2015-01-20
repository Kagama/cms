<?php
/**
 * Created by PhpStorm.
 * User: pashaevs
 * Date: 04.11.14
 * Time: 18:06
 */
use yii\helpers\Html;

$this->registerAssetBundle('backend\modules\post\assets\PostModuleAsset', \yii\web\View::POS_HEAD);

/* @var $this yii\web\View */

$this->title = 'Редактирование страниц';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="layout-editor-index padding020 widget">
    <h1><?= Html::encode($this->title) ?></h1>

    <ul>
        <li><span>Layout</span>
            <ul>
                <li><a href="<?=\yii\helpers\Url::to(['/layoutEditor/default/edit', 'file' => Yii::getAlias('@frontend/themes/basic/layouts/main.php')])?>" ><span class="fa  fa-edit"></span> main.php</a></li>
                <li><a href="<?=\yii\helpers\Url::to(['/layoutEditor/default/edit', 'file' => Yii::getAlias('@frontend/modules/main/views/default/index.php')])?>" ><span class="fa  fa-edit"></span> Главная страница</a></li>
            </ul>
        </li>
        <li><span>CSS</span>
            <ul>
                <li><a href="<?=\yii\helpers\Url::to(['/layoutEditor/default/edit', 'file' => Yii::getAlias('@frontend/web/css/main.css')])?>" ><span class="fa  fa-edit"></span> main.css</a> </li>
            </ul>
        </li>
        <li>
            <span>Модули</span>
            <ul>
                <li><span>Посты</span>
                    <ul>
                        <li><a href="<?=\yii\helpers\Url::to(['/layoutEditor/default/edit', 'file' => Yii::getAlias('@frontend/modules/post/views/default/index.php')])?>" ><span class="fa  fa-edit"></span> index.php</a></li>
                        <li><a href="<?=\yii\helpers\Url::to(['/layoutEditor/default/edit', 'file' => Yii::getAlias('@frontend/modules/post/views/default/show.php')])?>" ><span class="fa  fa-edit"></span>  show.php</a></li>
                        <li><a href="<?=\yii\helpers\Url::to(['/layoutEditor/default/edit', 'file' => Yii::getAlias('@frontend/modules/post/views/default/_news_item.php')])?>" ><span class="fa  fa-edit"></span> _news_item.php</a></li>
                    </ul>
                </li>
                <li><span>Жюри</span>
                    <ul>
                        <li><a href="<?=\yii\helpers\Url::to(['/layoutEditor/default/edit', 'file' => Yii::getAlias('@frontend/modules/jury/views/default/index.php')])?>" ><span class="fa  fa-edit"></span> index.php</a></li>
                    </ul>
                </li>
                <li><span>Победители прошлых лет</span>
                    <ul>
                        <li><a href="<?=\yii\helpers\Url::to(['/layoutEditor/default/edit', 'file' => Yii::getAlias('@frontend/modules/winners/views/default/index.php')])?>" ><span class="fa  fa-edit"></span> index.php</a></li>
                    </ul>
                </li>
            </ul>

        </li>
    </ul>
</div>