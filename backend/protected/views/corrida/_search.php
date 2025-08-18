<?php
/* @var $this CorridaController */
/* @var $model Corrida */
/* @var $form CActiveForm */
?>

<div class="wide form">

	<?php $form = $this->beginWidget('CActiveForm', array(
		'action' => Yii::app()->createUrl($this->route),
		'method' => 'get',
	)); ?>

	<section>
		<div class="row">
			<div class="col-md-4 mb-4">
				<p class="mb-2"><?php echo $form->label($model, 'id'); ?></p>
				<?php echo $form->textField($model, 'id', array('class' => 'form-control')); ?>
			</div>

			<div class="col-md-4 mb-4">
				<p class="mb-2"><?php echo $form->label($model, 'status'); ?></p>
				<?php echo $form->dropDownList(
					$model,
					'status',
					array('Em andamento' => 'Em andamento', 'Finalizada' => 'Finalizada', 'Não Atendida' => 'Não Atendida'),
					array('prompt' => 'Todos', 'class' => 'form-control')
				); ?>
			</div>

			<div class="col-md-4 mb-4">
				<p class="mb-2"><?php echo $form->label($model, 'passageiro_nome'); ?></p>
				<?php echo $form->textField($model, 'passageiro_nome', array('class' => 'form-control')); ?>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4 mb-4">
				<p class="mb-2"><?php echo $form->label($model, 'motorista_nome'); ?></p>
				<?php echo $form->textField($model, 'motorista_nome', array('class' => 'form-control')); ?>
			</div>

			<div class="col-md-4 mb-4">
				<p class="mb-2"><?php echo $form->label($model, 'data_inicio'); ?></p>
				<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
					'model' => $model,
					'attribute' => 'data_inicio',
					'options' => array('dateFormat' => 'yy-mm-dd'),
					'htmlOptions' => array('class' => 'form-control'),
				)); ?>
			</div>

			<div class="col-md-4 mb-4">
				<p class="mb-2"><?php echo $form->label($model, 'data_fim'); ?></p>
				<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
					'model' => $model,
					'attribute' => 'data_fim',
					'options' => array('dateFormat' => 'yy-mm-dd'),
					'htmlOptions' => array('class' => 'form-control'),
				)); ?>
			</div>
		</div>

		<div class="row buttons mt-3">
			<?php echo CHtml::submitButton('Pesquisar', array('class' => 'btn btn-outline-secondary')); ?>
		</div>
	</section>

	<?php $this->endWidget(); ?>

</div>