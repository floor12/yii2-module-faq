<?php
/**
 * Created by PhpStorm.
 * User: floor12
 * Date: 08/11/2018
 * Time: 15:03
 */

use floor12\faq\Module;
use yii\helpers\Html;
use yii\widgets\Pjax;

Pjax::begin(['id' => 'questionForm']);

echo Html::tag('h1', Yii::t('app.f12.faq', 'Question is saved'));
echo Html::tag(
    'div',
    Yii::t('app.f12.faq',
        Yii::$app->getModule('faq')->moderationMode == Module::MODE_PRE_MODERATION ?
            'Thank you. Your question will be published after moderation.' :
            'Thank you. Your question is published.'
    ),
    ['class' => 'success-info-block']
);

Pjax::end();
