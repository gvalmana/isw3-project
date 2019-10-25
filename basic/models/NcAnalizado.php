<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nc_analizado".
 *
 * @property int $id
 * @property string $analisis_nc
 * @property int $procede
 * @property string $fecha_limite
 * @property int $accion_correctiva
 * @property int $revisor_nc
 * @property string $gravedad
 *
 * @property User $revisorNc
 * @property Noconformidad $id0
 * @property NcRevisada $ncRevisada
 * @property Tarea[] $tareas
 */
class NcAnalizado extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nc_analizado';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'analisis_nc', 'procede', 'fecha_limite', 'accion_correctiva', 'revisor_nc', 'gravedad'], 'required'],
            [['id', 'procede', 'accion_correctiva', 'revisor_nc'], 'integer'],
            [['analisis_nc'], 'string'],
            [['fecha_limite'], 'safe'],
            [['gravedad'], 'string', 'max' => 15],
            [['id'], 'unique'],
            [['revisor_nc'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['revisor_nc' => 'id']],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Noconformidad::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'analisis_nc' => 'Analisis Nc',
            'procede' => 'Procede',
            'fecha_limite' => 'Fecha Limite',
            'accion_correctiva' => 'Accion Correctiva',
            'revisor_nc' => 'Revisor Nc',
            'gravedad' => 'Gravedad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRevisorNc()
    {
        return $this->hasOne(User::className(), ['id' => 'revisor_nc']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(Noconformidad::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNcRevisada()
    {
        return $this->hasOne(NcRevisada::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTareas()
    {
        return $this->hasMany(Tarea::className(), ['codigo_nc' => 'id']);
    }
}
