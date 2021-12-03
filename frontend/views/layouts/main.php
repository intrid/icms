<?php

use frontend\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);

?>

<?php $this->beginPage() ?>
<!doctype html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1,maximum-scale=1,minimum-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?= Html::encode($this->title) ?></title>
	<?= Html::csrfMetaTags(); ?>
	<?php $this->head() ?>
</head>

<body>
	<?php $this->beginBody() ?>

	<?= $this->render('_header'); ?>
	<?= $this->render('_menu'); ?>

	<main>
		<?= $content; ?>
	</main>

	<?= $this->render('_footer'); ?>

	<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>