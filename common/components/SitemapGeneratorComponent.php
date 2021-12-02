<?php

namespace common\components;


use Yii;
use yii\base\Component;
use common\models\goods\Good;
use common\models\Page;
use common\models\GoodType;
use common\models\Article;


/* 
    <loc>http://www.example.com/page1.html</loc> - адрес страницы
    <lastmod>2005-01-01</lastmod> - дата последнего обновления страницы
    <changefreq>monthly</changefreq> - частота изменения страницы
    <priority>0.8</priority> - приоритет, значимость страницы
*/


class SitemapGeneratorComponent extends Component
{
    private $factory;

    public function init()
    {
        $this->factory = new SiteMapFactory(Yii::getAlias('@app/../sitemap.xml'));
    }

    /**
     * Генерирует sitemap и сохраняет файл
     * 
     * Возвращает кол-во записанных байт либо null в случае ошибки
     * 
     * @return int|null
     */
    public function generate()
    {
        ini_set("memory_limit", "1G");

        /* Главная */
        $i = "1.0";
        $main_page_route = ['site/index'];
        $indexUrl = $this->createUrlTo($main_page_route, '1.0');
        $this->factory->append($indexUrl);

        /* category-index */
        $categoryIndexRoute = ['category/index'];
        $categoryIndexItem = $this->createUrlTo($categoryIndexRoute, '0.9');
        $this->factory->append($categoryIndexItem);


        $goodsFinder = Good::find();
        $goodsTypesFinder = GoodType::find();
        $pageFinder = Page::find();

        $goods = $goodsFinder->where(['is_delete' => 0])->all();
        foreach ($goods as $good) {
            $item = $this->createUrlToEntity($good, '/category/view-product', ['id' => 'id'], true, '0.9');
            $this->factory->append($item);
        }

        $goodsTypes = $goodsTypesFinder->all();
        foreach ($goodsTypes as $goodType) {
            $item = $this->createUrlToEntity($goodType, '/category/index', ['type_id' => 'id'], false, '0.9');
            $this->factory->append($item);
        }

        $pages = $pageFinder->where(['visibility' => 1])->all();
        foreach ($pages as $page) {
            $item = $this->createUrlToEntity($page, 'page/view', ['id' => 'id'], true, '0.8');
            $this->factory->append($item);
        }

        return $this->factory->save();
    }

    /**
     * Создаёт абсолютный url к сущности в БД
     * 
     * Например url товара 
     * @return DOM
     */
    protected function createUrlToEntity(\yii\db\ActiveRecord $record, $path, $params, $timeFlag = false,  $priority = null)
    {
        $route = [$path];
        foreach ($params as $k => $recordAttribute) {
            $route[$k] = $record->{$recordAttribute};
        }

        $url = Yii::$app->urlManagerFrontend->createAbsoluteUrl($route);
        $timeUpd =  $timeFlag ? date(\DateTime::W3C, $record->updated_at) : null;
        $item = $this->generateItem($url, $priority, $timeUpd);

        return $item;
    }

    /**
     * Создаёт url страницы 
     * 
     * @return DOM
     */
    protected function createUrlTo($route, $priority = null)
    {
        $url = Yii::$app->urlManagerFrontend->createAbsoluteUrl($route);
        $item = $this->generateItem($url, $priority, null);

        return $item;
    }

    /**
     * Создаёт xml тег
     * 
     * 
     * @param string $absoluteUrl
     * @param int $priority
     * @param int $time
     * 
     * @return DOM
     */
    protected function generateItem($absoluteUrl, $priority = null, $time = null)
    {
        //return "<url>\n\t\t<loc>{$absoluteUrl}</loc>\n\t\t<priority>{$priority}</priority>\n\t</url>";

        $loc = $this->factory->createLoc($absoluteUrl);
        $url = $this->factory->createUrl($loc);

        if (!is_null($priority)) {
            $url->appendChild($this->factory->createPriority($priority));
        }
        if (!is_null($time)) {
            $url->appendChild($this->factory->createLastmod($time));
        }

        return $url;
    }

    /**
     * Рабочий Sitemap-генератор
     */
    public function myGenerateSitemapVrn()
    {

        $handle = fopen(Yii::getAlias('@app/../sitemap.xml'), 'w');
        fwrite($handle, "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n");

        $i = "1.0";

        // Главная
        $main_page_route = [['site/index']];
        foreach ($main_page_route as $route) {
            fwrite($handle, "\t<url>\n\t\t<loc>" . Yii::$app->urlManagerFrontend->createAbsoluteUrl($route) . "</loc>\n\t\t<priority>" . $i . "</priority>\n\t</url>\n");
        }
        fwrite($handle, "\n");

        $i = "0.9";

        // Категории
        $cats = \common\models\Category::find()->all();
        foreach ($cats as $cat) {
            $good_page_url = Yii::$app->urlManagerFrontend->createAbsoluteUrl([$cat->slug . '/all']);
            fwrite($handle, "\t<url>\n\t\t<loc>" . $good_page_url . "</loc>\n\t\t<priority>" . $i . "</priority>\n\t</url>\n");
        }

        // Бренды категорий
        foreach ($cats as $cat) {
            $brandsCat = \common\models\Category::getBrandsByCategoryId($cat->id);
            foreach ($brandsCat as $brand) {
                $good_page_url = Yii::$app->urlManagerFrontend->createAbsoluteUrl([$cat->slug . '/' . $brand->slug]);
                fwrite($handle, "\t<url>\n\t\t<loc>" . $good_page_url . "</loc>\n\t\t<priority>" . $i . "</priority>\n\t</url>\n");
            }
        }

        $i = "0.8";

        // Товары
        $goods = \common\models\goods\Good::find()->where(['is_delete' => 0, 'visibility' => 1])->andWhere(['!=', 'price_vrn', 0])->all();
        foreach ($goods as $good) {
            $good_page_url = Yii::$app->urlManagerFrontend->createAbsoluteUrl(['goods/' . $good->slug]);
            fwrite($handle, "\t<url>\n\t\t<loc>" . $good_page_url . "</loc>\n\t\t<priority>" . $i . "</priority>\n\t</url>\n");
        }

        $i = "0.7";

        $pages = \common\models\Page::find()->where(['is_delete' => 0])->all();
        foreach ($pages as $page) {
            $page_url = Yii::$app->urlManagerFrontend->createAbsoluteUrl(['page/' . $page->slug]);
            $page_update_time = date(\DateTime::W3C, $page->updated_at);
            fwrite($handle, "\t<url>\n\t\t<loc>" . $page_url . "</loc>\n\t\t<lastmod>" . $page_update_time . "</lastmod>\n\t\t<priority>" . $i . "</priority>\n\t</url>\n");
        }

        $i = "0.6";

        $acrticle = \common\models\Article::find()->where(['visibility' => 1, 'is_delete' => 0])->all();
        foreach ($acrticle as $good) {
            $good_page_url = Yii::$app->urlManagerFrontend->createAbsoluteUrl(['article/' . $good->slug]);
            $good_update_time = date(\DateTime::W3C, $good->updated_at);
            fwrite($handle, "\t<url>\n\t\t<loc>" . $good_page_url . "</loc>\n\t\t<lastmod>" . $good_update_time . "</lastmod>\n\t\t<priority>" . $i . "</priority>\n\t</url>\n");
        }

        $i = "0.5";

        $other_page_route = ['article/index'];

        foreach ($other_page_route as $route) {
            $page_url = Yii::$app->urlManagerFrontend->createAbsoluteUrl([$route]);
            fwrite($handle, "\t<url>\n\t\t<loc>" . $page_url . "</loc>\n\t\t<priority>" . $i . "</priority>\n\t</url>\n");
        }


        fwrite($handle, "</urlset>");
        fclose($handle);
    }

    public function myGenerateSitemapLvn()
    {

        $handle = fopen(Yii::getAlias('@app/../sitemap_lvn.xml'), 'w');
        fwrite($handle, "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n");

        $i = "1.0";

        // Главная
        $main_page_route = [['site/index']];
        foreach ($main_page_route as $route) {
            fwrite($handle, "\t<url>\n\t\t<loc>" . Yii::$app->urlManagerFrontend->createAbsoluteUrl($route) . "</loc>\n\t\t<priority>" . $i . "</priority>\n\t</url>\n");
        }
        fwrite($handle, "\n");

        $i = "0.9";

        // Категории
        $cats = \common\models\Category::find()->all();
        foreach ($cats as $cat) {
            $good_page_url = Yii::$app->urlManagerFrontend->createAbsoluteUrl([$cat->slug . '/all']);
            fwrite($handle, "\t<url>\n\t\t<loc>" . $good_page_url . "</loc>\n\t\t<priority>" . $i . "</priority>\n\t</url>\n");
        }

        // Бренды категорий
        foreach ($cats as $cat) {
            $brandsCat = \common\models\Category::getBrandsByCategoryId($cat->id);
            foreach ($brandsCat as $brand) {
                $good_page_url = Yii::$app->urlManagerFrontend->createAbsoluteUrl([$cat->slug . '/' . $brand->slug]);
                fwrite($handle, "\t<url>\n\t\t<loc>" . $good_page_url . "</loc>\n\t\t<priority>" . $i . "</priority>\n\t</url>\n");
            }
        }

        $i = "0.8";

        // Товары
        $goods = \common\models\goods\Good::find()->where(['is_delete' => 0, 'visibility' => 1])->andWhere(['!=', 'price_lvn', 0])->all();
        foreach ($goods as $good) {
            $good_page_url = Yii::$app->urlManagerFrontend->createAbsoluteUrl(['goods/' . $good->slug]);
            fwrite($handle, "\t<url>\n\t\t<loc>" . $good_page_url . "</loc>\n\t\t<priority>" . $i . "</priority>\n\t</url>\n");
        }

        $i = "0.7";

        $pages = \common\models\Page::find()->where(['is_delete' => 0])->all();
        foreach ($pages as $page) {
            $page_url = Yii::$app->urlManagerFrontend->createAbsoluteUrl(['page/' . $page->slug]);
            $page_update_time = date(\DateTime::W3C, $page->updated_at);
            fwrite($handle, "\t<url>\n\t\t<loc>" . $page_url . "</loc>\n\t\t<lastmod>" . $page_update_time . "</lastmod>\n\t\t<priority>" . $i . "</priority>\n\t</url>\n");
        }

        $i = "0.6";

        $acrticle = \common\models\Article::find()->where(['visibility' => 1, 'is_delete' => 0])->all();
        foreach ($acrticle as $good) {
            $good_page_url = Yii::$app->urlManagerFrontend->createAbsoluteUrl(['article/' . $good->slug]);
            $good_update_time = date(\DateTime::W3C, $good->updated_at);
            fwrite($handle, "\t<url>\n\t\t<loc>" . $good_page_url . "</loc>\n\t\t<lastmod>" . $good_update_time . "</lastmod>\n\t\t<priority>" . $i . "</priority>\n\t</url>\n");
        }

        $i = "0.5";

        $other_page_route = ['article/index'];

        foreach ($other_page_route as $route) {
            $page_url = Yii::$app->urlManagerFrontend->createAbsoluteUrl([$route]);
            fwrite($handle, "\t<url>\n\t\t<loc>" . $page_url . "</loc>\n\t\t<priority>" . $i . "</priority>\n\t</url>\n");
        }


        fwrite($handle, "</urlset>");
        fclose($handle);
    }

    public function myGenerateSitemapFrl()
    {

        $handle = fopen(Yii::getAlias('@app/../sitemap_frl.xml'), 'w');
        fwrite($handle, "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n");

        $i = "1.0";

        // Главная
        $main_page_route = [['site/index']];
        foreach ($main_page_route as $route) {
            fwrite($handle, "\t<url>\n\t\t<loc>" . Yii::$app->urlManagerFrontend->createAbsoluteUrl($route) . "</loc>\n\t\t<priority>" . $i . "</priority>\n\t</url>\n");
        }
        fwrite($handle, "\n");

        $i = "0.9";

        // Категории
        $cats = \common\models\Category::find()->all();
        foreach ($cats as $cat) {
            $good_page_url = Yii::$app->urlManagerFrontend->createAbsoluteUrl([$cat->slug . '/all']);
            fwrite($handle, "\t<url>\n\t\t<loc>" . $good_page_url . "</loc>\n\t\t<priority>" . $i . "</priority>\n\t</url>\n");
        }

        // Бренды категорий
        foreach ($cats as $cat) {
            $brandsCat = \common\models\Category::getBrandsByCategoryId($cat->id);
            foreach ($brandsCat as $brand) {
                $good_page_url = Yii::$app->urlManagerFrontend->createAbsoluteUrl([$cat->slug . '/' . $brand->slug]);
                fwrite($handle, "\t<url>\n\t\t<loc>" . $good_page_url . "</loc>\n\t\t<priority>" . $i . "</priority>\n\t</url>\n");
            }
        }

        $i = "0.8";

        // Товары
        $goods = \common\models\goods\Good::find()->where(['is_delete' => 0, 'visibility' => 1])->andWhere(['!=', 'price_frl', 0])->all();
        foreach ($goods as $good) {
            $good_page_url = Yii::$app->urlManagerFrontend->createAbsoluteUrl(['goods/' . $good->slug]);
            fwrite($handle, "\t<url>\n\t\t<loc>" . $good_page_url . "</loc>\n\t\t<priority>" . $i . "</priority>\n\t</url>\n");
        }

        $i = "0.7";

        $pages = \common\models\Page::find()->where(['is_delete' => 0])->all();
        foreach ($pages as $page) {
            $page_url = Yii::$app->urlManagerFrontend->createAbsoluteUrl(['page/' . $page->slug]);
            $page_update_time = date(\DateTime::W3C, $page->updated_at);
            fwrite($handle, "\t<url>\n\t\t<loc>" . $page_url . "</loc>\n\t\t<lastmod>" . $page_update_time . "</lastmod>\n\t\t<priority>" . $i . "</priority>\n\t</url>\n");
        }

        $i = "0.6";

        $acrticle = \common\models\Article::find()->where(['visibility' => 1, 'is_delete' => 0])->all();
        foreach ($acrticle as $good) {
            $good_page_url = Yii::$app->urlManagerFrontend->createAbsoluteUrl(['article/' . $good->slug]);
            $good_update_time = date(\DateTime::W3C, $good->updated_at);
            fwrite($handle, "\t<url>\n\t\t<loc>" . $good_page_url . "</loc>\n\t\t<lastmod>" . $good_update_time . "</lastmod>\n\t\t<priority>" . $i . "</priority>\n\t</url>\n");
        }

        $i = "0.5";

        $other_page_route = ['article/index'];

        foreach ($other_page_route as $route) {
            $page_url = Yii::$app->urlManagerFrontend->createAbsoluteUrl([$route]);
            fwrite($handle, "\t<url>\n\t\t<loc>" . $page_url . "</loc>\n\t\t<priority>" . $i . "</priority>\n\t</url>\n");
        }


        fwrite($handle, "</urlset>");
        fclose($handle);
    }
}
