<?php

/**
 * Created by PhpStorm.
 * User: developer
 * Date: 01.07.14
 * Time: 14:59
 */
use yii\helpers\Html;
use yii\web\View;

$viewCommentsPortion = 4;

Yii::$app->getView()->registerJs("
    // Отобразить еще комментарии
    $('.more-comments').on('click', function(msg){
        var commentPortion = " . $viewCommentsPortion . ";
        $('.comment-block:hidden').each(function(i){
            if (i < (commentPortion)) {
                $(this).slideDown('easeOutQuad');
            } else {
                return false;
            }
        });
    });

    $('.add-comment-link .sub-comment').on('click', function(){
        $('#CommentForm-parent_id').val($(this).attr('comment-id'));
    });

", View::POS_END, 'comment-render-actions')
?>
<div class="comments">

    <?php

    if (count($comments) <= 0) {
        echo "<p class='have-no-comments'>-- Нет комментариев --</p>";
    } else {
        foreach ($comments as $index => $comm) {
            $divStyle = "";
            $divStyle .= ($index > ($viewCommentsPortion - 1)) ? " display:none; " : "";
            $divStyle .= ($comm->level == 0 ? "" : ' margin-left:' . ($comm->level * 3) . '0px; ');
            ?>
            <div class="comment-block" style="<?php echo $divStyle; ?>">
                <div class="comment-text">
                    <div class="username-date">
                        <span class="username"><?= $comm->email; ?></span>
                        <span class="date">(<?= Yii::$app->formatter->asDate($comm->date, 'dd.LL.y') ?>)</span>
                    </div>
                    <p class="text"><?= $comm->text; ?></p>

                </div>
            </div>
        <?php
        }
    }
    if (count($comments) > $viewCommentsPortion) {
        echo "<span class='more-comments'>Еще</span>";
    }
    ?>


    <?php echo $this->render('../../views/default/_add_comment_ajax_form', ['model' => $commentForm, 'obj' => $model]) ?>

</div>

