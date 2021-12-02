<?php

namespace common\components;

use Yii;

class ChangeOrder {

    public function addOrder($id) {
        $session = Yii::$app->session;
        $session['changeOrder'] = ['id' => $id];
    }

    public function getOrder() {
        if ($this->hasOrder()) {
            $session = Yii::$app->session;
            return $session->get('changeOrder')['id'];
        }
        return false;
    }

    public function hasOrder() {
        $session = Yii::$app->session;
        return $session->has('changeOrder');
    }

    public function deleteOrder() {
        if ($this->hasOrder()) {
            $session = Yii::$app->session;
            $session->remove('changeOrder');
        }
        return true;
    }

}
