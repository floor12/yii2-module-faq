<?php
/**
 * Created by PhpStorm.
 * User: floor12
 * Date: 07/11/2018
 * Time: 19:20
 */

namespace floor12\faq\controllers;


use yii\web\Controller;

class FrontendController extends Controller
{
    public function actionIndex()
    {
        return 'faq';
    }
}