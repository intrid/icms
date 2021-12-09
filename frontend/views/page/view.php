<?php

$text = $model->text_one;
$class = 'brands--no-decor';

// Карта lazy 
if ((strripos($text, '[%map%]'))) {
	$text = str_replace("[%map%]", $this->render('../common/_map'), $text);
}

// Слайдер брендов
if ((strripos($text, '[%brands%]'))) {
	$text = str_replace("[%brands%]", $this->render('../common/_section_brands', compact('class')), $text);
}

?>

<?= $text ?>