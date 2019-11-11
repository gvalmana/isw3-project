<?php
namespace app\modules\seguridad\models;
use mdm\admin\models\form\Signup;
use Yii;
use yii\helpers\ArrayHelper;
use mdm\admin\components\UserStatus;
use mdm\admin\models\User;
use app\modules\seguridad\models\Usuario;
use kartik\password\StrengthValidator;
/**
 * Signup form
 */
class RegistroForm extends Signup
{

    // use the validator in your model rules
    public function rules() {
        return [
            [['username', 'password','email','retypePassword'], 'required','on'=>['create']],
            [['username','email'], 'required','on'=>['update']],
            ['username', 'unique', 'on'=>['create'],'targetClass' => 'app\modules\seguridad\models\Usuario', 'message' => 'This username has already been taken.',],
            ['username', 'string', 'min' => 2, 'max' => 255],
            
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'on'=>['create'],'targetClass' => 'app\modules\seguridad\models\Usuario', 'message' => 'This email address has already been taken.'],                      
            [['password'], StrengthValidator::className(), 'preset'=>'normal', 'userAttribute'=>'username']
        ];
    }    
    
    public function attributeLabels()
    {
        return [
            'username'=>'Cuenta de usuario',
            'email'=>'Correo electrónico',
            'password' => 'Contraseña',
            'retypePassword' => 'Confirmar contraseña',
        ];
    }
}
