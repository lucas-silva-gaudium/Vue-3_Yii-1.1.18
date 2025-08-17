<?php
/* @var $this PassageiroController */
/* @var $model Passageiro */

$this->breadcrumbs = array(
    'Passageiros' => array('admin'),
    $model->nome => array('view', 'id' => $model->id),
    'Alterar Status',
);
?>

<h1>Nome: <?php echo $model->nome; ?></h1>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm'); ?>

    <p class="note">Por favor, selecione o novo status para o passageiro.</p>

    <div class="row">
        <div class="col-md-6">
            <?php echo $form->labelEx($model, 'status'); ?>
            <?php echo $form->dropDownList(
                $model,
                'status',
                array('A' => 'Ativo', 'I' => 'Inativo'),
                array('class' => 'form-control')
            ); ?>
            <?php echo $form->error($model, 'status'); ?>
        </div>
    </div>

    <br>

    <div class="">
        <?php echo CHtml::submitButton('Salvar Status', array('class' => 'btn btn-primary w-100')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div>
