<?php

namespace app\models;

use Yii;

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
 * @property Agencia[] $agencias
 * @property Mercado[] $mercados
 * @property NcAnalizado[] $ncAnalizados
 * @property NcAudit[] $ncAudits
 * @property NcAudit[] $ncAudits0
 * @property NcProdserv[] $ncProdservs
 * @property NcProdserv[] $ncProdservs0
 * @property NcRevisada[] $ncRevisadas
 * @property Sucursal[] $sucursals
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'auth_key'], 'string', 'max' => 32],
            [['password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgencias()
    {
        return $this->hasMany(Agencia::className(), ['dir_agencia' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMercados()
    {
        return $this->hasMany(Mercado::className(), ['jefe_mercado' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNcAnalizados()
    {
        return $this->hasMany(NcAnalizado::className(), ['revisor_nc' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNcAudits()
    {
        return $this->hasMany(NcAudit::className(), ['personal_detecta' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNcAudits0()
    {
        return $this->hasMany(NcAudit::className(), ['auditor_jefe' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNcProdservs()
    {
        return $this->hasMany(NcProdserv::className(), ['creada_por' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNcProdservs0()
    {
        return $this->hasMany(NcProdserv::className(), ['receptor' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNcRevisadas()
    {
        return $this->hasMany(NcRevisada::className(), ['verificador_nc' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSucursals()
    {
        return $this->hasMany(Sucursal::className(), ['dir_sucursal' => 'id']);
    }

    public static function ListarUsuariosPorRol($value)
    {
        return User::findBySQL("SELECT * FROM `user`INNER JOIN auth_assignment ON user.id=auth_assignment.user_id WHERE auth_assignment.item_name =:value",['value'=>$value])->all();
    }
}
