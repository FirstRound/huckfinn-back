<?php

namespace app\modules\user\models;

use Yii;
use yii\base\Model;
use app\modules\user\models\User;

class UserForm extends Model
{
    public $email;
    public $password;
    public $phone;
    public $name;
    public $last_name;
    //public $avatar;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => 'app\modules\user\models\User', 'message' => 'There is a user using email like this.'],
            [['password', 'name', 'last_name', 'phone'], 'string'],
            //['avatar', 'file', 'extensions' => 'jpeg, gif, png', 'on' => ['insert', 'update']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'password' => 'Password'
        ];
    }

    public function Adduser() {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->name = $this->name;
        $user->last_name = $this->last_name;
        $user->phone = $this->phone;
        $user->avatar = '/img/admin/avatar.jpg';
        $user->password_reset_token = '';
        $user->generateAuthKey();
        if ($user->save())
            return $user->id;
        return false;
    }
}
