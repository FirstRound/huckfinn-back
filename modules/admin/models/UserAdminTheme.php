<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use app\modules\user\models\User;

/**
 * This is the model class for table "user_admin_theme".
 *
 * @property integer $user_theme_id
 * @property integer $user_id
 * @property string $theme
 */
class UserAdminTheme extends Model
{
    public $user_id;
    public $theme;

    public function rules()
    {
        return [
            [['user_id', 'theme'], 'integer'],
        ];
    }

    public function changeTheme() {
        $u = User::findOne($this->user_id);
        return $u->setField('theme', $this->theme);
    }
}
