<?php
namespace frontend\controllers;

use common\models\Category;
use yii\web\Controller;
use yii\filters\VerbFilter;


/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $technology_id = 1;
        $data = [];
        $data['categories'] = Category::find()->with('articles')->where(['technology_id' => $technology_id])->all();
        $data['content'] = "test";
        return $this->render('index', $data);
    }

}
