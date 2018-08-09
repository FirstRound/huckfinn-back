<?php
namespace app\modules\user\models;

use yii\base\Model;
use Yii;
use app\modules\user\models\User;

class ChangePasswordForm extends Model
{
    public $old_password;
    public $password;
    public $password_rep;


    private $_user;


    public function rules()
    {
        return [
            [['old_password', 'password', 'password_rep'], 'required'],
            [['old_password', 'password', 'password_rep'], 'string'],
            [['old_password'], 'validateOld'],
            [['password_rep'], 'validateRep'],
        ];
    }

    public function validateRep($attribute, $params)
    {
        if (!$this->hasErrors()) {
            if ($this->password != $this->password_rep) {
                $this->addError($attribute, 'New passwords are not equal.');
            }
        }
    }

    public function validateOld($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = User::find()->where(['id' => Yii::$app->user->ID])->one();
            if (!$user->validatePassword($this->old_password)) {
                $this->addError($attribute, 'Wrong current password.');
            }
        }
    }

    /**
     * Resets password.
     *
     * @return boolean if password was reset.
     */
    public function changePassword()
    {
        if ($this->validate()) {
            $user = User::find()->where(['id' => Yii::$app->user->ID])->one();
            $user->setPassword($this->password);
            return $user->save(false);
        }
        return false;
    }

    public function attributeLabels()
    {
        return [
            'old_password' => 'Current password',
            'password' => 'New password',
            'password_rep' => 'Repeat new password'
        ];
    }
}
