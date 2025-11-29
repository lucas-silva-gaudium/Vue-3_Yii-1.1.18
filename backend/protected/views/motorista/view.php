<?php
/* @var $this MotoristaController */
/* @var $model Motorista */

use function PHPSTORM_META\type;

$this->breadcrumbs = array(
	'Motoristas' => array('index'),
	$model->id,
);
?>

<div class="d-flex justify-content-between align-items-center">
	<h1>View Motorista #<?php echo $model->id; ?></h1>
	<?php echo CHtml::link(
		'<i class="bi bi-arrow-left"></i> Voltar para lista',
		array('admin'),
		array('class' => 'btn btn-outline-primary')
	); ?>
</div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'htmlOptions' => array(
		'class' => 'table table-striped table-bordered detail-view',
	),
	'attributes' => array(
		'id',
		'nome',
		'nascimento',
		'email',
		'telefone',
		'placa_veiculo',
		array(
			'name' => 'status',
			'type' => 'raw',
			'value' => CHtml::tag(
				'span',
				array('class' => $model->status == 'A' ? 'badge bg-success' : 'badge bg-secondary'),
				$model->status == 'A' ? 'Ativo' : 'Inativo'
			),
		),
		'data_hora_status',
		'obs',
	),
)); ?>