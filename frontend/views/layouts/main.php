<?php

use frontend\assets\AppAsset;
use yii\helpers\Html;

if(strpos(Yii::$app->request->url, '?page') != false){
	$this->registerLinkTag(['rel' => 'canonical', 'href' => ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['SERVER_NAME'] . substr(Yii::$app->request->url, 0, strpos(Yii::$app->request->url, '?page'))]);
}

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
	<meta name="google-site-verification" content="2giZ6AHyvuExnitIeH3yarYCCvLL_Xpaltwx_-3ZFR0" />
</head>

<body>
<div class="preloader">
    <svg xml:space="preserve"
         xmlns="http://www.w3.org/2000/svg"
         viewBox="0 0 500 500">
        <path d="M465.4 247c-2.2-22-12.4-43-28.9-58.4-17.1-15.9-39.3-24.7-62.7-24.7-41.5 0-77.3 27.4-88.5 67-7-7-18.5-11.7-29.3-11.7s-22.3 4.7-29.3 11.7c-11.2-39.6-47-67-88.5-67-23.3 0-45.6 8.7-62.7 24.6C59 204 48.8 225 46.6 247H32v18h14.6c2.2 22 12.4 43 28.9 58.4 17.1 15.9 39.3 24.7 62.7 24.7 50.8 0 92.1-41.2 92.1-92v-.1c0-9.9 11.5-21.6 25.7-21.6s25.7 11.7 25.7 21.6v.1c0 50.8 41.3 92 92.1 92 23.3 0 45.6-8.7 62.7-24.7 16.5-15.4 26.7-36.5 28.9-58.5H480v-18h-14.6zm-91.6 86c-42.5 0-77-34.6-77-77 0-42.5 34.6-77 77-77 42.5 0 77 34.6 77 77 0 42.5-34.5 77-77 77zm-235.6 0c-42.5 0-77-34.6-77-77 0-42.5 34.6-77 77-77 42.5 0 77 34.6 77 77 0 42.5-34.5 77-77 77z"/>
    </svg>
</div>
	<?php $this->beginBody() ?>

	<?= $this->render('_header'); ?>
	<?= $this->render('_menu'); ?>

	<main>
		<?= $content; ?>
	</main>

	<?= $this->render('_footer'); ?>

	<?php $this->endBody() ?>
	<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(22127657, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/22127657" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>

</html>
<?php $this->endPage() ?>