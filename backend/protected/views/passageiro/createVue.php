<?php
/* @var $this PassageiroController */
$this->breadcrumbs = array('Passageiros' => array('index'), 'Versão Vue');
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Criar novo passageiro (Versão Vue.js)</h1>
</div>
<v-passageiro-create submit-url="<?php echo $submitUrl; ?>"></v-passageiro-create>
<!-- <script type="module" src="<?php echo Yii::app()->request->baseUrl; ?>/js/index.ce.js"></script> -->
<script type="module" src="http://localhost:5173/@vite/client"></script>
<script type="module" src="http://localhost:5173/src/main.ts"></script>