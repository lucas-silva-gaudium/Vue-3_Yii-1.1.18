<?php
/* @var $this MotoristaController */
/* @var $model Motorista */

$this->breadcrumbs = array(
	'Motoristas' => array('index'),
	'Create',
);

?>

<h1>Create Motorista</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>