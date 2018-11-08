<?php
/**
 * Created by PhpStorm.
 * User: floor12
 * Date: 08/11/2018
 * Time: 15:50
 *
 * @var $this \yii\web\View
 * @var $model \floor12\faq\models\Question
 */

use floor12\faq\models\QuestionStatus;
use kartik\form\ActiveForm;
use yii\helpers\Html;

$form = ActiveForm::begin([
    'options' => ['class' => 'modaledit-form'],
    'enableClientValidation' => true
]);
?>

<div class="modal-header">
    <h2><?= Yii::t('app.f12.faq', 'Question updating'); ?></h2>
</div>
<div class="modal-body">

    <?= $form->errorSummary($model); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name') ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'email') ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'phone') ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'status')->dropDownList(QuestionStatus::listData()) ?>
        </div>
    </div>

    <?= $form->field($model, 'body')->textarea(['rows' => 5]) ?>

    <?= $form->field($model, 'answer')->textarea(['rows' => 5]) ?>

</div>

<div class="modal-footer">
    <?= Html::a(Yii::t('app.f12.faq', 'Cancel'), '', ['class' => 'btn btn-default modaledit-disable']) ?>
    <?= Html::submitButton(Yii::t('app.f12.faq', $model->isNewRecord ? 'Create' : 'Save'), ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
