<?php
/**
 * Project: yii2-blog for internal using
 * Author: vladplanet
 * Copyright (c) 2018.
 */

namespace vladplanet\blog\controllers\backend;

class DefaultController extends BaseAdminController
{
    public function actionIndex()
    {
        //if(!Yii::$app->user->can('readPost')) throw new HttpException(403, 'No Auth');

        return $this->render('index');
    }
}
