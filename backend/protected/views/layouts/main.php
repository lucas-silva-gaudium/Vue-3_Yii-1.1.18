<?php /* @var $this Controller */
$navigationLinks = array(
	'passageiro' => 'index.php?r=passageiro'
);
?>
<!DOCTYPE html>
<html>

<head>
	<!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> -->
	<!-- <meta name="language" content="en"> -->
	<!-- blueprint CSS framework -->
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection"> -->
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print"> -->
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css"> -->
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css"> -->

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>
	<header class="p-3 m-0 border-bottom">
		<div class="container">
			<div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
				<a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
					<figure class="figure__footer m-0">
						<img src="https://static.wixstatic.com/media/c5ed20_b07fe8ca0ecd4fa59cfca60d58ee03a1~mv2_d_2268_2268_s_2.png/v1/fill/w_80,h_80,al_c,q_85,usm_0.66_1.00_0.01,enc_avif,quality_auto/gaudium-logo-transparente.png" alt="Gaudium logo">
					</figure>

				</a>
				<ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 ms-4">
					<?php foreach ($navigationLinks as $title => $link): ?>
						<li><a href="<?php echo $link; ?>" class="nav-link px-2 link-secondary"><?php echo $title; ?></a></li>
					<?php endforeach; ?>
				</ul>
				<form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search"> <input type="search"
						class="form-control" placeholder="Pesquisar..." aria-label="Search"> </form>
				<div class="dropdown text-end">
					<a href="#"
						class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
						data-bs-toggle="dropdown"
						aria-expanded="false">
						<img src="https://imgs.search.brave.com/XxA7hVnWvSz2UXIWuYPbuO_ZYEJ5u0JDYEElP3rtlhc/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tYXJr/ZXRwbGFjZS5jYW52/YS5jb20vRUFGUXVk/MXdSaWcvMS8wLzE2/MDB3L2NhbnZhLXBy/b2Zlc3Npb25hbC1s/aW5rZWRpbi1wcm9m/aWxlLXBpY3R1cmUt/UUREWDZjLVNUS0Uu/anBn" alt="mdo" width="32" height="32" class="rounded-circle">
					</a>
					<ul class="dropdown-menu text-small">
						<?php foreach ($navigationLinks as $title => $link): ?>
							<li><a class="dropdown-item" href="<?php echo $link; ?>"><?php echo $title; ?></a></li>
						<?php endforeach; ?>
						<li>
							<hr class="dropdown-divider">
						</li>
						<li><a class="dropdown-item" href="/">Sair</a></li>
					</ul>
				</div>
			</div>
		</div>
	</header>

	<main class="container py-5">
		<?php echo $content; ?>
	</main>

	<footer class="border-top py-3 m-0">
		<div class="d-flex flex-wrap justify-content-between align-items-center container">
			<p class="col-md-4 mb-0 text-body-secondary">© 2025 Gaudium, Inc</p>
			<a href="/"
				class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none"
				aria-label="Bootstrap">
				<figure class="figure__footer m-0">
					<img src="https://static.wixstatic.com/media/c5ed20_b07fe8ca0ecd4fa59cfca60d58ee03a1~mv2_d_2268_2268_s_2.png/v1/fill/w_80,h_80,al_c,q_85,usm_0.66_1.00_0.01,enc_avif,quality_auto/gaudium-logo-transparente.png" alt="Gaudium logo">
				</figure>
			</a>
			<ul class="nav col-md-4 justify-content-end">
				<?php foreach ($navigationLinks as $title => $link): ?>
					<li class="nav-item"><a href="<?php echo $link; ?>" class="nav-link px-2 text-body-secondary"><?php echo $title; ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</footer>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>