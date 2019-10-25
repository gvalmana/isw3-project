<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mercado".
 *
 * @property int $id
 * @property string $nombre
 * @property int $jefe_mercado
 *
 * @property User $jefeMercado
 */
class Mercado extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mercado';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'jefe_mercado'], 'required'],
            [['nombre'], 'match','pattern'=>'/^[A-Za-z\s]+$/i'],
            [['jefe_mercado'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['jefe_mercado' => 'id']],
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
            'jefe_mercado' => 'Jefe de Mercado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJefeMercado()
    {
        return $this->hasOne(User::className(), ['id' => 'jefe_mercado']);
    }
}
