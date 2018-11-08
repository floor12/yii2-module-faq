<?php
/**
 * Created by PhpStorm.
 * User: floor12
 * Date: 07/11/2018
 * Time: 21:56
 *
 * @var $this \yii\web\View
 * @var $model \floor12\faq\models\Question
 */

use floor12\editmodal\EditModalHelper;

?>

<div class="f12-faq-item <?= Yii::$app->getModule('faq')->adminMode() ? "f12-faq-item-status{$model->status}" : NULL ?>">
    <div class="f12-faq-item-header">

        <?php if (Yii::$app->getModule('faq')->adminMode()) { ?>
            <div class="pull-right">
                <?= EditModalHelper::editBtn(['/faq/frontend/form'], $model->id); ?>
                <?= EditModalHelper::deleteBtn(['/faq/frontend/delete'], $model->id); ?>
            </div>
        <?php } ?>
        <name>
            <?= $model->name ?>
        </name>
        <datetime>
            <?= Yii::$app->formatter->asDatetime($model->created) ?>
        </datetime>
    </div>
    <question>
        <?= nl2br($model->body) ?>
    </question>
    <?php if ($model->answer): ?>
        <answer>
            <?= nl2br($model->answer) ?>
        </answer>
    <?php endif; ?>
</div>
