<?php
/**
 * Created by PhpStorm.
 * User: floor12
 * Date: 08/11/2018
 * Time: 14:16
 */

namespace floor12\faq\logic;


use floor12\faq\models\Question;
use floor12\faq\models\QuestionStatus;
use floor12\faq\Module;
use Yii;
use yii\db\ActiveRecordInterface;

class QuestionCreator
{

    private $_data;
    private $_model;

    /**
     * LogicInterface constructor.
     * @param $model Question
     * @param array $data
     */
    public function __construct(ActiveRecordInterface $model, array $data)
    {
        $this->_model = $model;
        $this->_data = $data;
    }

    /**
     * @return bool
     */
    public function execute()
    {
        $this->_model->load($this->_data);

        $this->_model->created = $this->_model->updated = time();

        $this->_model->status = QuestionStatus::PUBLISHED;

        if (Yii::$app->getModule('faq')->moderationMode == Module::MODE_PRE_MODERATION)
            $this->_model->status = QuestionStatus::PENDING;

        return $this->_model->save();
    }

}