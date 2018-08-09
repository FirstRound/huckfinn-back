<?php

namespace app\modules\field\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "field_type".
 *
 * @property integer $field_type_id
 * @property string $item_class
 * @property string $field_type
 * @property string $key
 * @property string $title
 * @property string $default_value
 * @property string $created_at
 * @property string $updated_at
 *
 * @property FieldValue[] $fieldValues
 */
class FieldType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'field_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_class', 'field_type', 'key', 'title'], 'required'],
            [['item_class', 'field_type'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['key', 'title', 'default_value'], 'string', 'max' => 100],

            [['default_value'], 'default', 'value' => null]
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'field_type_id' => 'Field Type ID',
            'item_class' => 'Model',
            'field_type' => 'Field Type',
            'key' => 'Key',
            'title' => 'Title',
            'default_value' => 'Default Value',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFieldValues()
    {
        return $this->hasMany(FieldValue::className(), ['field_type_id' => 'field_type_id']);
    }
}
