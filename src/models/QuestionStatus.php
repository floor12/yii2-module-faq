<?php

namespace common\src\enum;

use yii2mod\enum\helpers\BaseEnum;

class StatusEnum extends BaseEnum
{
    const ACTIVE = 0;
    const DISABLED = 1;

    public static $list = [
        self::ACTIVE => 'Active',
        self::DISABLED => 'Disabled',
    ];

    public static $messageCategory = 'app.f12.faq';

}