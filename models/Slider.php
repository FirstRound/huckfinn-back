<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "slider".
 *
 * @property integer $slider_id
 * @property integer $slider
 * @property integer $slide
 * @property string $title
 * @property string $text
 * @property string $description
 * @property string $image
 * @property string $icon1
 * @property string $icon2
 * @property string $p1
 * @property string $p2
 */
class Slider extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slider';
    }

    public $img;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slide'], 'required'],
            [['slide'], 'integer'],
            [['title', 'text', 'image'], 'string'],

            [['title', 'text', 'image'], 'default', 'value' => null],

            [['img'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, gif', 'checkExtensionByMimeType' => false]
        ];
    }

    public function beforeValidate() {
        $this->img = UploadedFile::getInstance($this, 'img');

        return parent::beforeValidate();
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {

            if ($this->img) {
                $photo = $this->img;
                $name = \rand(100000000, 999999999);
                $name = $this->checkUniqName($name, 'image');
                $photo->saveAs(Yii::getAlias('@webroot') . '/img/sliders/' . $name . '.' . $photo->extension);
                if ($this->image) @unlink(Yii::getAlias('@webroot').$this->image);
                $this->image = '/img/sliders/' . $name . '.' . $photo->extension;
            }

            return true;
        }
        return false;
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {

            @unlink(Yii::getAlias('@webroot') . $this->image);

            return true;
        } else {
            return false;
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'slider_id' => 'Slider ID',
            'slide' => 'Slide',
            'title' => 'Title',
            'text' => 'Text',
            'image' => 'Image',

            'img' => 'Image'
        ];
    }

    private function checkUniqName($name, $attr) {
        $base = Slider::find()->all();
        foreach ($base as $p) {
            if (substr($p->{$attr}, strrpos($p->{$attr}, '/')+1, strrpos($p->{$attr}, '.')) == $name) {
                $new_name = \rand(100000000, 999999999);
                return $this->checkUniqName($new_name, $attr);
            }
        }
        return $name;
    }
}
