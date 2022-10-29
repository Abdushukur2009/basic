<?php

namespace app\controllers;

use app\models\ClassForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\indexm;
use yii\helpers\VarDumper;
use yii\web\UploadedFile;

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
        $model = new indexm();

        return $this->render('index',['model'=>$model]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new ClassForm();
        $j = '';
        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            // switch ($model['amal']) {
            //     case '+':
            //         $j = 'javob ' . $model['ason'] . '+' . $model['bson'] . '=' . $model['ason'] + $model['bson'];
            //         $model->login("so'ngi " . $j);
            //         break;
            //     case '*':
            //         $j = 'javob ' . $model['ason'] . '*' . $model['bson'] . '=' . $model['ason'] * $model['bson'];
            //         $model->login("so'ngi " . $j);
            //         break;
            //     case '/':
            //         $j = 'javob ' . $model['ason'] . '/' . $model['bson'] . '=' . $model['ason'] / $model['bson'];
            //         $model->login("so'ngi " . $j);
            //         break;
            //     case '-':
            //         $j = 'javob ' . $model['ason'] . '-' . $model['bson'] . '=' . $model['ason'] - $model['bson'];
            //         $model->login("👁‍🗨👁‍🗨👁‍🗨👁‍🗨 so'ngi " . $j);
            //         break;

            //     default:
            //         # code...
            //         break;
            // }
            $model->rasm = UploadedFile::getInstances($model, 'rasm');
            $rrr = [];
            $i = 0;

            foreach ($model->rasm as $k => $v) {
                $fl = explode('/', $v->type);
                $fln = explode('.', $v->name);
                if (is_dir(Yii::getAlias('@imgdir') . '/' . $fl[0] . '/' . end($fln))) {
                    if ($v->saveAS(Yii::getAlias('@imgdir') . '/' . $fl[0] . '/' . end($fln) . '/' . time() . '_' . $i . $v->name, true)) {
                        $rrr[] = $fl[0] . '/' . end($fln) . '/' . time() . '_' . $i . $v->name;
                        $flj = $fl[1];
                        $i++;
                    }
                } else {
                    if (is_dir(Yii::getAlias('@imgdir') . '/' . $fl[0])) {
                        if (mkdir(Yii::getAlias('@imgdir') . '/' . $fl[0] . '/' . end($fln))) {
                            if ($v->saveAS(Yii::getAlias('@imgdir') . '/' . $fl[0]  . '/' . end($fln) . '/' . time() . '_' . $i . $v->name, true)) {
                                $rrr[] = $fl[0] . '/' . end($fln) . '/' . time() . '_' . $i . $v->name;
                                $flj = $fl[1];
                                $i++;
                            }
                        }
                    } else {
                        if (mkdir(Yii::getAlias('@imgdir') . '/' . $fl[0])) {
                            if (mkdir(Yii::getAlias('@imgdir') . '/' . $fl[0] . '/' . end($fln))) {
                                if ($v->saveAS(Yii::getAlias('@imgdir') . '/' . $fl[0]  . '/' . end($fln) . '/' . time() . '_' . $i . $v->name, true)) {
                                    $rrr[] = $fl[0] . '/' . end($fln) . '/' . time() . '_' . $i . $v->name;
                                    $flj = $fl[1];
                                    $i++;
                                }
                            }
                        }
                    }
                }
            }
            return $this->render('render', [
                'rrr' => $rrr,
                'j' => $j,
                'mod' => $model->rasm,
                'ty' => $flj,
            ]);
        }

        return $this->render('login', [
            'model' => $model,
            'j' => $j,
            'mod' => $model->rasm
        ]
    
    
    );
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
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
}
