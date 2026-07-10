<?php

namespace app\models;

use Yii;

class Post extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'post';
    }

    public $imageFile;

    public function rules()
    {
        return [
            [['image', 'created_by', 'title', 'descript'], 'default', 'value' => null],
            [['title', 'descript'], 'required'],
            ['imageFile', 'file', 'extensions'=> 'jpg,jpeg,png'], // image allowed extenstions

            [['image', 'title', 'descript'], 'string'],
            [['created_by'], 'integer'],
            [['created_on'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'created_by' => 'Created By',
            'created_on' => 'Created On',
            'title' => 'Title',
            'descript' => 'Descript',
        ];
    }
}