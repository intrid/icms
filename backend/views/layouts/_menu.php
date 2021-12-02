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
                    ['label' => 'Заказы', 'icon' => 'shopping-basket', 'url' => ['/order']],
                    ['label' => 'Покупатели', 'icon' => 'user', 'url' => ['/user-data']],
                    ['label' => 'Товары ', 'icon' => 'shopping-cart', 'url' => ['/good']],
                    // ['label' => 'Бренды', 'icon' => 'shopping-cart', 'url' => ['/brands']],
                    ['label' => 'Каталоги', 'icon' => 'archive', 'items' =>[
                        ['label' => 'Каталог 1-го уровня', 'icon' => 'inbox', 'url' => ['/category']],
                        ['label' => 'Каталог 2-го уровня', 'icon' => 'inbox', 'url' => ['/category-one']],
                        ['label' => 'Каталог 3-го уровня', 'icon' => 'inbox', 'url' => ['/category-two']],
                    ]],
                    ['label' => 'Новости', 'icon' => 'th-list', 'items' =>[
                        ['label' => 'Разделы', 'icon' => 'list', 'url' => ['/article-category']],
                        ['label' => 'Новости', 'icon' => 'rss', 'url' => ['/article']],
                    ]],
                    ['label' => 'Контент', 'icon' => 'th-list', 'items' =>[
                        ['label' => 'Статичные страницы', 'icon' => 'sticky-note', 'url' => ['/page']],
                        ['label' => 'Наши работы', 'icon' => 'camera', 'url' => ['/gallery']],
                        ['label' => 'Слайдер', 'icon' => 'image', 'url' => ['/slider']],
                        // ['label' => 'Отзывы', 'icon' => 'comment-o', 'url' => ['/reviews']],
                    ]],
                    // ['label' => 'Генерация SiteMap', 'icon' => 'share', 'url' => ['/site/sitemap'], ],
                    ['label' => 'Настройки', 'icon' => 'cog', 'url' => ['/site/index']],
                ],
            ]
        )
        ?>
    </section>
    <img src="/icms/img/iCMS.svg" alt="iCMS" class="icms-logo">
</aside>
