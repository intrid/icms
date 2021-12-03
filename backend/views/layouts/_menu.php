<?php

use yii\helpers\Url;
use backend\components\widgets\Menu;
use backend\components\widgets\Alert;
?>
<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li class="header">iCMS</li>
        </ul>
        <?=
        Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                'items' => [
                    ['label' => 'Наши специалисты', 'icon' => 'user', 'url' => ['/specialists']],
                    ['label' => 'Бренды', 'icon' => 'tags', 'url' => ['/brands']],
                    ['label' => 'Слайдер', 'icon' => 'image', 'url' => ['/slider']],
                    ['label' => 'Галерея', 'icon' => 'camera', 'url' => ['/gallery']],
                    ['label' => 'Страницы', 'icon' => 'sticky-note', 'url' => ['/page']],
                    ['label' => 'Отзывы', 'icon' => 'comment-o', 'url' => ['/reviews']],
                    // ['label' => 'Генерация SiteMap', 'icon' => 'share', 'url' => ['/site/sitemap'], ],
                    ['label' => 'Настройки', 'icon' => 'cog', 'url' => ['/site/index']],
                ],
            ]
        )
        ?>
    </section>
    <img src="/icms/img/iCMS.svg" alt="iCMS" class="icms-logo">
</aside>