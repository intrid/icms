<?php

$this->title = Yii::$app->settings->get('Settings.title');
$this->registerMetaTag(['name' => 'description', 'content' => Yii::$app->settings->get('Settings.description')]);
$this->registerMetaTag(['name' => 'keywords', 'content' => Yii::$app->settings->get('Settings.keywords')]);

?>

<?= $this->render('_slider'); ?>
<?= $this->render('_form'); ?>

<?= $this->render('_section_about'); ?>
<?= $this->render('_section_services'); ?>
<?= $this->render('_section_brands'); ?>
<?= $this->render('_section_reviews'); ?>
<?= $this->render('_section_our'); ?>

<?= $this->render('_feedback'); ?>
<?= $this->render('_map'); ?>