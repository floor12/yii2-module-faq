<?php
/**
 * Created by PhpStorm.
 * User: floor12
 * Date: 07/11/2018
 * Time: 21:42
 */

namespace floor12\faq\models;


use yii\base\ErrorException;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class QuestionFilter extends Model
{
    const SCENARIO_ADMIN = 'admin';

    public $filter;
    public $status = QuestionStatus::PUBLISHED;

    protected $_query;

    public function rules()
    {
        return [
            ['status', 'integer', 'on' => self::SCENARIO_ADMIN],
            ['filter', 'string', 'on' => self::SCENARIO_ADMIN]
        ];
    }

    /**
     * @return ActiveDataProvider
     */
    public function dataProvider()
    {

        if (!$this->validate())
            throw new ErrorException('Question filter validation error.');

        $this->_query = Question::find()
            ->orFilterWhere(['LIKE', 'body', $this->filter])
            ->orFilterWhere(['LIKE', 'name', $this->filter])
            ->andfilterWhere(['=', 'status', $this->status]);


        return new ActiveDataProvider([
            'query' => $this->_query
        ]);
    }

}