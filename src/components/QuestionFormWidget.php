<?php
/**
 * Created by PhpStorm.
 * User: floor12
 * Date: 08/11/2018
 * Time: 07:09
 */

namespace floor12\faq\components;


use floor12\faq\models\Question;
use yii\base\Widget;

class QuestionFormWidget extends Widget
{
    /**
     * @var Question
     */
    public $model;

    public function run()
    {
        $this->model->scenario = Question::SCENARIO_CREATE;

        return $this->render('questionFormWidget', [
            'model' => $this->model
        ]);

    }

}