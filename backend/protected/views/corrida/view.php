<?php
/* @var $this CorridaController */
/* @var $model Corrida */

$this->breadcrumbs = array(
	'Corridas' => array('index'),
	$model->id,
);
?>

<div class="d-flex justify-content-between align-items-center">
	<h1>View Corrida #<?php echo $model->id; ?></h1>
	<?php echo CHtml::link(
		'<i class="bi bi-arrow-left"></i> Voltar para lista',
		array('admin'),
		array('class' => 'btn btn-outline-primary')
	); ?>
</div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'cssFile' => false,
	'htmlOptions' => array(
		'class' => 'table table-striped table-bordered detail-view',
	),

	'attributes' => array(
		'id',
		array(
			'label' => 'Passageiro',
			'value' => $model->passageiro->nome,
		),
		array(
			'label' => 'Motorista',
			'value' => $model->motorista ? $model->motorista->nome : "N/A",
		),
		array(
			'name' => 'status',
			'type' => 'raw',
			'value' => CHtml::tag('span', array('class' => 'badge bg-info'), $model->status),
		),
		'origem_endereco',
		'destino_endereco',
		array(
			'name' => 'tarifa',
			'value' => Yii::app()->numberFormatter->formatCurrency($model->tarifa, "BRL"),
		),
		array(
			'name' => 'data_hora_inicio',
			'value' => Yii::app()->dateFormatter->formatDateTime($model->data_hora_inicio, "long", "short"),
		),
		array(
			'name' => 'previsao_chegada_destino',
			'value' => $model->previsao_chegada_destino ? Yii::app()->dateFormatter->formatDateTime($model->previsao_chegada_destino, "long", "short") : "N/A",
		),
		array(
			'name' => 'data_hora_finalizacao',
			'value' => $model->data_hora_finalizacao ? Yii::app()->dateFormatter->formatDateTime($model->data_hora_finalizacao, "long", "short") : "N/A",
		),
	),
)); ?>