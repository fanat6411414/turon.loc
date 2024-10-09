<?php

namespace frontend\modules\admin\controllers;

use common\models\Menu;
use Yii;
use yii\helpers\Json;
use yii\web\NotFoundHttpException;

class MenusController extends AdminController
{
    public function actionIndex()
    {
        $searchModel = new Menu();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->setSort([
            'defaultOrder' => ['id' => SORT_ASC],
        ]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAdd()
    {
        $model = new Menu();
        $model->scenario = Menu::SCENARIO_ADD;
        if ($model->load(Yii::$app->request->post())) {
            if($model->_save()) {
                $this->addSuccess('Saqlandi');
                return $this->redirect(['/menus/index']);
            }
            else $this->addError(Json::encode($model->getErrors()));
        }
        $model->type = 1;
        return $this->render('form', ['model' => $model]);
    }

    public function actionEdit(string $id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            if($model->_save()) {
                $this->addSuccess('Saqlandi');
                return $this->redirect(['/menus/index']);
            }
            else $this->addError(Json::encode($model->getErrors()));
        }
        return $this->render('form', ['model' => $model]);
    }

    public function actionTranslate(string $id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            if($model->_save()) {
                $this->addSuccess('Saqlandi');
                return $this->redirect(['/menus/index']);
            }
            else $this->addError(Json::encode($model->getErrors()));
        }
        return $this->render('tranlate', ['model' => $model]);
    }

    public function actionDelete(string $id)
    {
        $model = $this->findModel($id);
        if ($model->delete()) {
            $this->addSuccess('Saqlandi');
        } else {
            $this->addError(Yii::t('app', 'Error'));
        }
        return $this->redirect(['/menus/index']);
    }

    protected function findModel($id)
    {
        if (($model = Menu::findOne(['alias' => $id])) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}