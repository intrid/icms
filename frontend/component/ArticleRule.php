<?php

namespace frontend\component;

use \yii\web\UrlRuleInterface;
use yii\helpers\Url;
use common\models\Article;

class ArticleRule implements UrlRuleInterface {

    public function createUrl($manager, $route, $params) {

        if ($route !== 'article/view' || isset($params['id']) === false) { 
            return false; 
        }
        $slug = Article::find() 
        ->select('slug')
        ->where(
            [
                'id' => $params['id'],
            ]
        )
        ->scalar();

        if ($slug !== false) { 
            return 'article/'.$slug; 
        }
        return false; 
    }

    public function parseRequest($manager, $request) {

        if(strpos($request->pathInfo, '/') !== false){
            $paths = explode('/', $request->pathInfo);
            if ($paths[0] == 'article' and count($paths) == 2) {
                $id = Article::find()->select('id')->where(['slug' => $paths[1]])->scalar();
                if (!empty($id)) {
                    return ['article/view', ['id' => $id]];
                }
            }
        }
        return false;
    }

}
