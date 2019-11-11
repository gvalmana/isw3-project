<?php

namespace app\modules\seguridad\models;

use Yii;
use mdm\admin\models\User;
/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property AuditTrailEntry[] $auditTrailEntries
 */
class Usuario extends User
{

    public function generateAccessToken()
    {
        $this->access_token=Yii::$app->security->generateRandomString();
        return $this->access_token;
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }
    /*public function behaviors(){
        return [\nhkey\arh\ActiveRecordHistoryBehavior::className(),];
    }*/
    public function behaviors(){
        return [
            'history'=>[
                'class'=>\nhkey\arh\ActiveRecordHistoryBehavior::className(),
                'ignoreFields' => ['password_hash', 'auth_key','access_token'],
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Usuario',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Correo',
            'status' => 'Estado',
            'created_at' => 'Creado',
            'updated_at' => 'Actualizado',
            'access_token'=>'Token de acceso'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuditorias()
    {
        return $this->hasMany(Modelhistory::className(), ['user_id' => 'id']);
    }
    
    public function getPerfil()
    {
        return $this->hasOne(Perfil::className(), ['id' => 'id']);
    }
}
