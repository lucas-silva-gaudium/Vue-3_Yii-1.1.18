<?php
/* @var $this MotoristaController */
/* @var $model Motorista */
/* @var $form CActiveForm */
?>

<?php $form = $this->beginWidget('CActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>
<div class="wide form">
	<section>
		<div class="row">
			<div class="col-md-3 mb-4">
				<p class="mb-2">
					<?php echo $form->label($model, 'id'); ?>
				</p>
				<?php echo $form->textField($model, 'id', array('class' => 'form-control')); ?>
			</div>
			<div class="col-md-3 mb-4">
				<p class="mb-2">
					<?php echo $form->label($model, 'nome'); ?>
				</p>
				<?php echo $form->textField($model, 'nome', array('class' => 'form-control')); ?>
			</div>
			<div class="col-md-3 mb-4">
				<p class="mb-2">
					<?php echo $form->label($model, 'nascimento'); ?>
				</p>
				<?php echo $form->textField($model, 'nascimento', array('class' => 'form-control')); ?>
			</div>
			<div class="col-md-3 mb-4">
				<p class="mb-2">
					<?php echo $form->label($model, 'email'); ?>
				</p>
				<?php echo $form->textField($model, 'email', array('class' => 'form-control')); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 mb-4">
				<p class="mb-2">
					<?php echo $form->label($model, 'telefone'); ?>
				</p>
				<?php echo $form->textField($model, 'telefone', array('class' => 'form-control')); ?>
			</div>
			<div class="col-md-3 mb-4">
				<p class="mb-2">
					<?php echo $form->label($model, 'placa_veiculo'); ?>
				</p>
				<?php echo $form->textField($model, 'placa_veiculo', array('class' => 'form-control')); ?>
			</div>
			<div class="col-md-3 mb-4">
				<p class="mb-2">
					<?php echo $form->label($model, 'status'); ?>
				</p>
				<?php echo $form->textField($model, 'status', array('class' => 'form-control')); ?>
			</div>
			<div class="col-md-3 mb-4">
				<p class="mb-2">
					<?php echo $form->label($model, 'data_hora_status'); ?>
				</p>
				<?php echo $form->textField($model, 'data_hora_status', array('class' => 'form-control')); ?>
			</div>
		</div>

		<div class="row">
			<div class="col-12 mb-4">
				<p>
					<?php echo $form->label($model, 'obs'); ?>
				</p>
				<?php echo $form->textField($model, 'obs', array('class' => 'w-100 form-control', 'size' => 60, 'maxlength' => 200)); ?>
			</div>
		</div>

		<div class="row buttons">
			<?php echo CHtml::submitButton('Search', array('class' => 'btn btn-outline-secondary')); ?>
		</div>
	</section>
	<?php $this->endWidget(); ?>

</div><!-- search-form -->