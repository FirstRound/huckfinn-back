<?php

namespace app\modules\field\models;

use Yii;

/**
 * This is the model class for table "field_value".
 *
 * @property integer $field_value_id
 * @property string $item_class
 * @property integer $item_id
 * @property integer $field_type_id
 * @property string $value
 *
 * @property FieldType $fieldType
 */
class FieldValue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'field_value';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_id', 'field_type_id'], 'required'],
            [['value'], 'string'],
            [['item_id', 'field_type_id'], 'integer'],
            [['field_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => FieldType::className(), 'targetAttribute' => ['field_type_id' => 'field_type_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'field_value_id' => 'Field Value ID',
            'item_id' => 'Item ID',
            'field_type_id' => 'Field Type ID',
            'value' => 'Value',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFieldType()
    {
        return $this->hasOne(FieldType::className(), ['field_type_id' => 'field_type_id']);
    }
}
