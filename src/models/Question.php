<?php

namespace floor12\faq\models;

use floor12\phone\PhoneValidator;
use Yii;

/**
 * This is the model class for table "question".
 *
 * @property int $id
 * @property int $status Question status
 * @property int $confirm Confirm policy on create
 * @property int $created Created timstamp
 * @property int $updated Updated timstamp
 * @property int $answered Answer timestamp
 * @property string $name Author name
 * @property string $email Author email
 * @property string $phone Author phone
 * @property string $body Question body
 * @property string $answer Answer body
 */
class Question extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE = 'create';

    public $confirm;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'question';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        Yii::$app->getModule('faq');

        return [
            ['confirm', 'compare', 'compareValue' => 1, 'operator' => '==', 'on' => self::SCENARIO_CREATE,
                'message' => Yii::t('app.f12.faq', 'Нou have to agree to send the question.')],
            [['status', 'created', 'updated', 'name', 'email', 'body'], 'required'],
            ['email', 'email'],
            ['phone', PhoneValidator::class],
            [['status', 'created', 'updated', 'answered', 'confirm'], 'integer'],
            [['name', 'email', 'phone'], 'string', 'max' => 255],
            [['body', 'answer'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app.f12.faq', 'ID'),
            'status' => Yii::t('app.f12.faq', 'Question status'),
            'created' => Yii::t('app.f12.faq', 'Created timstamp'),
            'updated' => Yii::t('app.f12.faq', 'Updated timstamp'),
            'answered' => Yii::t('app.f12.faq', 'Answer timestamp'),
            'name' => Yii::t('app.f12.faq', 'Author name'),
            'email' => Yii::t('app.f12.faq', 'Author email'),
            'phone' => Yii::t('app.f12.faq', 'Author phone'),
            'body' => Yii::t('app.f12.faq', 'Question body'),
            'answer' => Yii::t('app.f12.faq', 'Answer body'),
            'confirm' => Yii::t('app.f12.faq', 'I agree with the personal data processing policy of this site.'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return QuestionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new QuestionQuery(get_called_class());
    }
}
