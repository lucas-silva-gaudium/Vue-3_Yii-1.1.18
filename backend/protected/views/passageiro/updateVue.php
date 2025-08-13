<?php
/* @var $this PassageiroController */
/* @var $model Passageiro */
/* @var $submitUrl string */
$this->breadcrumbs = array('Passageiros' => array('adminVue'), 'Editar (Vue)');
?>

<script>
    window.PASSAGEIRO_DATA = <?php echo CJSON::encode($model->attributes); ?>
</script>

<v-passageiro-update :submit-url="submitUrl"></v-passageiro-update>
<!-- <script type="module" src="<?php echo Yii::app()->request->baseUrl; ?>/js/index.ce.js"></script> -->
<script type="module" src="http://localhost:5173/@vite/client"></script>
<script type="module" src="http://localhost:5173/src/main.ts"></script>