<?php
namespace frontend\controllers;

use yii\filters\VerbFilter;
use Yii;
use yii\web\Controller;


class AboutController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }



    public function actionIndex()
    {
//        $this->layout = 'about';
        return $this->render('index');

    }

    public function actionNews()
    {
        return $this->render('news');

    }

    public function actionProducts()
    {
        return $this->render('products');

    }

    public function actionInfo()
    {
        return $this->render('info');

    }

    public function actionDirectory()
    {
        return $this->render('directory');

    }

    public function actionGallery()
    {
        return $this->render('gallery');

    }
}
