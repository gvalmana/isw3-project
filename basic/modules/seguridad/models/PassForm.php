<?php
namespace app\modules\seguridad\models;

use mdm\admin\components\UserStatus;
use mdm\admin\models\User;
use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use kartik\password\StrengthValidator;
/**
 * Signup form
 */
class PassForm extends Model
{

    public $old_pass;
    public $password;
    public $retypePassword;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $class = Yii::$app->getUser()->identityClass ? : 'mdm\admin\models\User';
        return [


            ['old_pass', 'required'],
            ['old_pass', 'string', 'min' => 6],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['retypePassword', 'required'],
            ['retypePassword', 'compare', 'compareAttribute' => 'password'],

            [['password'], StrengthValidator::className(), 'preset'=>'normal', 'userAttribute'=>'username']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'old_pass' => 'Contraseña actual',
            'password' => 'Nueva contraseña',
            'retypePassword' => 'Confirmar contraseña',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $class = Yii::$app->getUser()->identityClass ? : 'mdm\admin\models\User';
            $user = new $class();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->status = ArrayHelper::getValue(Yii::$app->params, 'user.defaultStatus', UserStatus::ACTIVE);
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }
}
