<?php
/* @var $this PassageiroController */
/* @var $model Passageiro */

$this->breadcrumbs = array(
	'Passageiros' => array('index'),
	$model->id,
);
?>

<div class="d-flex justify-content-between align-items-center">
	<h1>View Passageiro #<?php echo $model->id; ?></h1>
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
		'nome',
		'nascimento',
		'email',
		'telefone',
		array(
			'name' => 'status',
			'type' => 'raw',
			'value' => CHtml::tag(
				'span',
				array('class' => $model->status == 'A' ? 'badge bg-success' : 'badge bg-secondary'),
				$model->status == 'A' ? 'Ativo' : 'Inativo'
			),
		),
		array(
			'name' => 'data_hora_status',
			'value' => Yii::app()->dateFormatter->formatDateTime($model->data_hora_status, "long", "short"),
		),
		'obs',
	),
)); ?>

<hr>
<h3>Histórico de Corridas</h3>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'corridas-passageiro-grid',
	'dataProvider' => $corridasDataProvider,
	'itemsCssClass' => 'table table-striped table-hover',
	'summaryText' => '',
	'columns' => array(
		array(
			'name' => 'data_hora_inicio',
			'header' => 'Data da Corrida',
			'value' => 'Yii::app()->dateFormatter->formatDateTime($data->data_hora_inicio, "short", "short")',
		),
		array(
			'name' => 'destino_endereco',
			'header' => 'Destino',
		),
		array(
			'name' => 'status',
			'header' => 'Situação',
			'type' => 'raw',
			'value' => 'CHtml::tag("span", array("class"=>"badge bg-info"), $data->status)',
		),
	),
)); ?>