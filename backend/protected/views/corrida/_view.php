<?php
/* @var $this CorridaController */
/* @var $data Corrida */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('passageiro_id')); ?>:</b>
	<?php echo CHtml::encode($data->passageiro_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('motorista_id')); ?>:</b>
	<?php echo CHtml::encode($data->motorista_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('origem_endereco')); ?>:</b>
	<?php echo CHtml::encode($data->origem_endereco); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('origem_latitude')); ?>:</b>
	<?php echo CHtml::encode($data->origem_latitude); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('origem_longitude')); ?>:</b>
	<?php echo CHtml::encode($data->origem_longitude); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('destino_endereco')); ?>:</b>
	<?php echo CHtml::encode($data->destino_endereco); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('destino_latitude')); ?>:</b>
	<?php echo CHtml::encode($data->destino_latitude); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('destino_longitude')); ?>:</b>
	<?php echo CHtml::encode($data->destino_longitude); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tarifa')); ?>:</b>
	<?php echo CHtml::encode($data->tarifa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('previsao_chegada_destino')); ?>:</b>
	<?php echo CHtml::encode($data->previsao_chegada_destino); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_hora_inicio')); ?>:</b>
	<?php echo CHtml::encode($data->data_hora_inicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_hora_finalizacao')); ?>:</b>
	<?php echo CHtml::encode($data->data_hora_finalizacao); ?>
	<br />

	*/ ?>

</div>