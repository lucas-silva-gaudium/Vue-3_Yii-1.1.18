<?php
/* @var $this PassageiroController */
$this->breadcrumbs = array('Passageiros' => array('index'), 'Versão Vue');
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Passageiros (Versão Vue.js)</h1>
</div>

<v-passageiro-admin></v-passageiro-admin>

<script>
window.PASSAGEIROS_DATA = <?php echo CJSON::encode($model->search()->getData()); ?>
</script>
<!-- <script type="module" src="<?php echo Yii::app()->request->baseUrl; ?>/js/index.ce.js"></script> -->
<script type="module" src="http://localhost:5173/@vite/client"></script>
<script type="module" src="http://localhost:5173/src/main.ts"></script>