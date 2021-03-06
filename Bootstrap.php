<?php
/**
 * Project: yii2-blog for internal using
 * Author: vladplanet
 * Copyright (c) 2018.
 */

namespace vladplanet\blog;

use vladplanet\blog\traits\ModuleTrait;
use yii\base\BootstrapInterface;
use yii\i18n\PhpMessageSource;

/**
 * Blogs module bootstrap class.
 */
class Bootstrap implements BootstrapInterface
{
    use ModuleTrait;

    /**
     * @inheritdoc
     */
    public function bootstrap($app)
    {
        // Add module URL rules.
        $app->getUrlManager()->addRules(
            [
                '<_m:blog>/cat/<category_id:\d+>-<slug:[a-zA-Z0-9_-]{1,100}+>' => '<_m>/default/index',
                '<_m:blog>/<id:\d+>-<slug:[a-zA-Z0-9_-]{1,100}+>' => '<_m>/default/view',
                '<_m:blog>' => '<_m>/default/index',
            ]
        );

        // Add module I18N category.
        if (!isset($app->i18n->translations['vladplanet/blog'])) {
            $app->i18n->translations['vladplanet/blog'] = [
                'class' => PhpMessageSource::class,
                'basePath' => __DIR__ . '/messages',
                'forceTranslation' => true,
                'fileMap' => [
                    'vladplanet/blog' => 'blog.php',
                ]
            ];
        }
        // Add redactor module if not exist (in my case - only in backend)
        $redactorModule = $this->getModule()->redactorModule;
        if ($this->getModule()->getIsBackend() && !$app->hasModule($redactorModule)) {
            $app->setModule($redactorModule, [
                'class' => 'vladplanet\blog\widgets\Redactor\RedactorModule',
                'imageUploadRoute' => ['/blog/upload/image'],
                'uploadDir' => $this->getModule()->imgFilePath . '/upload/',
                'uploadUrl' => $this->getModule()->getImgFullPathUrl() . '/upload',
                'imageAllowExtensions' => ['jpg', 'png', 'gif', 'svg']
            ]);
        }

        \Yii::setAlias('@vladplanet', \Yii::getAlias('@vendor') . '/vladplanet');
    }
}
