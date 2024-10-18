<?php

namespace frontend\modules\admin\controllers;

use common\models\Edu;
use common\models\Pages;
use common\models\QabulCall;
use common\models\QabulList;
use Yii;
use yii\helpers\Json;
use yii\web\NotFoundHttpException;

class QabulController extends AdminController
{
    public function actionBannerList()
    {
        $searchModel = new QabulCall();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->setSort([
            'defaultOrder' => ['id' => SORT_DESC],
        ]);
        return $this->render('banner-list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionBannerAdd($id = null)
    {
        $model = ($id)?$this->findModel($id, QabulCall::class) : new QabulCall();
        if ($model->load(Yii::$app->request->post())) {
            if($model->_save()) {
                $this->addSuccess('Saqlandi');
                return $this->redirect(['/qabul/banner-list']);
            }
            else $this->addError(Json::encode($model->getErrors()));
        }
        return $this->render('banner-form', ['model' => $model]);
    }

    public function actionBannerDelete($id)
    {
        $model = $this->findModel($id, QabulCall::class);
        if($model->delete()) {
            $this->addSuccess('Uchirildi');
        }
        else $this->addError(Json::encode($model->getErrors()));
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionBannerTranslate(string $id)
    {
        $model = $this->findModel($id, QabulCall::class);
        if ($model->load(Yii::$app->request->post())) {
            if($model->_save()) {
                $this->addSuccess('Saqlandi');
                return $this->redirect(['/qabul/banner-list']);
            }
            else $this->addError(Json::encode($model->getErrors()));
        }
        return $this->render('banner-tranlate', ['model' => $model]);
    }

    public function actionArizaList()
    {
        $searchModel = new QabulList();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->setSort([
            'defaultOrder' => ['id' => SORT_DESC],
        ]);
        return $this->render('contact-list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionArizaAdd($id)
    {
        $model = $this->findModel($id, QabulList::class);
        if ($model->load(Yii::$app->request->post())) {
            if($model->_save()) {
                $this->addSuccess('Saqlandi');
                return $this->redirect(['/qabul/ariza-list']);
            }
            else $this->addError(Json::encode($model->getErrors()));
        }
        return $this->render('contact-form', ['model' => $model]);
    }

    public function actionArizaDelete($id)
    {
        $model = $this->findModel($id, QabulList::class);
        if($model->delete()) {
            $this->addSuccess('Uchirildi');
        }
        else $this->addError(Json::encode($model->getErrors()));
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionEduList()
    {
        $searchModel = new Edu();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->setSort([
            'defaultOrder' => ['id' => SORT_DESC],
        ]);
        return $this->render('edu-list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionEduAdd($id = null)
    {
        $model = ($id)?$this->findModel($id, Edu::class) : new Edu();
        if ($model->load(Yii::$app->request->post())) {
            if($model->_save()) {
                $this->addSuccess('Saqlandi');
                return $this->redirect(['/qabul/edu-list']);
            }
            else $this->addError(Json::encode($model->getErrors()));
        }
        return $this->render('edu-form', ['model' => $model]);
    }

    public function actionEduDelete($id)
    {
        $model = $this->findModel($id, Edu::class);
        if($model->delete()) {
            $this->addSuccess('Uchirildi');
        }
        else $this->addError(Json::encode($model->getErrors()));
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionEduTranslate(string $id)
    {
        $model = $this->findModel($id, Edu::class);
        if ($model->load(Yii::$app->request->post())) {
            if($model->_save()) {
                $this->addSuccess('Saqlandi');
                return $this->redirect(['/qabul/edu-list']);
            }
            else $this->addError(Json::encode($model->getErrors()));
        }
        return $this->render('edu-tranlate', ['model' => $model]);
    }

    protected function findModel($id, $class)
    {
        if (($model = $class::findOne(['alias' => $id])) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}