<?php

namespace frontend\component;

use \yii\web\UrlRuleInterface;
use yii\helpers\Url;
use common\models\Page;

class PageRule implements UrlRuleInterface {

    public function createUrl($manager, $route, $params) {

        if ($route !== 'page/view' || isset($params['id']) === false) {
            return false;
        }
        $slug = Page::find()
                ->select('slug')
                ->where(
                        [
                            'id' => $params['id'],
                        ]
                )
                ->scalar();
        if ($slug !== false) {
            return $slug;
        }
        return false;
    }

    public function parseRequest($manager, $request) {
        $path = $request->pathInfo;
        if (strpos($path, '/') !== false) {
            return false;
        }
        $id = Page::find()->select('id')->where(['slug' => $path])->scalar();

        if (!empty($id)) {
            return ['page/view', ['id' => $id]];
        }
        return false;
    }

}
