<?php
/**
 * Project: yii2-blog for internal using
 * Author: vladplanet
 * Copyright (c) 2018.
 */

namespace vladplanet\blog\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $sourcePath;
    public $baseUrl = '@web';
    public $css = [
        'css/blog-style.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\bootstrap\BootstrapAsset',
        '\vladplanet\blog\widgets\FontAwesome\AssetBundle'
    ];
	
	public function init()
	{
		$this->sourcePath = dirname(dirname(__DIR__)) .'/blog/assets/default';
		return $this->sourcePath;
	}
	
}
