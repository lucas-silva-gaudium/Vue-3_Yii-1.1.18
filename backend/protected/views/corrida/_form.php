<?php
/* @var $this CorridaController */
/* @var $model Corrida */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'corrida-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'passageiro_id'); ?>
		<?php echo $form->textField($model,'passageiro_id'); ?>
		<?php echo $form->error($model,'passageiro_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'motorista_id'); ?>
		<?php echo $form->textField($model,'motorista_id'); ?>
		<?php echo $form->error($model,'motorista_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'origem_endereco'); ?>
		<?php echo $form->textField($model,'origem_endereco',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'origem_endereco'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'origem_latitude'); ?>
		<?php echo $form->textField($model,'origem_latitude',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'origem_latitude'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'origem_longitude'); ?>
		<?php echo $form->textField($model,'origem_longitude',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'origem_longitude'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'destino_endereco'); ?>
		<?php echo $form->textField($model,'destino_endereco',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'destino_endereco'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'destino_latitude'); ?>
		<?php echo $form->textField($model,'destino_latitude',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'destino_latitude'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'destino_longitude'); ?>
		<?php echo $form->textField($model,'destino_longitude',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'destino_longitude'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tarifa'); ?>
		<?php echo $form->textField($model,'tarifa',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'tarifa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'previsao_chegada_destino'); ?>
		<?php echo $form->textField($model,'previsao_chegada_destino'); ?>
		<?php echo $form->error($model,'previsao_chegada_destino'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'data_hora_inicio'); ?>
		<?php echo $form->textField($model,'data_hora_inicio'); ?>
		<?php echo $form->error($model,'data_hora_inicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'data_hora_finalizacao'); ?>
		<?php echo $form->textField($model,'data_hora_finalizacao'); ?>
		<?php echo $form->error($model,'data_hora_finalizacao'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->