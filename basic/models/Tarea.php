<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tarea".
 *
 * @property int $id
 * @property string $titulo
 * @property string $descripcion
 * @property int $responsable
 * @property string $inicio_previsto
 * @property string $fin_previsto
 * @property int $codigo_nc
 *
 * @property NcAnalizado $codigoNc
 */
class Tarea extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tarea';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo', 'descripcion', 'responsable', 'inicio_previsto', 'fin_previsto', 'codigo_nc'], 'required'],
            [['titulo', 'descripcion'], 'string'],
            [['responsable', 'codigo_nc'], 'integer'],
            [['inicio_previsto', 'fin_previsto'], 'safe'],
            [['codigo_nc'], 'exist', 'skipOnError' => true, 'targetClass' => NcAnalizado::className(), 'targetAttribute' => ['codigo_nc' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
            'descripcion' => 'Descripcion',
            'responsable' => 'Responsable',
            'inicio_previsto' => 'Inicio Previsto',
            'fin_previsto' => 'Fin Previsto',
            'codigo_nc' => 'Codigo Nc',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodigoNc()
    {
        return $this->hasOne(NcAnalizado::className(), ['id' => 'codigo_nc']);
    }
}
