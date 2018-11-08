<?php
/**
 * Created by PhpStorm.
 * User: floor12
 * Date: 07/11/2018
 * Time: 19:20
 */

namespace floor12\faq\controllers;


use floor12\editmodal\DeleteAction;
use floor12\editmodal\EditModalAction;
use floor12\faq\logic\QuestionCreator;
use floor12\faq\models\Question;
use floor12\faq\models\QuestionFilter;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

/**
 * Class FrontendController
 * @package floor12\faq\controllers
 */
class FrontendController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['form', 'delete'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => [Yii::$app->getModule('shop')->editRole],
                    ],
                ],
            ]
        ];
    }

    public function init()
    {
        Yii::$app->getModule('faq');
        parent::init();
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        $model = new QuestionFilter();
        $qustion = new Question();

        if (Yii::$app->getModule('faq')->adminMode())
            $model->scenario = QuestionFilter::SCENARIO_ADMIN;

        $model->load(Yii::$app->request->get());

        if (Yii::$app->request->isPost && Yii::createObject(QuestionCreator::class, [
                $qustion,
                Yii::$app->request->post()
            ])->execute())
            return $this->render(Yii::$app->getModule('faq')->viewFaqSuccess);

        return $this->render(Yii::$app->getModule('faq')->viewFaqList, [
            'model' => $model,
            'question' => $qustion
        ]);
    }

    public function actions(): array
    {
        return [
            'form' => [
                'class' => EditModalAction::class,
                'model' => Question::class,
                'view' => Yii::$app->getModule('faq')->viewFaqForm,
                'message' => Yii::t('app.f12.faq', 'Question is saved.'),
            ],
            'delete' => [
                'class' => DeleteAction::class,
                'model' => Question::class,
                'message' => Yii::t('app.f12.faq', 'Question is deleted.')
            ],
        ];
    }

}