<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "cliente".
 *
 * @property int $id
 * @property string $nombre
 * @property int $dni
 * @property int $numero_pasaporte
 * @property string $direccion
 * @property int $telefono
 * @property string $correo
 * @property int $numero_reserva
 * @property int $id_agencia
 *
 * @property Agencia $agencia
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'dni', 'numero_pasaporte', 'direccion', 'telefono', 'correo', 'numero_reserva', 'id_agencia'], 'required'],
            [['numero_reserva'], 'integer'],
            [['correo'],'email'],
            [['id_agencia'], 'exist', 'skipOnError' => true, 'targetClass' => Agencia::className(), 'targetAttribute' => ['id_agencia' => 'id']],
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
            'dni' => 'Dni',
            'numero_pasaporte' => 'Número Pasaporte',
            'direccion' => 'Dirección',
            'telefono' => 'Teléfono',
            'correo' => 'Correo',
            'numero_reserva' => 'Número Reserva',
            'id_agencia' => 'Id Agencia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgencia()
    {
        return $this->hasOne(Agencia::className(), ['id' => 'id_agencia']);
    }
}
