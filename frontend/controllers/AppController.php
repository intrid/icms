<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;

/**
 * Description of AppController
 *
 * @author Program INTRID
 */
class AppController extends Controller {


    public function beforeAction( $action ) {

        if ( ! parent::beforeAction( $action ) ) {
            return $this->redirect('/login');
        }

        /*
            Yii::$app->params['typeHeader'] = 'default';
            Yii::$app->params['actionActive'] = $action->controller->id;

            dd( Yii::$app->params['actionActive'], true );

            if ( $action->id == 'index' 
                and $action->controller->id == 'site'
            ) {

            }

            if ( ( $action->controller->id == 'lk' and ! Yii::$app->user->isGuest and Yii::$app->user->identity->userData->type_user == 2)
                or ( $action->controller->id == 'video-lesson')
            ) {
                Yii::$app->params['typeHeader'] = 'shop';
            }

            Yii::$app->city->initCity();

            if ( ! parent::beforeAction( $action ) ) {
                return false;
            }
        */


        if ( ! isset( Yii::$app->params['menu'] ) ) {
            Yii::$app->params['menu'] = ['controller' => false, 'type' => false];
        }
        
        return true;
    }
}
