<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 26.08.14
 * Time: 12:10
 */


abstract class AbstractController
{
    public function action($action) {

        $method = $action . 'Action';
        if(method_exists($this, $method )) {
            $this->$method();

        }
    }


}