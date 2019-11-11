<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model mdm\admin\models\User */
?>
<div class="user-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'email:email',
            [
                'attribute'=>'status',
                'value'=>$model->status===10?'Activado':'Desactivado'
            ],
            'created_at:date',
            'updated_at:date',
            'perfil.nombre',
            'perfil.primer_apellido',
            'perfil.segundo_apellido'
        ],
    ]) ?>

</div>
