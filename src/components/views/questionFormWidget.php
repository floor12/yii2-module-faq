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

echo Html::tag('p', Yii::t('app.f12.faq', 'If you have any questions about our products or their delivery, you can ask them here:'), [
    'class' => 'faq-form-informer'
]);

echo $form->field($model, 'name')
    ->label(Yii::t('app.f12.faq', 'Your name'))
    ->textInput([
        'data-description' => Yii::t('app.f12.faq', 'Enter the name here.'),
        'data-description-show' => 'true'
    ]);
echo $form->field($model, 'email')
    ->label(Yii::t('app.f12.faq', 'Your email'))
    ->textInput([
        'data-description' => Yii::t('app.f12.faq', 'Enter the email address. We will send you the answer.'),
        'data-description-show' => 'true'
    ]);

echo $form->field($model, 'phone')
    ->label(Yii::t('app.f12.faq', 'Your phone number'))
    ->widget(MaskedInput::class, ['mask' => '+9 (999) 999-99-99'])
    ->textInput([
        'data-description' => Yii::t('app.f12.faq', 'Enter your phone number if you want us to call you back.'),
        'data-description-show' => 'true'
    ]);
echo $form->field($model, 'body')
    ->textarea([
        'rows' => 5,
        'data-description' => Yii::t('app.f12.faq', 'Write us your question here.'),
        'data-description-show' => 'true'
    ]);

echo $form->field($model, 'confirm')
    ->checkbox();

echo Html::submitButton(Yii::t('app.f12.faq', 'Send'), [
    'class' => 'pull-right btn btn-default'
]);

ActiveForm::end();

Pjax::end();
