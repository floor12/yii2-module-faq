<?php

namespace floor12\faq\models;

use yii2mod\enum\helpers\BaseEnum;

class QuestionStatus extends BaseEnum
{
    const PUBLISHED = 0;
    const PENDING = 1;
    const DISABLED = 2;

    public static $list = [
        self::PUBLISHED => 'published',
        self::PENDING => 'pending',
        self::DISABLED => 'disabled',
    ];

    public static $messageCategory = 'app.f12.faq';

}