<?php

namespace frontend\modules\admin\controllers;

use common\models\SysActions;
use common\models\SysConfig;
use common\models\SysUser;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class AdminController extends Controller
{
    public function behaviors()
    {
        Yii::$app->language = 'oz';
        date_default_timezone_set('Asia/Samarkand');
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    ['actions' => ['login', 'error', 'captcha', 'sign', 'reset', 'gii'], 'allow' => true],
                    [
                        'allow' => true,
                        'matchCallback' => function($rule, $action){
                            if(!Yii::$app->user->isGuest){
                                if($this->getAdminRole() == 1) return true;
                                if($this->getAdminRole() == 3){
                                    $actions = [];
                                    $path = $action->controller->id.'/'.$action->controller->action->id;
                                    foreach (SysUser::findOne(Yii::$app->user->id)->role->sysRoleActions as $roles){
                                        $actions[SysActions::findOne($roles->actions_id)->path] = $roles->role_id;
                                    }
                                    if(isset($actions[$path])) return $actions[$path] == Yii::$app->user->identity['role_id'];
                                }
                                $this->addError('Ro`hsat etilmagan');
                            }
                            return false;
                        }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['POST'],
                    'view' => ['GET'],
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
                'layout' => 'main-login',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    protected function addSuccess($message, $logAction = true, $showMessage = true)
    {
        if ($showMessage) {
            Yii::$app->session->addFlash('success', $message);
        }
    }

    protected function addError($message, $logAction = false, $showMessage = true)
    {
        if ($showMessage) {
            Yii::$app->session->addFlash('error', $message);
        }
    }

    protected function addInfo($message)
    {
        Yii::$app->session->addFlash('info', $message);
    }

    protected function addWarning($message)
    {
        Yii::$app->session->addFlash('warning', $message);
    }

    protected function post($name = null, $default = null)
    {
        return Yii::$app->request->post($name, $default);
    }

    protected function get($name = null, $default = null)
    {
        return Yii::$app->request->get($name, $default);
    }

    public function getConfig()
    {
        return SysConfig::findOne(1);
    }

    public function isAjax()
    {
        return Yii::$app->request->isAjax;
    }

    public function isGet()
    {
        return Yii::$app->request->isGet;
    }

    public function setSession($param, $value = null)
    {
        Yii::$app->session->set($param, $value);
    }

    public function getSession($param)
    {
        return Yii::$app->session->get($param);
    }

    public function isPjax()
    {
        return Yii::$app->request->isPjax;
    }

    public function getAdmin()
    {
        return Yii::$app->user;
    }

    public function getAdminRole()
    {
        return $this->getAdmin()->identity['role_id'];
    }

    public function getFilterParams()
    {
        return Yii::$app->request->queryParams;
    }

    public function getBaseUrl()
    {
        return Yii::$app->request->hostInfo;
    }

    protected function findModel($id, $class)
    {
        if (($model = $class::findOne(['alias' => $id])) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}