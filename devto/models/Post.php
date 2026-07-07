<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string|null $image
 * @property int|null $created_by
 * @property string|null $created_on
 * @property string|null $title
 * @property string|null $descript
 */
class Post extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image', 'created_by', 'title', 'descript'], 'default', 'value' => null],
            [['image', 'title', 'descript'], 'string'],
            [['created_by'], 'default', 'value' => null],
            [['created_by'], 'integer'],
            [['created_on'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
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
