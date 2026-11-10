<?php

/**
 * Team:
 * Coding by 石欣哲 2412896, 20261110
 * This is the home controller of frontend web.
 */

namespace frontend\controllers;

use yii\web\Controller;

class HomeController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
