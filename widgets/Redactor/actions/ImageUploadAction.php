<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace vladplanet\blog\widgets\Redactor\actions;

use Yii;
use vladplanet\blog\widgets\Redactor\models\ImageUploadModel;

/**
 * @author Nghia Nguyen <yiidevelop@hotmail.com>
 * @since 2.0
 */
class ImageUploadAction extends \yii\base\Action
{
    function run()
    {
        if (isset($_FILES)) {
            $model = new ImageUploadModel();
            if ($model->upload()) {
                return $model->getResponse();
            } else {
                return ['error' => 'Unable to save image file'];
            }
        }
    }

}
