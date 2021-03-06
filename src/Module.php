<?php
/**
 * Created by PhpStorm.
 * User: floor12
 * Date: 31.12.2017
 * Time: 14:45
 */

namespace floor12\faq;

use Yii;

/**
 * Class Module
 * @package floor12\files
 * @property string $token_salt
 * @property string $fontAwesome
 * @property string $storage
 * @property string $controllerNamespace
 *
 */
class Module extends \yii\base\Module
{

    const MODE_PRE_MODERATION = 'pre';
    const MODE_POST_MODERATION = 'post';

    const ORDER_NEW_FIRST = '-';
    const ORDER_OLD_FIRST = '+';

    /** @var string FontAwesome helper class */
    public $fontAwesome = 'rmrevin\yii\fontawesome\FontAwesome';

    /** @var string */
    public $editRole = '@';

    /** @var string Pre- or post-moderation switch */
    public $moderationMode = self::MODE_PRE_MODERATION;
    
    /** @var string  Admin email address to send notifications in case of pre-moderation */
    public $adminEmailAddress = "";

    /** @var string  Email address to send notifications from*/
    public $emailFromAddress = "";

    /** @var boolean */
    public $useWYSIWYG = true;

    /** @var string Order of faq in listing */
    public $faqOrder = self::ORDER_NEW_FIRST;

    /** faq views paths */
    public $viewFaqList = '@vendor/floor12/yii2-module-faq/src/views/frontend/index';
    public $viewFaqListItem = '@vendor/floor12/yii2-module-faq/src/views/frontend/_index';
    public $viewFaqSuccess = '@vendor/floor12/yii2-module-faq/src/views/frontend/_success';
    public $viewFaqForm = '@vendor/floor12/yii2-module-faq/src/views/frontend/_form';


    /** @inheritdoc */
    public $controllerNamespace = 'floor12\faq\controllers';


    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->fontAwesome = Yii::createObject($this->fontAwesome);
        $this->registerTranslations();
    }


    public function registerTranslations()
    {
        Yii::$app->i18n->translations['app.f12.faq'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@vendor/floor12/yii2-module-faq/src/messages',
            'sourceLanguage' => 'en-US',
            'fileMap' => [
                'app.f12.faq' => 'faq.php',
            ],
        ];
    }

    public function adminMode()
    {
        if ($this->editRole == '@')
            return !\Yii::$app->user->isGuest;
        else
            return \Yii::$app->user->can($this->editRole);
    }

}