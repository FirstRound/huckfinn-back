<?php

namespace app\modules\admin\models;

use app\modules\user\models\User;
use Yii;
use yii\base\Model;

class PermissionsForm extends Model
{
    public $accessAdmin;

    // Пользователи

    public $viewUsers; // просмотр информации пользователей
    public $createUser; // добавление пользователя
    public $changeUserStatus;
    public $changeUserRole;

    // Роли

    public $viewRoles; // просмотр списка ролей
    public $createUpdateRoles; // добавление и редактирование ролей пользователей

    // Информация

    public $viewInfo; // просмотр информации
    public $createUpdateInfo; // добавление и редактирование информации
    public $deleteInfo; // удаление инфомации

    public $viewPages;
    public $createUpdatePages;
    public $deletePages;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [array_keys($this->toArray()), 'integer'],

            [array_keys($this->toArray()), 'default', 'value' => 0],
        ];
    }

    public function attributeLabels()
    {
        return [
            'accessAdmin' => 'Admin panel access',

            'viewUsers' => 'View user\'s information',
            'createUser' => 'Adding users',

            'viewRoles' => 'View roles',
            'createUpdateRoles' => 'Creating and editing users\'s roles',

            'changeUserRole' => 'Changing user\'s role',
            'changeUserStatus' => 'Changing user\'s status',

            'viewInfo' => 'View information',
            'createUpdateInfo' => 'Creating and editing information',
            'deleteInfo' => 'Deleteing information',

            'viewPages' => 'View pages',
            'createUpdatePages' => 'Creating and editing pages',
            'deletePages' => 'Deleting pages'
        ];
    }

    public function ReAssign($role) {
        $role = Yii::$app->authManager->getRole($role);
        $users = User::find()->all();

        foreach (array_keys($this->toArray()) as $r) {
            $this->ReAssign_item($role, $r, $this->{$r});
            foreach ($users as $u) {
                Yii::$app->cache->delete('user_'.$u->primaryKey.'_perm_'.$r);
            }
        }
    }

    private function ReAssign_item($role, $permission, $value) {
        $permission = Yii::$app->authManager->getPermission($permission);
        if (Yii::$app->authManager->hasChild($role, $permission)) {
            if (!$value)
                Yii::$app->authManager->removeChild($role, $permission);
        }
        else if ($value) {
            Yii::$app->authManager->addChild($role, $permission);
        }
    }
}
