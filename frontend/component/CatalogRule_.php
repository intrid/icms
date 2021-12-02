<?php

namespace frontend\component;


use Yii;
use \yii\web\UrlRuleInterface;
use common\models\GoodType;
use common\models\Good;
use common\models\search\GoodSearch;


class CatalogRule implements UrlRuleInterface {

    private $_routes = [
        'category/index',
        'category/view-product' 
    ];

    private $_route;
    private $_url;
    
    public function createUrl($manager, $route, $params ) 
    {   
        if ( ! in_array( $route, $this->_routes ) ) {
            return false; 
        }

        $request = Yii::$app->request;
        $formSearch = new GoodSearch();
        $post = $request->post();

        $this->_route = $route;

        if ( $this->_route == 'category/index' ) {

            if ( isset( $post[$formSearch->formName()]['goodsIds'] ) ) {
                $params[$formSearch->formName()] = []; 
                $params[$formSearch->formName()]['goodsIds'] = $post[$formSearch->formName()]['goodsIds'];
            }

            $this->_url = $this->createCategoryUrl( $params );

            
            if ( ! empty( $params ) ) {
                $this->_url .= '?' . http_build_query( $params );
            }
    
        } else if (  $this->_route == 'category/view-product' ) {
            $this->_url = $this->createGoodUrl( $params );
        }

        return $this->_url;
    }

    public function parseRequest( $manager, $request ) 
    {
        $path = $request->pathInfo;
        $urls = explode('/', $path);

        if ( $urls[0] == 'akb' ) {
            return $this->parseCategoryUrl( $manager, $request, $urls );
        } else if ( count( $urls ) == 1 ) {
            return $this->parseGoodUrl( $manager, $request, $urls );
        } 

        return false;
    }

    protected function createCategoryUrl( & $params )  
    {
        $url = "/akb";
        if ( isset( $params['type_id'] ) ) {
            $type = GoodType::findOne( $params['type_id'] );
            $url .= '/' . $type->slug;
            unset( $params['type_id'] );
        }

        if ( isset( $params['page'] ) ) {
            $url .= "/page/{$params['page']}";
            unset( $params['page'] );
        }

        return $url;
    }

    protected function createGoodUrl( $params )  
    {
        $url = "/";
        $good = Good::findOne( $params['id'] );
        if ( ! is_null( $good ) ) {
            $url .= $good->slug; 
        }

        return $url;
    }

    protected function parseCategoryUrl( $manager, $request, $paramsQuery ) 
    {
        $params = [];
        $countParams = count( $paramsQuery );
        if ( $countParams > 4 ) { return false; }

        switch ( $countParams ) {
            case 4:
                $slugable =  GoodType::findOne(['slug' => $paramsQuery[1]]);
                if ( null == $slugable ) { return false; }
                $params['type_id'] = $slugable->id;
                $params['page'] = $paramsQuery[3];
            break;

            case 3:
                if ( $paramsQuery[1] != 'page' ) {
                    $slugable =  GoodType::findOne(['slug' => $paramsQuery[1]]);
                    if ( is_null( $slugable ) ) {
                        return false;
                    }
                }
                
                $params['page'] = $paramsQuery[2];
            break;

            case 2:
                $slugable =  GoodType::findOne(['slug' => $paramsQuery[1]]);
                if ( null == $slugable ) { return false; }
                $params['type_id'] = $slugable->id;
                $params['page'] = 1;
            break;

            case 1:
                $params['page'] = 1;
            break;
            
            default:
                return false;
            break;
        }
    
        return ['category/index', $params];
    }

    protected function parseGoodUrl( $manager, $request, $paramsQuery  ) 
    {
        $slugable = Good::findOne( ['slug' => $paramsQuery[0]] );
        if ( $slugable instanceof Good ) {
            return ['category/good-view', ['id' => $slugable->id]];
        }

        return false;
    }
}
