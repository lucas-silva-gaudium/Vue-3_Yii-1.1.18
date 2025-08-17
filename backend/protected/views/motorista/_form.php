<?php
/* @var $this MotoristaController */
/* @var $model Motorista */
/* @var $form CActiveForm */
?>

<div class="form">

	<?php $form = $this->beginWidget('CActiveForm', array(
		'id' => 'motorista-form',
		'enableAjaxValidation' => false,
	));
	$classLabel = array('class' => 'd-block mb-2 fw-bold fs-6');
	$classInput = array('class' => 'form-control');
	$classError = array('class' => 'text-danger mt-1 fs-7');
	?>

	<section>
		<div class="row">
			<div class="col-md-4 mb-4">
				<?php echo $form->labelEx($model, 'nome', $classLabel); ?>
				<?php echo $form->textField($model, 'nome', array_merge($classInput, ['placeholder' => 'Digite o nome completo'])); ?>
				<?php echo $form->error($model, 'nome', $classError); ?>
			</div>
			<div class="col-md-4 mb-4">
				<?php echo $form->labelEx($model, 'email', $classLabel); ?>
				<?php echo $form->emailField($model, 'email', array_merge($classInput, ['placeholder' => 'email@exemplo.com.br'])); ?>
				<?php echo $form->error($model, 'email', $classError); ?>
			</div>
			<div class="col-md-4 mb-4">
				<?php echo $form->labelEx($model, 'nascimento', $classLabel); ?>
				<?php echo $form->dateField($model, 'nascimento', array_merge($classInput, ['placeholder' => 'AAAA-MM-DD'])); ?>
				<?php echo $form->error($model, 'nascimento', $classError); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 mb-4">
				<?php echo $form->labelEx($model, 'telefone', $classLabel); ?>
				<?php echo $form->telField($model, 'telefone', array_merge($classInput, ['placeholder' => '+55-11-999999999'])); ?>
				<?php echo $form->error($model, 'telefone', $classError); ?>
			</div>
			<div class="col-md-6 mb-4">
				<?php echo $form->labelEx($model, 'placa_veiculo', $classLabel); ?>
				<?php echo $form->textField($model, 'placa_veiculo', array_merge($classInput, ['placeholder' => 'AAA-9999 ou AAA9A99'])); ?>
				<?php echo $form->error($model, 'placa_veiculo', $classError); ?>
			</div>
			<!-- <div class="col-md-4 mb-4">
				<?php echo $form->labelEx($model, 'status', $classLabel); ?>
				<?php echo $form->dropDownList(
					$model,
					'status',
					array('A' => 'Ativo', 'I' => 'Inativo'),
					array_merge($classInput, array('prompt' => 'Selecione um status...'))
				); ?>
				<?php echo $form->error($model, 'status', $classError); ?>
			</div> -->
		</div>
		<div class="row">
			<div class="col-md-12 mb-4">
				<?php echo $form->labelEx($model, 'obs', $classLabel); ?>
				<?php echo $form->textArea($model, 'obs', array_merge($classInput, ['placeholder' => 'Observações (opcional)', 'rows' => 4, 'style' => 'resize: none;'])); ?>
				<?php echo $form->error($model, 'obs', $classError); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Criar' : 'Salvar', ['class' => 'btn btn-primary w-100']); ?>
			</div>
		</div>
	</section>

	<?php $this->endWidget(); ?>

</div>