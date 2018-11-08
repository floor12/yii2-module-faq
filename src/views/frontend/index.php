<?php
/**
 * Created by PhpStorm.
 * User: floor12
 * Date: 07/11/2018
 * Time: 21:48
 *
 * @var $this \yii\web\View
 * @var $model \floor12\faq\models\QuestionFilter
 * @var $question \floor12\faq\models\Question
 */

use floor12\faq\assets\FaqAsset;
use floor12\faq\components\QuestionFormWidget;
use yii\helpers\Html;
use yii\widgets\Pjax;

FaqAsset::register($this);

?>

<div class="row">
    <div class="col-md-4 col-md-push-8 sidebar">
        <h2><?= Yii::t('app.f12.faq', 'Ask the question') ?></h2>

        <?= QuestionFormWidget::widget(['model' => $question]) ?>

    </div>
    <div class="col-md-7 col-md-pull-4">
        <?php
        echo Html::tag('h1', Yii::t('app.f12.faq', 'Frequently asked questions'));

        if (Yii::$app->getModule('faq')->adminMode())
            echo $this->render('_filter', ['model' => $model]);

        Pjax::begin(['id' => 'items']);

        echo \yii\widgets\ListView::widget([
            'dataProvider' => $model->dataProvider(),
            'layout' => "{items}\n{pager}",
            'itemView' => Yii::$app->getModule('faq')->viewFaqListItem
        ]);

        Pjax::end();
        ?>
    </div>
</div>

