<?php

namespace common\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\helpers\FileHelper;
use common\models\Goods;
use common\models\Page;
use common\models\Article;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\Base\Model;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\swiftmailer\Mailer;

class MyHelper extends Component {

    /**
     * Подключение mailer из админки
     */
    public static function getIcmsMailer()
    {
        $settings = Yii::$app->settings;
        $settings->clearCache();
        $host  = $settings->get('Settings.smtp_host');
        $username  = $settings->get('Settings.smtp_username');
        $password  = $settings->get('Settings.smtp_password');
        $post = $settings->get('Settings.smtp_port');
        $encryption = $settings->get('Settings.smtp_encrypt');

        $mailer = Yii::createObject([
            'class' => Mailer::class,
            'useFileTransport' => false,
            'viewPath' => '@common/mail',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' =>  $host, 
                'username' => $username,
                'password' => $password,
                'port' =>  $post, 
                'encryption' => $encryption, 
            ],
        ]);

        return $mailer;
    }

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

    
    public static function getBackendGreedView( ActiveDataProvider $dataProvider, Model $searchModel = null , $attributesNames = [], $templateButtons = null )
    {
        $actionColumn = [['class' => 'yii\grid\ActionColumn']];
        if ( ! is_null( $templateButtons ) ) {
            $actionColumn[0]['template'] = $templateButtons;
        }

        $columns = array_merge(
            [['class' => 'yii\grid\SerialColumn']], 
            $attributesNames,  
            $actionColumn
        );

        return GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => $columns
        ]); 
    }

    public function generateSitemap() {

        ini_set("memory_limit", "1000M");
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
        fwrite($handle, "\n");

        /*
        $i = "0.9";


        $types_goods = [0, 1];
        foreach($types_goods as $type){
            fwrite($handle, "\t<url>\n\t\t<loc>" . Yii::$app->urlManagerFrontend->createAbsoluteUrl(['/goods/index', 'type' => $type]) . "</loc>\n\t\t<priority>" . $i . "</priority>\n\t</url>\n");
            foreach ($brands as $brand) {
                $brand_url = Yii::$app->urlManagerFrontend->createAbsoluteUrl(['/goods/index', 'type' => $type, 'brand' => $brand->id]);
                fwrite($handle, "\t<url>\n\t\t<loc>" . $brand_url . "</loc>\n\t\t<priority>" . $i . "</priority>\n\t</url>\n");
            }
        }


        $i = "0.8";

        $goods = Goods::find()->where(['is_delete' => 0, 'visibility' => 1])->all();
        foreach ($goods as $good) {
            $good_url = Yii::$app->urlManagerFrontend->createAbsoluteUrl(['/goods/view', 'id' => $good->id]);
            $good_update_time = date(\DateTime::W3C, $good->updated_at);
            fwrite($handle, "\t<url>\n\t\t<loc>" . $good_url . "</loc>\n\t\t<lastmod>" . $good_update_time . "</lastmod>\n\t\t<priority>" . $i . "</priority>\n\t</url>\n");
        }


        $i = "0.7";

        $pages = Page::find()->where(['visibility' => 1])->all();
        foreach ($pages as $page) {
            $page_url = Yii::$app->urlManagerFrontend->createAbsoluteUrl(['page/view', 'id' => $page->id]);
            $page_update_time = date(\DateTime::W3C, $page->updated_at);
            fwrite($handle, "\t<url>\n\t\t<loc>" . $page_url . "</loc>\n\t\t<lastmod>" . $page_update_time . "</lastmod>\n\t\t<priority>" . $i . "</priority>\n\t</url>\n");
        }


        $i = "0.6";

        $static_pages_routes = [['/article'], ['/review-company'], ['/price'], ['/explosive-drawings']];
        foreach ($static_pages_routes as $route) {
            fwrite($handle, "\t<url>\n\t\t<loc>" . Yii::$app->urlManagerFrontend->createAbsoluteUrl($route) . "</loc>\n\t\t<priority>" . $i . "</priority>\n\t</url>\n");
        }

        $articles = Article::find()->where(['visibility' => 1, 'is_delete' => 0])->all();
        foreach ($articles as $article) {
            $article_url = Yii::$app->urlManagerFrontend->createAbsoluteUrl(['article/view', 'id' => $article->id]);
            $article_update_time = date(\DateTime::W3C, $article->updated_at);
            fwrite($handle, "\t<url>\n\t\t<loc>" . $article_url . "</loc>\n\t\t<lastmod>" . $article_update_time . "</lastmod>\n\t\t<priority>" . $i . "</priority>\n\t</url>\n");
        }

        */
        fwrite($handle, "</urlset>");
        fclose($handle);

        return true;
    }

    //Yii::$app->myHelper->getCssSliderHide() - добавить в контроллер при сохранении и изменении

    public function getCssSliderHide() {
        Yii::$app->cache->flush();

        $page = Page::find()->where(['visibility' => 1])->all();

        $strCss1 = '';

        foreach ($page as $model) {

            $imgLG = $model->getImageByName('slideHide_lg_page_' . $model->id)->getPathF();
            $imgMD = $model->getImageByName('slideHide_md_page_' . $model->id)->getPathF();
            $imgSM = $model->getImageByName('slideHide_sm_page_' . $model->id)->getPathF();
            $imgXS = $model->getImageByName('slideHide_xs_page_' . $model->id)->getPathF();

            $strCss1 .= '.' . Page::tableName() . '_' . $model->id . ' {background-image: url(\'' . $imgLG . '\');}';
            $strCss1 .= '@media (max-width: 1199px){.' . Page::tableName() . '_' . $model->id . ' {background-image: url(\'' . $imgMD . '\');}}';
            $strCss1 .= '@media (max-width: 991px){.' . Page::tableName() . '_' . $model->id . ' {background-image: url(\'' . $imgSM . '\');}}';
            $strCss1 .= '@media (max-width: 400px){.' . Page::tableName() . '_' . $model->id . ' {background-image: url(\'' . $imgXS . '\');}}';
        }

        $str = $strCss1 . "\n";

        file_put_contents('../../frontend/web/css/main-head-style.css', '');
        file_put_contents('../../frontend/web/css/main-head-style.css', $str, FILE_APPEND);
        $this->clearCssCompress();
    }

    public function clearCssCompress() {
        $compressed_css_dir = Yii::getAlias('@frontend/web/assets/css-compress');

        if (is_dir($compressed_css_dir)) {
            FileHelper::removeDirectory($compressed_css_dir);
        }
    }

    public function monthlyRussian($date) {
        switch (date("m", $date)) {
            case '01': $startMonth = 'января';
                break;
            case '02': $startMonth = 'февраля';
                break;
            case '03': $startMonth = 'марта';
                break;
            case '04': $startMonth = 'апреля';
                break;
            case '05': $startMonth = 'мая';
                break;
            case '06': $startMonth = 'июня';
                break;
            case '07': $startMonth = 'июля';
                break;
            case '08': $startMonth = 'августа';
                break;
            case '09': $startMonth = 'сентября';
                break;
            case '10': $startMonth = 'октября';
                break;
            case '11': $startMonth = 'ноября';
                break;
            case '12': $startMonth = 'декабря';
                break;
        }
        return $startMonth;
    }

    public function getForntPrice( $price ) 
    {
        return number_format( $price, 2, ',', ' ' );
    }

    public function getUrlAgreement() 
    {
        return Url::to(['site/agreement']);
    }

    public function getLinkElementAgreement() 
    {
        return Html::a( "Политика конфиденциальности", $this->getUrlAgreement(), ['target'=>'_blank'] );
    }

    public function getCompanyName() 
    {
        return mb_strtoupper( Yii::$app->name );
    }

    /*
     * 1. Считаем кол-во недель/дней
     * 2. Опеределяем остаток дней
     */

    public function fromNumbersToWords($number) {
        $countWeek = floor($number / 7);
        $countDay = $number - $countWeek * 7;
        
        $dayWord = [
            0 => 'дней',
            1 => 'день',
            2 => 'дня',
            3 => 'дня',
            4 => 'дня',
            5 => 'дней',
            6 => 'дней',
        ];

        $weekWord = [
            1 => 'неделя',
            2 => 'недели',
            3 => 'недели',
            4 => 'недели',
            5 => 'недель',
            6 => 'недель',
            7 => 'недель',
            8 => 'недель',
            9 => 'недель',
            10 => 'недель',
            11 => 'недель',
            12 => 'недель',
            13 => 'недель',
            14 => 'недель',
            15 => 'недель',
        ];
        
        return $countWeek.' '.$weekWord[$countWeek].' и '.$countDay.' '.$dayWord[$countDay];
    }

}
