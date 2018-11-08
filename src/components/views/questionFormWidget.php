<?php
/**
 * Created by PhpStorm.
 * User: floor12
 * Date: 08/11/2018
 * Time: 07:10
 *
 * @var $this \yii\web\View
 * @var $model \floor12\faq\models\Question
 * @var $form ActiveForm
 */

use kartik\form\ActiveForm;
use yii\helpers\Html;
use yii\widgets\MaskedInput;
use yii\widgets\Pjax;

Pjax::begin(['id' => 'questionForm']);

$form = ActiveForm::begin([]);

echo $form->field($model, 'name')
    ->label(Yii::t('app.f12.faq', 'Your name'));

echo $form->field($model, 'email')
    ->label(Yii::t('app.f12.faq', 'Your email'));

echo $form->field($model, 'phone')
    ->label(Yii::t('app.f12.faq', 'Your phone number'))
    ->widget(MaskedInput::class, ['mask' => '+9 (999) 999-99-99']);

echo $form->field($model, 'body')
    ->textarea(['rows' => 5]);

echo $form->field($model, 'confirm')
    ->checkbox();

echo Html::submitButton(Yii::t('app.f12.faq', 'Send'), [
    'class' => 'pull-right btn btn-default'
]);

ActiveForm::end();

Pjax::end();
