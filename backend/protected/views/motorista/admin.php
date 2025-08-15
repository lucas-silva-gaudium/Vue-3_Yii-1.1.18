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

<div class="d-flex flex-column flex-sm-row justify-content-between align-items-center mb-2">
	<h1>Motoristas</h1>
	<div>
		<?php echo CHtml::link('Pesquisa avançada', '#', array('class' => 'btn btn-primary search-button text-white text-decoration-none')); ?>
		<?php echo CHtml::link('+', array('create'), array('class' => 'btn btn-success')); ?>
	</div>
</div>

<!-- search-form -->
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search', array(
		'model' => $model,
	)); ?>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'motorista-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'itemsCssClass' => 'table table-striped table-hover',
	'columns' => array(
		[
			'name' => 'id',
			'headerHtmlOptions' => ['class' => 'text-dark text-decoration-none'],
		],
		[
			'name' => 'nome',
			'headerHtmlOptions' => ['class' => 'text-dark text-decoration-none'],
		],
		[
			'name' => 'nascimento',
			'headerHtmlOptions' => ['class' => 'text-dark text-decoration-none'],
		],
		[
			'name' => 'email',
			'headerHtmlOptions' => ['class' => 'text-dark text-decoration-none'],
		],
		[
			'name' => 'telefone',
			'headerHtmlOptions' => ['class' => 'text-dark text-decoration-none'],
		],
		[
			'name' => 'placa_veiculo',
			'headerHtmlOptions' => ['class' => 'text-dark text-decoration-none'],
		],
		array(
			'header' => 'Ações',
			'type' => 'raw',
			'htmlOptions' => array('style' => 'width: 120px; text-align: center;', 'class' => 'text-dark text-decoration-none'),
			'value' => function ($data) {
				$urlView = Yii::app()->controller->createUrl('view', array('id' => $data->id));
				$urlUpdate = Yii::app()->controller->createUrl('update', array('id' => $data->id));
				$urlDelete = Yii::app()->controller->createUrl('delete', array('id' => $data->id));

				$btnView = "<a href='{$urlView}' class='btn btn-sm btn-outline-info' title='Visualizar'><i class='bi bi-eye-fill'></i></a>";
				$btnUpdate = "<a href='{$urlUpdate}' class='btn btn-sm btn-outline-primary' title='Editar'><i class='bi bi-pencil-fill'></i></a>";

				$btnDelete = CHtml::link(
					'<i class="bi bi-trash-fill"></i>',
					$urlDelete,
					array(
						'class' => 'btn btn-sm btn-outline-danger',
						'title' => 'Deletar',
						'confirm' => 'Tem certeza que deseja deletar este item?',
					)
				);

				return "<div class='d-flex justify-content-center gap-1'>{$btnView} {$btnUpdate} {$btnDelete}</div>";
			},
		),
	),
)); ?>