<?php

namespace frontend\modules\admin\controllers;

use common\models\Files;
use Yii;
use yii\helpers\Json;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class FileManagerController extends AdminController
{
    public function actionIndex($select=false)
    {
        $searchModel = new Files();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->setSort([
            'defaultOrder' => ['id' => SORT_DESC],
        ]);
        if(Yii::$app->request->isAjax){
            Yii::$app->response->format = 'json';
            return $this->renderAjax('indexAjax', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'select' => $select,
            ]);
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAdd()
    {
        $model = new Files();
        return $this->render('form', ['model' => $model]);
    }

    public function actionUpload()
    {
        $this->layout = false;
        Yii::$app->response->format = 'json';
        $model = new Files();
        $model->scenario = Files::SCENARIO_UPLOAD;
        if (Yii::$app->request->post('fileId')) {
            if(!$model->alias) $model->alias = time().Yii::$app->security->generateRandomString(10);
            $_file = UploadedFile::getInstance($model, '_filename');
            if($_file){
                $model->_extension = $_file->extension;
                $model->_size = $_file->size;
                $model->name = $_file->baseName;
                $model->created_at = time();
                $model->type = $_file->extension;
                $model->status = 10;
                $model->_filename = $model->getDirectory().'/file-'.time().'.'.$model->_extension;

                if(!$model->validateSize($_file)){
                    Yii::$app->response->statusCode = 413;
                    return 'Fayl hajmi katta';
                }
                if(!$model->validateExtension($_file)){
                    Yii::$app->response->statusCode = 400;
                    return 'Fayl formati to\'g\'ri kelmaydi';
                }
            }
            if(Files::findOne(['_size' => $model->_size, 'type' => $model->type, 'name' => $model->name])){
                Yii::$app->response->statusCode = 400;
                return 'Ushbu fayl mavjud';
            }
            if($model->save()){
                if($_file){
                    if($_file->saveAs($model->getPath().'/'.$model->_filename)){
                        return true;
                    }
                }
                $model->delete();
            }
            Yii::$app->response->statusCode = 400;
            return Json::encode($model->getErrors());
        }
        Yii::$app->response->statusCode = 400;
        return 'Bad Request';
    }

    public function actionDelete(string $id)
    {
        $model = $this->findModel($id, Files::class);
        if ($model->delete()) {
            if(is_file($model->getLocalUrl())){
                unlink($model->getLocalUrl());
            }
            $this->addSuccess(Yii::t('app', 'File deleted successfully'));
        }
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionIdToUrl($id)
    {
        $this->layout = false;
        Yii::$app->response->format = 'json';
        if (($model = Files::findOne($id, Files::class)) !== null) {
            return $model->getUrl();
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}