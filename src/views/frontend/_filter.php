<?php
/**
 * Created by PhpStorm.
 * User: floor12
 * Date: 08/11/2018
 * Time: 15:09
 *
 * @var $this \yii\web\View
 * @var $model \floor12\faq\models\QuestionFilter
 */

use floor12\faq\models\QuestionStatus;
use kartik\form\ActiveForm;


$form = ActiveForm::begin([
    'method' => 'GET',
    'options' => ['class' => 'autosubmit', 'data-container' => '#items']
])
?>

<div class="filter">
    <div class="row">
        <div class="col-md-8">
            <?= $form->field($model, 'filter')
                ->label(false)
                ->textInput(['placeholder' => Yii::t('app.f12.faq', 'questions search...')])
            ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'status')
                ->label(false)
                ->dropDownList(QuestionStatus::listData(), ['prompt' => Yii::t('app.f12.faq', 'any status')])
            ?>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>
