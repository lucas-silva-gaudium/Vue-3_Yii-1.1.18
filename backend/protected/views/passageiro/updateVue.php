<?php
/* @var $this PassageiroController */
/* @var $model Passageiro */
/* @var $submitUrl string */
$this->breadcrumbs = array('Passageiros' => array('adminVue'), 'Editar (Vue)');
?>

<script>
    window.PASSAGEIRO_DATA = <?php echo CJSON::encode($model->attributes); ?>
</script>
<p><?php echo $model->nome ?></p>
<v-passageiro-update :userId="<?php echo $userId; ?>" submit-url="<?php echo $submitUrl; ?>"></v-passageiro-update>
<!-- <script type="module" src="<?php echo Yii::app()->request->baseUrl; ?>/js/index.ce.js"></script> -->
<script type="module" src="http://localhost:5173/@vite/client"></script>
<script type="module" src="http://localhost:5173/src/main.ts"></script>