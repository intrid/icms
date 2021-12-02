<?php

$this->title = Yii::$app->settings->get('Settings.title');
$this->registerMetaTag(['name' => 'description', 'content' => Yii::$app->settings->get('Settings.description')]);
$this->registerMetaTag(['name' => 'keywords', 'content' => Yii::$app->settings->get('Settings.keywords')]);

?>
