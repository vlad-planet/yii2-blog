User Blog for yii2
==================
User Blog for yii2

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist vlad-planet/yii2-blog "*"
```

or add

```
"vlad-planet/yii2-blog": "*"
```

to the require section of your `composer.json` file.

____________________________________
!!! Configurations
------------------------------------
____________________________________
common\config\main.php
------------------------------------
 	'modules' => [
		'blog' => [
		'class' => vladplanet\blog\Module::class,
		'urlManager' => 'urlManager',// 'urlManager' by default, or maybe you can use own component urlManagerFrontend
		'imgFilePath' => '@frontend/web/img/blog/',
		'imgFileUrl' => '/img/blog/',
		'userModel' => \common\models\User::class,
		'userPK' => 'id', //default primary key for {{%user}} table
		'userName' => 'username', //uses in view (may be field `username` or `email` or `login`)
	],
	
____________________________________
frontend\config\main.php
------------------------------------
	'modules' => [
		'blog' => [
		'class' => 'vladplanet\blog\Module',
		'controllerNamespace' => 'vladplanet\blog\controllers\frontend',
		'blogPostPageCount' => 6,
		'blogCommentPageCount' => 10, //20 by default
		'enableComments' => true, //false by default
		'schemaOrg' => [ // empty array [] by default! 
		'publisher' => [
			'logo' => '/img/logo.png',
			'logoWidth' => 191,
			'logoHeight' => 74,
			'name' => 'My Company',
			'phone' => '+1 800 488 80 85',
			'address' => 'City, street, house'
                ]
            ]
        ],

	'bootstrap' => [
		'log',
		'vladplanet\blog\Bootstrap',
	],
		
____________________________________
backend\config\main.php
------------------------------------
	'bootstrap' => [
		'log',
		'vladplanet\blog\Bootstrap',
	],
		
	'modules' => [
		'blog' => [
			'class' => 'vladplanet\blog\Module',
			'controllerNamespace' => 'vladplanet\blog\controllers\backend',
			//'adminAccessControl' => 'common\components\AdminAccessControl', // null - by default 
		],
	],

____________________________________

url
------------------------------------
http://yii2.local/blog
http://yii2.local/admin/blog


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= \vladplanet\blog\AutoloadExample::widget(); ?>```
