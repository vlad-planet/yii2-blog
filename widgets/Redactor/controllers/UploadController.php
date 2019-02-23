<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace vladplanet\blog\widgets\Redactor\controllers;

use yii\web\Response;

/**
 * @author Nghia Nguyen <yiidevelop@hotmail.com>
 * @since 2.0
 */
class UploadController extends \yii\web\Controller
{

    public $enableCsrfValidation = false;

    public function behaviors()
    {
        return [
            [
                'class' => 'yii\filters\ContentNegotiator',
                'formats' => [
                    'application/json' => Response::FORMAT_JSON
                ],
            ]
        ];
    }

    public function actions()
    {
        return [
            'file' => 'vladplanet\blog\widgets\Redactor\actions\FileUploadAction',
            'image' => 'vladplanet\blog\widgets\Redactor\actions\ImageUploadAction',
            'image-json' => 'vladplanet\blog\widgets\Redactor\actions\ImageManagerJsonAction',
            'file-json' => 'vladplanet\blog\widgets\Redactor\actions\FileManagerJsonAction',
        ];
    }

}
