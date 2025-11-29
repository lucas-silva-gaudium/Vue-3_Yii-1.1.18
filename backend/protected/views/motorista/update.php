<?php
/* @var $this MotoristaController */
/* @var $model Motorista */

$this->breadcrumbs = array(
	'Motoristas' => array('index'),
	$model->id => array('view', 'id' => $model->id),
	'Update',
);
?>

<h1>Atualizar dados</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>