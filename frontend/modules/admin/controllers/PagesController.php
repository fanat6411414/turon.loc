<?php

namespace frontend\modules\admin\controllers;

use common\models\Pages;
use Yii;
use yii\helpers\Json;
use yii\web\NotFoundHttpException;

class PagesController extends AdminController
{
    public function actionIndex()
    {
        $searchModel = new Pages();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->setSort([
            'defaultOrder' => ['id' => SORT_DESC],
        ]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAdd()
    {
        $model = new Pages();
        if ($model->load(Yii::$app->request->post())) {
            if($model->_save()) {
                $this->addSuccess('Saqlandi');
                return $this->redirect(['/pages/index']);
            }
            else $this->addError(Json::encode($model->getErrors()));
        }
        return $this->render('form', ['model' => $model]);
    }

    public function actionEdit(string $id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            if($model->_save()) {
                $this->addSuccess('Saqlandi');
                return $this->redirect(['/pages/index']);
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
                return $this->redirect(['/pages/index']);
            }
            else $this->addError(Json::encode($model->getErrors()));
        }
        return $this->render('tranlate', ['model' => $model]);
    }

    protected function findModel($id)
    {
        if (($model = Pages::findOne(['alias' => $id])) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}