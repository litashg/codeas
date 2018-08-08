<?php
namespace frontend\controllers;

use common\models\Article;
use common\models\Category;
use common\models\StaticPages;
use common\models\Technology;
use yii\web\Controller;
use yii\filters\VerbFilter;
use Yii;

/**
 * Site controller
 */
class SiteController extends Controller
{

    private $technologies;
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

    public function init()
    {
        $this->technologies = Technology::getCachedTechnologiesList();
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
        $data = [];
        $data['technologies'] = $this->technologies;
        $data['active_technology'] = Technology::getCachedTechnologyById(1);
        $data['categories'] = Category::getCachedCategoriesListById(1);
        $data['article_body'] = StaticPages::getStaticPageById(StaticPages::$static_page_list['main_page']);
        return $this->render('index', $data);
    }

    public function actionRender($technology_slug, $category_slug, $article_slug)
    {
        $data['technologies'] =  $this->technologies;
        $technology_id = Technology::getCachedTechnologyBySlug($technology_slug);
        $data['categories'] = Category::getCachedCategoriesListById($technology_id);
        $data['active_technology'] = Technology::getCachedTechnologyById($technology_id);
        $data['article_body'] = Article::getCachedArticleBodyBySlug($article_slug);
        return $this->render('index', $data);
    }


}
