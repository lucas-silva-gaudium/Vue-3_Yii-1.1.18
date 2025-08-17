<?php
/* @var $this CorridaController */
/* @var $model Corrida */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'passageiro_id'); ?>
		<?php echo $form->textField($model,'passageiro_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'motorista_id'); ?>
		<?php echo $form->textField($model,'motorista_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'origem_endereco'); ?>
		<?php echo $form->textField($model,'origem_endereco',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'origem_latitude'); ?>
		<?php echo $form->textField($model,'origem_latitude',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'origem_longitude'); ?>
		<?php echo $form->textField($model,'origem_longitude',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'destino_endereco'); ?>
		<?php echo $form->textField($model,'destino_endereco',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'destino_latitude'); ?>
		<?php echo $form->textField($model,'destino_latitude',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'destino_longitude'); ?>
		<?php echo $form->textField($model,'destino_longitude',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tarifa'); ?>
		<?php echo $form->textField($model,'tarifa',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'previsao_chegada_destino'); ?>
		<?php echo $form->textField($model,'previsao_chegada_destino'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'data_hora_inicio'); ?>
		<?php echo $form->textField($model,'data_hora_inicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'data_hora_finalizacao'); ?>
		<?php echo $form->textField($model,'data_hora_finalizacao'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->