<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;

$cardList = array(
	array('title' => 'Passageiro (YII)', 'info' => 'Página desenvolvida totalmente com YII 1.1.28', 'url' => 'index.php?r=passageiro/admin'),
	array('title' => 'Passageiro (Vue3 + YII)', 'info' => 'Página desenvolvida com YII 1.1.28 para models e controlers, e Vue3 + PrimeVue para as Views.', 'url' => 'index.php?r=passageiro/adminvue'),
);
?>

<ul class="list-unstyled d-flex justify-content-center gap-2">
	<?php foreach ($cardList as $card): ?>
		<li>
			<a href="<?php echo $card['url']; ?>" class="text-dark text-decoration-none d-block h-100">
				<div class="card h-100" style="width: 18rem;">
					<div class="card-body d-flex flex-column gap-2 justify-content-between">
						<h5 class="card-title"><?php echo $card['title']; ?></h5>
						<p class="card-text m-0"><?php echo $card['info']; ?></p>
						<button href="#" class="btn btn-primary">Ver página</button>
					</div>
				</div>
			</a>
		</li>
	<?php endforeach; ?>
</ul>