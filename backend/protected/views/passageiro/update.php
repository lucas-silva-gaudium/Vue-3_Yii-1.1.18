<?php
/* @var $this PassageiroController */
/* @var $model Passageiro */

$this->breadcrumbs = array(
	'Passageiros' => array('index'),
	$model->id => array('view', 'id' => $model->id),
	'Update',
);
?>

<h1>Atualizar dados</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>