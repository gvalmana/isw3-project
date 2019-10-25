<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nc_verificada".
 *
 * @property int $id
 * @property string $fecha_cierre
 * @property int $accion_eficaz
 * @property string $comentario
 *
 * @property NcRevisada $id0
 */
class NcVerificada extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nc_verificada';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha_cierre', 'accion_eficaz', 'comentario'], 'required'],
            [['fecha_cierre'], 'safe'],
            [['accion_eficaz'], 'integer'],
            [['comentario'], 'string'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => NcRevisada::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fecha_cierre' => 'Fecha Cierre',
            'accion_eficaz' => 'Accion Eficaz',
            'comentario' => 'Comentario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(NcRevisada::className(), ['id' => 'id']);
    }
}
