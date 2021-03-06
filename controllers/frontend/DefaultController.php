<?php
/**
 * Project: yii2-blog for internal using
 * Author: vladplanet
 * Copyright (c) 2018.
 */

namespace vladplanet\blog\controllers\frontend;

use vladplanet\blog\models\BlogCategory;
use vladplanet\blog\models\BlogComment;
use vladplanet\blog\models\BlogCommentSearch;
use vladplanet\blog\models\BlogPost;
use vladplanet\blog\models\BlogPostSearch;
use vladplanet\blog\Module;
use vladplanet\blog\traits\IActiveStatus;
use vladplanet\blog\traits\ModuleTrait;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class DefaultController extends Controller
{
    use ModuleTrait;

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'vladplanet\blog\widgets\MathCaptcha\MathCaptchaAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new BlogPostSearch();
        $searchModel->scenario = BlogPostSearch::SCENARIO_USER;

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $categories = BlogCategory::find()->where(['status' => IActiveStatus::STATUS_ACTIVE, 'is_nav' => BlogCategory::IS_NAV_YES])
            ->orderBy(['sort_order' => SORT_ASC])->all();

        $cat_items = ArrayHelper::toArray($categories, [
            'vladplanet\blog\models\BlogCategory' => [
                'label' => 'title',
                'url' => function ($cat) {
                    return ['default/index', 'category_id' => $cat->id, 'slug' => $cat->slug];
                },
            ],
        ]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'cat_items' => $cat_items
        ]);
    }

    /**
     * @param $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        $post = BlogPost::find()->where(['status' => IActiveStatus::STATUS_ACTIVE, 'id' => $id])->one();
        if ($post === null) {
            throw new NotFoundHttpException(Yii::t('yii', 'Page not found.'));
        }

        $post->updateCounters(['click' => 1]);

        $searchModel = new BlogCommentSearch();
        $searchModel->scenario = BlogComment::SCENARIO_USER;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);


        $comment = new BlogComment();
        $comment->scenario = BlogComment::SCENARIO_USER;

        if ($comment->load(Yii::$app->request->post()) && $post->addComment($comment)) {
            Yii::$app->session->setFlash('success', Module::t('blog', 'A comment has been added and is awaiting validation'));
            return $this->redirect(['view', 'id' => $post->id, '#' => $comment->id]);
        }

        return $this->render('view', [
            'post' => $post,
            'dataProvider' => $dataProvider,
            'comment' => $comment,
        ]);
    }
}
