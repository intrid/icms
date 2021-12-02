<?php

namespace common\components;

use common\models\materials\Materials;
use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;

class MyComponent extends Component
{
    const MODELS_NAMESPACE = '\common\models\\';
    const CLASS_MAPPER = [
        'Materials' => self::MODELS_NAMESPACE . 'materials\Materials',
        'Events' => self::MODELS_NAMESPACE . 'events\Events',
        'Links' => self::MODELS_NAMESPACE . 'Links',
        'Teachers' => self::MODELS_NAMESPACE . 'Teachers',
        'Studios' => self::MODELS_NAMESPACE . 'studios\Studios',
        'MaterialTypes' => self::MODELS_NAMESPACE . 'materials\MaterialTypes',
        'AgeTypes' => self::MODELS_NAMESPACE . 'AgeTypes',
        'Good' => self::MODELS_NAMESPACE . 'Good',
    ];


    function short_text($text, $length = 75) {
        $text_before_shortening = mb_ereg_replace('[^\w]+$', '', $text);
        $text = trim(mb_substr(strip_tags($text_before_shortening), 0, $length, 'UTF-8'));
        if (!empty($text) && (mb_strlen($text_before_shortening) > $length))
            $text .= '…';
        return $text;
    }

    public function e($var) {

        header('Content-type: text/plain; charset=utf-8');
        print_r($var);
        exit;
    }

    public static function translit($str) {
        $str = transliterator_transliterate('Any-Latin; Latin-ASCII; [\u0080-\uffff] remove', $str);
        $str = strtolower($str);
        $str = preg_replace('/[^a-z0-9]/i', '-', $str);
        $str = preg_replace('/-+/', '-', $str);
        $str = preg_replace('/-$|^-/', '', $str);

        return $str ?: '-';
    }

    function checkRouteAndParams($route, $params = []) {

        if (Yii::$app->controller->id . '/' . Yii::$app->controller->action->id != $route) {
            return false;
        }

        foreach ($params as $param_name => $param_value) {
            $got_param = false;
            if (isset(Yii::$app->request->queryParams[$param_name])) {
                if (Yii::$app->request->queryParams[$param_name] == $param_value) {
                    $got_param = true;
                }
            }
            if (!$got_param)
                return false;
        }

        return true;
    }

    public function generateSitemap() {

        $handle = fopen(Yii::getAlias('@app/../sitemap.xml'), 'w');
        fwrite($handle, "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n");

        /*
            <loc>http://www.example.com/page1.html</loc> - адрес страницы
            <lastmod>2005-01-01</lastmod> - дата последнего обновления страницы
            <changefreq>monthly</changefreq> - частота изменения страницы
            <priority>0.8</priority> - приоритет, значимость страницы
        */

        /* priority 1.0 start */
        /* Главная */

        $i = "1.0";

        $main_page_route = [['site/index']];
        foreach ($main_page_route as $route) {
            fwrite($handle, "\t<url>\n\t\t<loc>" . Yii::$app->urlManagerFrontend->createAbsoluteUrl($route) . "</loc>\n\t\t<priority>" . $i . "</priority>\n\t</url>\n");
        }

        /* priority end */

        fwrite($handle, "\n");

        /* priority 0.9 start */
        /* Рубрики */

        $i = "0.9";
        
        /* priority end */

        /* priority 0.8 start */
        /* Товары */

        $i = "0.8";

        $goods = \common\models\CatalogGood::find()->all();
        foreach ($goods as $good) {
            if (empty($good->type)) {
                continue;
            }

            $good_page_url = Yii::$app->urlManagerFrontend->createAbsoluteUrl(['catalog/good', 'id' => $good->id]);
            $good_update_time = date(\DateTime::W3C, $good->updated_at);
            fwrite($handle, "\t<url>\n\t\t<loc>" . $good_page_url . "</loc>\n\t\t<lastmod>" . $good_update_time . "</lastmod>\n\t\t<priority>" . $i . "</priority>\n\t</url>\n");
        }


        /* priority end */

        /* priority 0.7 start */
        /* Статика */

        $i = "0.7";

        $pages = \common\models\Page::find()->all();
        foreach ($pages as $page) {
            $page_url = Yii::$app->urlManagerFrontend->createAbsoluteUrl(['page/slug', 'slug' => $page->slug]);
            $page_update_time = date(\DateTime::W3C, $page->updated_at);
            fwrite($handle, "\t<url>\n\t\t<loc>" . $page_url . "</loc>\n\t\t<lastmod>" . $page_update_time . "</lastmod>\n\t\t<priority>" . $i . "</priority>\n\t</url>\n");
        }

        /* priority end */

        /* priority 0.6 start */
        /* Новости, фото, блог, отзывы */

        $i = "0.6";

        $static_pages_routes = [['page/article-page'], ['portfolio']];
        foreach ($static_pages_routes as $route) {
            fwrite($handle, "\t<url>\n\t\t<loc>" . Yii::$app->urlManagerFrontend->createAbsoluteUrl($route) . "</loc>\n\t\t<priority>" . $i . "</priority>\n\t</url>\n");
        }

        $portfolio = \common\models\OurWork::find()->all();
        foreach ($portfolio as $good) {
            $good_page_url = Yii::$app->urlManagerFrontend->createAbsoluteUrl(['portfolio/view', 'id' => $good->id]);
            $good_update_time = date(\DateTime::W3C, time());
            fwrite($handle, "\t<url>\n\t\t<loc>" . $good_page_url . "</loc>\n\t\t<lastmod>" . $good_update_time . "</lastmod>\n\t\t<priority>" . $i . "</priority>\n\t</url>\n");
        }

        $acrticle = \common\models\Article::find()->all();
        foreach ($acrticle as $good) {
            $good_page_url = Yii::$app->urlManagerFrontend->createAbsoluteUrl(['article/page', 'id' => $good->id]);
            $good_update_time = date(\DateTime::W3C, $good->updated_at);
            fwrite($handle, "\t<url>\n\t\t<loc>" . $good_page_url . "</loc>\n\t\t<lastmod>" . $good_update_time . "</lastmod>\n\t\t<priority>" . $i . "</priority>\n\t</url>\n");
        }

        /* priority end */

        fwrite($handle, "</urlset>");
        fclose($handle);
    }

    function trim_text($input, $length, $ellipses = true, $strip_html = true) {
        //strip tags, if desired
        if ($strip_html) {
            $input = strip_tags($input);
        }

        //no need to trim, already shorter than trim length
        if (mb_strlen($input) > $length) {
            //find last space within length
            $last_space = mb_strrpos(mb_substr($input, 0, $length), ' ');
            $trimmed_text = mb_substr($input, 0, $last_space);
        } else {
            $trimmed_text = $input;
        }

        $trimmed_text = Yii::$app->formatter->mb_trim($trimmed_text);

        if (in_array(mb_substr($trimmed_text, -1), [':', ',', '.'])) {
            $trimmed_text = mb_substr($input, 0, mb_strlen($trimmed_text) - 1);
        }

        //add ellipses (...)
        if ($ellipses) {
            $trimmed_text .= '...';
        }
        $trimmed_text = mb_ereg_replace('\s*[-—]$', '', $trimmed_text);
        return $trimmed_text;
    }

    public function generateNewFileName($file_name, $dir) {
        //если русское имя файла - транслитерируем
        $extension = pathinfo($file_name, PATHINFO_EXTENSION);
        $new_photo_base_name = Yii::$app->mycomponent->translit(pathinfo($file_name, PATHINFO_FILENAME));
        $new_photo_name = $new_photo_base_name . '.' . $extension;

        //Если уже есть файл с таким именем, добавляем цифру
        $same_name_num = 0;
        while (file_exists($dir . '/' . $new_photo_name)) {
            $same_name_num++;
            $new_photo_name = $new_photo_base_name . '-' . $same_name_num . '.' . $extension;
        }

        return $new_photo_name;
    }

    /**
     * @return array
     */
    public static function getYesNo()
    {
        return [0 => 'Нет', 1 => 'Да'];
    }

    /**
     * @param $id
     * @return string
     */
    public static function getYesNoName($id)
    {

        $arr = self::getYesNo();
        if (array_key_exists($id, $arr)) {
            return $arr[$id];
        }

        return '';
    }

    /**
     * @param string $id
     * @return string
     */
    public static function getYesNoNameString($id)
    {
        return $id?'Да':"Нет";

    }

    /**
     * Путь к иконке для тех кто растёт или для тех кто растит
     * @param int $id
     * @return string
     */
    public static function getStudentTypeIcon($id)
    {
        $path = '';
        $prefix = '/images/general/interest/';
        switch ($id) {
            case Materials::TYPE_CHILD :
                $path = $prefix . 'i1.png';
                break;
            case Materials::TYPE_PARENT:
                $path = $prefix . 'i2.png';
                break;


        }

        return $path;
    }

}
