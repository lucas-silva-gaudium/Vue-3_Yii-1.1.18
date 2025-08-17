<?php
/* @var $this CorridaController */
/* @var $model Corrida */

$this->breadcrumbs = array(
	'Corridas' => array('index'),
	'Gerenciar',
);


?>

<div class="d-flex flex-column flex-sm-row justify-content-between align-items-center mb-2">
	<h1>Gerenciar Corridas</h1>
</div>

<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search', array(
		'model' => $model,
	)); ?>
</div><?php $this->widget('zii.widgets.grid.CGridView', array(
			'id' => 'corrida-grid',
			'dataProvider' => $model->search(),
			'filter' => $model,
			'itemsCssClass' => 'table table-striped table-hover',
			'columns' => array(
				array(
					'name' => 'id',
					'headerHtmlOptions' => array('class' => 'text-dark text-decoration-none'),
				),
				array(
					'name' => 'status',
					'filter' => array('Em andamento' => 'Em andamento', 'Finalizada' => 'Finalizada', 'Não Atendida' => 'Não Atendida'),
					'type' => 'raw',
					'value' => function ($data) {
						$statusClass = '';
						if ($data->status == 'Em andamento') {
							$statusClass = 'badge bg-warning text-dark';
						} elseif ($data->status == 'Finalizada') {
							$statusClass = 'badge bg-success';
						} else {
							$statusClass = 'badge bg-secondary';
						}
						return CHtml::tag('span', array('class' => $statusClass), $data->status);
					},
					'headerHtmlOptions' => array('class' => 'text-dark text-decoration-none'),
				),
				array(
					'name' => 'passageiro_nome',
					'value' => '$data->passageiro->nome',
					'headerHtmlOptions' => array('class' => 'text-dark text-decoration-none'),
				),
				array(
					'name' => 'motorista_nome',
					'value' => '$data->motorista ? $data->motorista->nome : "N/A"',
					'headerHtmlOptions' => array('class' => 'text-dark text-decoration-none'),
				),
				array(
					'name' => 'origem_endereco',
					'headerHtmlOptions' => array('class' => 'text-dark text-decoration-none'),
				),
				array(
					'name' => 'destino_endereco',
					'headerHtmlOptions' => array('class' => 'text-dark text-decoration-none'),
				),
				array(
					'name' => 'data_hora_inicio',
					'value' => 'Yii::app()->dateFormatter->formatDateTime($data->data_hora_inicio, "medium", "short")',
					'headerHtmlOptions' => array('class' => 'text-dark text-decoration-none'),
				),
				
				array(
					'header' => 'Ações',
					'type' => 'raw',
					'htmlOptions' => array('style' => 'width: 120px; text-align: center;', 'class' => 'text-dark text-decoration-none'),
					'value' => function ($data) {
						$urlView = Yii::app()->controller->createUrl('view', array('id' => $data->id));
						$urlUpdate = Yii::app()->controller->createUrl('update', array('id' => $data->id));

						$btnView = "<a href='{$urlView}' class='btn btn-sm btn-outline-info' title='Visualizar'><i class='bi bi-eye-fill'></i></a>";
						$btnUpdate = "<a href='{$urlUpdate}' class='btn btn-sm btn-outline-primary' title='Editar'><i class='bi bi-pencil-fill'></i></a>";

						$btnDelete = CHtml::link(
							'<i class="bi bi-trash-fill"></i>',
							'#',
							array(
								'class' => 'btn btn-sm btn-outline-danger',
								'title' => 'Deletar',
								'confirm' => 'Tem certeza que deseja deletar este item?',
								'submit' => array('delete', 'id' => $data->id),
							)
						);

						return "<div class='d-flex justify-content-center gap-1'>{$btnView} {$btnUpdate} {$btnDelete}</div>";
					},
				),
			),
		)); ?>