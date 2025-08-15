<?php
/* @var $this MotoristaController */
/* @var $model Motorista */

$this->breadcrumbs = array(
	'Motoristas' => array('index'),
	'Manage',
);

$this->menu = array(
	array('label' => 'List Motorista', 'url' => array('index')),
	array('label' => 'Create Motorista', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#motorista-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Motoristas</h1>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search', array(
		'model' => $model,
	)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'motorista-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		'id',
		'nome',
		'nascimento',
		'email',
		'telefone',
		'placa_veiculo',
		/*
		'status',
		'data_hora_status',
		'obs',
		*/
		array(
			'class' => 'CButtonColumn',
		),
	),
)); ?>