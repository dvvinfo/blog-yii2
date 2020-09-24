<?php

namespace app\controllers;

use app\models\Article;
use app\models\ArticleTag;
use app\models\Category;
use app\models\CommentForm;
use app\models\Tag;
use SebastianBergmann\CodeCoverage\TestFixture\C;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
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
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
//        $query = Article::find();
//        $count = $query ->count();
//        $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>1]);
//        $article = $query->offset($pagination->offset)
//            ->limit($pagination->limit)
//            ->all();
//
//        $popular = Article::find()->orderBy('viewed desc')->limit(3)->all();
//        $recent = Article::find()->orderBy('date desc')->limit(4)->all();
//        $categories = Category::find()->all();
//
//
//        return $this->render('index',[
//            'articles'=>$article,
//            'pagination'=>$pagination,
//            'popular' => $popular,
//            'recent' => $recent,
//            'categories' => $categories
//        ]);
        $data = Article::getAll(5);
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = Category::getAll();

        return $this->render('index',[
            'articles'=>$data['articles'],
            'pagination'=>$data['pagination'],
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories
        ]);
    }
    public function actionView($id)
    {
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = Category::getAll();
        $article = Article::findOne($id);
        $comments = $article->getArticleComments();
        $commentForm = new CommentForm();

        $article-> viewedCounter();

        return $this->render('single', [
            'article' => $article,
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories,
            'comments'=>$comments,
            'commentForm'=>$commentForm,
        ]);
    }
    public function actionCategory($id)
    {
        $data =Category::getArticlesByCategory($id);
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = Category::getAll();

        return $this->render('category',[
            'articles'=>$data['articles'],
            'pagination'=>$data['pagination'],
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories

        ]);
    }



    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    public function actionComment($id)
    {
        $model = new CommentForm();

        if(Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            if($model->saveComment($id))
            {
                Yii::$app->getSession()->setFlash('comment', 'Ваш комментарий будет добавлен в ближайшее время!');
                return $this->redirect(['site/view','id'=>$id]);
            }
        }
    }
}
