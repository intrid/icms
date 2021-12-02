<?php

namespace common\components;

use Yii;

class Favorit {

    public function addFavorit($id) {
        $favorit = $this->hasFavorit();
        if (!in_array($id, $favorit)) {
            $favorit[] = $id;
        } else {
            $r = [];
            for ($i = 0; $i < count($favorit); $i++) {
                if ($favorit[$i] != $id) {
                    $r[] = $favorit[$i];
                }
            }
            $favorit = $r;
        }
        $this->addFavoritUsers($favorit);
        $coockiesR = Yii::$app->response->cookies;
        $coockiesR->add(new \yii\web\Cookie(['name' => 'favorit', 'value' => json_encode($favorit)]));
        return $this->getCountFavorit(count($favorit));
    }

    public function getFavorit($models = null) {
        $favorit = $this->hasFavorit();

        if (is_null($models)) {
            return $favorit;
        } else {
            $one = $two = [];
            foreach ($models as $model) {
                if (in_array($model->id, $favorit)) {
                    $one[] = $model;
                } else {
                    $two[] = $model;
                }
            }
            return array_merge($one, $two);
        }
    }

    public function hasFavorit() {
        $coockies = Yii::$app->request->cookies;
        $value = [];
        if ($coockies->has('favorit')) {
            $value = json_decode($coockies->get('favorit')->value, true);
        }
        return $value;
    }

    public function addFavoritUsers($array) {
        if (!Yii::$app->user->isGuest) {
            $user = Yii::$app->user->identity;
            $user->favorit = json_encode($array);
            $user->save();
        }
    }

    public function getFavoritUsers() {
        if (!Yii::$app->user->isGuest) {
            $user = Yii::$app->user->identity;
            $array = json_decode($user->favorit, true);
            if (!empty($array)) {
                foreach ($array as $value) {
                    $this->addFavorit($value);
                }
            }
        }
    }

    public function getCountFavorit($count = null) {
        if (is_null($count)) {
            $count = count($this->getFavorit());
        }
        return $count == 0 ? ' пусто' : $count;
    }

}
