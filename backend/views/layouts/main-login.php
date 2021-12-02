<?php
/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
 	<meta charset="<?= Yii::$app->charset ?>">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<?php $this->registerCsrfMetaTags() ?>
 	<title><?= Html::encode($this->title) ?></title>
	<link rel="apple-touch-icon" sizes="180x180" href="/img/favicons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/img/favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/img/favicons/favicon-16x16.png">
 	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
 	<?php $this->head() ?>
</head>
<?php $this->beginBody() ?>
	<?= $content?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
