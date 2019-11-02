<?php

namespace app\models;

use Yii;
use yii\base\model;

/**
 * This is the model class for table "agencia".
 *
 * @property int $id
 * @property string $id_pais
 * @property string $nombre
 * @property string $direccion
 * @property int $dir_agencia
 * @property int $id_mercado
 *
 * @property User $dirAgencia
 * @property Mercado $mercado
 * @property Cliente[] $clientes
 * @property SucursalAgencia[] $sucursalAgencias
 */
class Agencia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'agencia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pais', 'nombre', 'direccion', 'dir_agencia', 'id_mercado'], 'required', 'message' => 'Campo requerido'],
            [['direccion'], 'string'],
            [['dir_agencia', 'id_mercado'], 'integer'],
            [['id_pais'], 'string', 'max' => 2],
            [['nombre'], 'match', 'pattern' => "/^.{3,50}$/", 'message' => 'Mínimo 3 y máximo 50 carácteres'],
            [['nombre'], 'match', 'pattern'=> '/^[A-Za-z\s]+$/i', 'message' => 'Sólo se aceptan letras'],
            [['dir_agencia'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['dir_agencia' => 'id']],
            [['id_mercado'], 'exist', 'skipOnError' => true, 'targetClass' => Mercado::className(), 'targetAttribute' => ['id_mercado' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pais' => 'Id Pais',
            'nombre' => 'Nombre',
            'direccion' => 'Direccion',
            'dir_agencia' => 'Dir Agencia',
            'id_mercado' => 'Id Mercado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDirAgencia()
    {
        return $this->hasOne(User::className(), ['id' => 'dir_agencia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMercado()
    {
        return $this->hasOne(Mercado::className(), ['id' => 'id_mercado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientes()
    {
        return $this->hasMany(Cliente::className(), ['id_agencia' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSucursalAgencias()
    {
        return $this->hasMany(SucursalAgencia::className(), ['id_agencia' => 'id']);
    }
}
