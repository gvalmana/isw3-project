<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nc_revisada".
 *
 * @property int $id
 * @property int $cerrar_revision
 * @property string $comentario
 * @property string $fecha_revision
 * @property int $verificador_nc
 *
 * @property NcAnalizado $id0
 * @property User $verificadorNc
 * @property NcVerificada $ncVerificada
 */
class NcRevisada extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nc_revisada';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cerrar_revision', 'comentario', 'fecha_revision', 'verificador_nc'], 'required'],
            [['cerrar_revision', 'verificador_nc'], 'integer'],
            [['comentario'], 'string'],
            [['fecha_revision'], 'safe'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => NcAnalizado::className(), 'targetAttribute' => ['id' => 'id']],
            [['verificador_nc'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['verificador_nc' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cerrar_revision' => 'Cerrar Revision',
            'comentario' => 'Comentario',
            'fecha_revision' => 'Fecha Revision',
            'verificador_nc' => 'Verificador Nc',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(NcAnalizado::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVerificadorNc()
    {
        return $this->hasOne(User::className(), ['id' => 'verificador_nc']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNcVerificada()
    {
        return $this->hasOne(NcVerificada::className(), ['id' => 'id']);
    }
}
