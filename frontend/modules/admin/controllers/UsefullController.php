<?php

namespace frontend\modules\admin\controllers;

use common\models\Fakulty;
use common\models\Usefull;
use Yii;
use yii\helpers\Json;

class UsefullController extends AdminController
{
    public function actionIndex()
    {
        $searchModel = new Usefull();
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
        $model = $id?$this->findModel($id, Usefull::class) : new Usefull();
        $model->scenario = Usefull::SCENARIO_ADD;
        if ($model->load(Yii::$app->request->post())) {
            if($model->_save()) {
                $this->addSuccess('Saqlandi');
                return $this->redirect(['/usefull/index']);
            }
            else $this->addError(Json::encode($model->getErrors()));
        }
        return $this->render('form', ['model' => $model]);
    }

    public function actionDelete(string $id)
    {
        $model = $this->findModel($id, Usefull::class);
        if($model->delete()) {
            $this->addError("O`chirildi");
        }
        else $this->addError(Json::encode($model->getErrors()));
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionTranslate(string $id)
    {
        $model = $this->findModel($id, Usefull::class);
        if ($model->load(Yii::$app->request->post())) {
            if($model->_save()) {
                $this->addSuccess('Saqlandi');
                return $this->redirect(['/usefull/index']);
            }
            else $this->addError(Json::encode($model->getErrors()));
        }
        return $this->render('tranlate', ['model' => $model]);
    }
}