<?php
/**
 * Project: yii2-blog for internal using
 * Author: vladplanet
 * Copyright (c) 2018.
 */

use vladplanet\blog\Module;

/* @var $this yii\web\View */
/* @var $model vladplanet\blog\models\BlogCategory */

$this->title = Module::t('blog', 'Create ') . Module::t('blog', 'Blog Category');
$this->params['breadcrumbs'][] = ['label' => Module::t('blog', 'Blog Categorys'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-category-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
