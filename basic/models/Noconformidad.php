<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "noconformidad".
 *
 * @property int $id
 * @property string $codigo
 * @property string $fecha_identificacion
 * @property string $descripcion
 * @property string $tipo_nc
 * @property string $normas_afectadas
 * @property string $fecha_entrada
 * @property string $fecha_termino
 * @property string $evidencias
 * @property int $id_areainterna
 *
 * @property NcAnalizado $ncAnalizado
 * @property NcAudit $ncAudit
 * @property NcProdserv $ncProdserv
 * @property Sucursal $areainterna
 */
class Noconformidad extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public $file;

    public static function tableName()
    {
        return 'noconformidad';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigo', 'fecha_identificacion', 'descripcion', 'tipo_nc', 'normas_afectadas', 'fecha_entrada', 'fecha_termino', 'id_areainterna'], 'required'],
            [['fecha_identificacion', 'fecha_entrada', 'fecha_termino'], 'safe'],
            [['descripcion', 'normas_afectadas'], 'string'],
            [['id_areainterna'], 'integer'],
            [['codigo'], 'string', 'max' => 10],
            [['tipo_nc'], 'string', 'max' => 30],
            [['evidencias'], 'string', 'max' => 200],
            [['file'], 'file'],
            [['codigo'], 'unique'],
            [['id_areainterna'], 'unique'],
            [['id_areainterna'], 'exist', 'skipOnError' => true, 'targetClass' => Sucursal::className(), 'targetAttribute' => ['id_areainterna' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'codigo' => 'Código',
            'fecha_identificacion' => 'Fecha de identificación',
            'descripcion' => 'Descripción',
            'tipo_nc' => 'Tipo de no conformidad',
            'normas_afectadas' => 'Normas afectadas',
            'fecha_entrada' => 'Fecha de entrada',
            'fecha_termino' => 'Fecha de término',
            'evidencias' => 'Evidencias',
            'id_areainterna' => 'Área afectada',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNcAnalizado()
    {
        return $this->hasOne(NcAnalizado::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNcAudit()
    {
        return $this->hasOne(NcAudit::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNcProdserv()
    {
        return $this->hasOne(NcProdserv::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAreainterna()
    {
        return $this->hasOne(Sucursal::className(), ['id' => 'id_areainterna']);
    }
}
