<?php
/* @var $this PassageiroController */
/* @var $model Passageiro */

$this->breadcrumbs = array(
	'Passageiros' => array('index'),
	'Manage',
);

$this->menu = array(
	array('label' => 'List Passageiro', 'url' => array('index')),
	array('label' => 'Create Passageiro', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#passageiro-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<div class="d-flex flex-column flex-sm-row justify-content-between align-items-center mb-2">
	<h1>Passageiros</h1>
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
	'id' => 'passageiro-grid',
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
			'name' => 'data_hora_status',
			'headerHtmlOptions' => ['class' => 'text-dark text-decoration-none'],
		],
		[
			'name' => 'status',
			'htmlOptions' => array('class' => 'text-dark text-decoration-none'),
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