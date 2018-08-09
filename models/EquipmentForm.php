<?php

namespace app\models;

use Yii;
use yii\base\Model;

class EquipmentForm extends Model
{
    public $info;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            ['info', 'each', 'rule' => ['string']],
        ];
    }

    public function readInfo($eqs) {
        foreach ($eqs as $eq) {
            $this->info[$eq->key] = $eq->value;
        }
    }

    public function setInfo() {
        $flag = true;
        foreach ($this->info as $key => $in) {
            $eq = Info::findOne(['key' => $key]);
            $eq->value = $in;
            if (!$eq->save()) $flag = false;
        }
        return $flag;
    }
}
