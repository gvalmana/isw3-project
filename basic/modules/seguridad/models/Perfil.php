<?php

namespace app\modules\seguridad\models;

use Yii;

/**
 * This is the model class for table "perfil".
 *
 * @property int $id
 * @property string $nombre
 * @property string $primer_apellido
 * @property string $segundo_apellido
 *
 * @property User $id0
 */
class Perfil extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'perfil';
    }

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
    public function rules()
    {
        return [
            [['id','nombre', 'primer_apellido', 'segundo_apellido'], 'required','on'=>['update']],
            [['id'], 'integer'],
            [['nombre', 'primer_apellido', 'segundo_apellido'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'primer_apellido' => 'Primer Apellido',
            'segundo_apellido' => 'Segundo Apellido',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'id']);
    }
}
