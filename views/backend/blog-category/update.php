<?php
/**
 * Project: yii2-blog for internal using
 * Author: vladplanet
 * Copyright (c) 2018.
 */

use vladplanet\blog\Module;

/* @var $this yii\web\View */
/* @var $model vladplanet\blog\models\BlogCategory */

$this->title = Module::t('blog', 'Update ') . Module::t('blog', 'Blog Category') . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Module::t('blog', 'Blog Categorys'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Module::t('blog', 'Update');
?>
<div class="blog-category-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
