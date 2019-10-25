<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nc_prodserv".
 *
 * @property int $id
 * @property string $modalidad_turistica
 * @property string $procedencia
 * @property string $producto
 * @property string $pais
 * @property string $mercado
 * @property int $agencia
 * @property string $nombre_cliente
 * @property string $no_reserva
 * @property int $no_pax
 * @property string $costo_nocalidad
 * @property int $receptor
 *
 * @property Noconformidad $id0
 * @property User $receptor0
 */
class NcProdserv extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nc_prodserv';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'modalidad_turistica', 'procedencia', 'producto', 'pais', 'mercado', 'agencia','receptor'], 'required'],
            [['id', 'agencia', 'no_pax', 'receptor'], 'integer'],
            [['no_pax'], 'match', 'pattern'=>'/^[0-9\s]+$/i'],
            [['costo_nocalidad'], 'number'],
            [['modalidad_turistica', 'procedencia', 'producto', 'nombre_cliente'], 'string', 'max' => 255],
            [['pais'], 'string', 'max' => 2],
            [['mercado'], 'string', 'max' => 3],
            [['no_reserva'], 'string', 'max' => 11],
            [['id'], 'unique'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Noconformidad::className(), 'targetAttribute' => ['id' => 'id']],
            [['receptor'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['receptor' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'modalidad_turistica' => 'Modalidad Turistica',
            'procedencia' => 'Procedencia',
            'producto' => 'Producto',
            'pais' => 'Pais',
            'mercado' => 'Mercado',
            'agencia' => 'Agencia',
            'nombre_cliente' => 'Nombre Cliente',
            'no_reserva' => 'No Reserva',
            'no_pax' => 'No Pax',
            'costo_nocalidad' => 'Costo Nocalidad',
            'receptor' => 'Receptor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoconformidad()
    {
        return $this->hasOne(Noconformidad::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReceptor0()
    {
        return $this->hasOne(User::className(), ['id' => 'receptor']);
    }
}
