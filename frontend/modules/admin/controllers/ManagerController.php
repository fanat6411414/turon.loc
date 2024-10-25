<?php

namespace frontend\modules\admin\controllers;

use common\models\Manager;
use Yii;
use yii\helpers\Json;

class ManagerController extends AdminController
{
    public function actionIndex()
    {
        $searchModel = new Manager();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->setSort([
            'defaultOrder' => ['position' => SORT_ASC],
        ]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAdd(string $id=null)
    {
        $model = $id?$this->findModel($id, Manager::class) : new Manager();
        $model->scenario = Manager::SCENARIO_ADD;
        if ($model->load(Yii::$app->request->post())) {
            if($model->_save()) {
                $this->addSuccess('Saqlandi');
                return $this->redirect(['/manager/index']);
            }
            else $this->addError(Json::encode($model->getErrors()));
        }
        return $this->render('form', ['model' => $model]);
    }

    public function actionDelete(string $id)
    {
        $model = $this->findModel($id, Manager::class);
        if($model->delete()) {
            $this->addError("O`chirildi");
        }
        else $this->addError(Json::encode($model->getErrors()));
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionTranslate(string $id)
    {
        $model = $this->findModel($id, Manager::class);
        if ($model->load(Yii::$app->request->post())) {
            if($model->_save()) {
                $this->addSuccess('Saqlandi');
                return $this->redirect(['/manager/index']);
            }
            else $this->addError(Json::encode($model->getErrors()));
        }
        return $this->render('tranlate', ['model' => $model]);
    }
}