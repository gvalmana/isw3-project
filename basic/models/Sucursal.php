<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sucursal".
 *
 * @property int $id
 * @property string $nombre
 * @property string $direccion
 * @property string $provincia
 * @property int $dir_sucursal
 *
 * @property User $dirSucursal
 * @property SucursalAgencia[] $sucursalAgencias
 */
class Sucursal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sucursal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'direccion', 'provincia', 'dir_sucursal'], 'required'],
            [['nombre', 'direccion', 'provincia'], 'string'],
            [['nombre'], 'match','pattern'=>'/^[A-Za-z\s]+$/i'],
            [['provincia'],'match','pattern'=>'/^[A-Za-z\s]+$/i'],
            [['dir_sucursal'], 'required'],
            [['dir_sucursal'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['dir_sucursal' => 'id']],
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
            'direccion' => 'Dirección',
            'provincia' => 'Provincia',
            'dir_sucursal' => 'Director de la Sucursal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDirSucursal()
    {
        return $this->hasOne(User::className(), ['id' => 'dir_sucursal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSucursalAgencias()
    {
        return $this->hasMany(SucursalAgencia::className(), ['id_sucursal' => 'id']);
    }
}
