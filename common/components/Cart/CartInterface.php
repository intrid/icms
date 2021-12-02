<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\components\Cart;

/**
 *
 * @author Program INTRID
 */
interface CartInterface {

    public static function isGood($id);
    public static function saveOrder($cart);
}
