<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "info".
 *
 * @property integer $info_id
 * @property integer $slide
 * @property string $key
 * @property string $title
 * @property string $value
 */
class Info extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slide', 'key', 'title'], 'required'],
            [['slide'], 'integer'],
            [['title', 'value'], 'string'],
            [['key'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'info_id' => 'Info ID',
            'slide' => 'Slide',
            'key' => 'Key',
            'title' => 'Title',
            'value' => 'Value',
        ];
    }
}
