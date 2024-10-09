<?php

namespace common\models;

use Yii;
use yii\helpers\StringHelper;
use yii\web\UploadedFile;

class Files extends \common\models\base\SFiles
{
    public $extensions = ['jpg', 'jpeg', 'png'];
    public $config;

    public function init()
    {
        parent::init();
        $this->config = SysConfig::findOne(1);
    }

    public function rules()
    {
        return [
            [['alias', '_filename', '_extension', 'type', 'created_at'], 'required', 'on' => [self::SCENARIO_UPLOAD]],
            [['_size', 'status', 'created_at', 'updated_at'], 'integer'],
            [['alias', 'name', '_filename'], 'string', 'max' => 255],
            [['_extension'], 'string', 'max' => 10],
            [['type'], 'string', 'max' => 50],
            [
                ['_filename'], 'file',
                'extensions' => $this->extensions,
                'maxSize' => $this->config->file_upload_size * 1024 * 1024,
                'maxFiles' => 1,
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'alias' => Yii::t('app', 'Alias'),
            'name' => Yii::t('app', 'Name'),
            '_filename' => Yii::t('app', 'Filename'),
            '_extension' => Yii::t('app', 'Extension'),
            'type' => Yii::t('app', 'Type'),
            '_size' => Yii::t('app', 'Size'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function validateExtension(UploadedFile $file)
    {
        $extension = mb_strtolower($file->extension, 'UTF-8');
        if (!empty($this->extensions)) {
            foreach ((array) $this->extensions as $ext) {
                if ($extension === $ext || StringHelper::endsWith($file->name, ".$ext", false)) {
                    return true;
                }
            }
            $this->addError('path', "Mumkin bo`lmagan {$file->extension} format");
            return false;
        }
        return false;
    }

    public function validateSize(UploadedFile $file)
    {
        return (($this->config->file_upload_size * 1024 * 1024) >= $file->size);
    }

    public function getPath()
    {
        return Yii::getAlias('@frontend/web/storage');
    }

    public function getUrl()
    {
        return Yii::$app->request->hostInfo.'/storage/'.$this->_filename;
    }

    public function getLocalUrl()
    {
        return $this->getPath().'/'.$this->_filename;
    }

    public function getDirectory()
    {
        $dirname = date('Ymd');
        if(!is_dir($this->getPath().'/'.$dirname)){
            mkdir($this->getPath().'/'.$dirname , 0777);
        }
        return $dirname;
    }
}
