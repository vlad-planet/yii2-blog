<?php

namespace vladplanet\blog\traits;

use vladplanet\blog\Module;

trait ModuleTrait
{
    /**
     * @return Module
     */
    public function getModule()
    {
        return \Yii::$app->getModule('blog');
    }

}
