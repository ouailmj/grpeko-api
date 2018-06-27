<?php
/**
 * Created by PhpStorm.
 * User: alfa
 * Date: 23/02/18
 * Time: 18:25
 */

namespace Page;


 class Drill
{
    // include url of current page
    public static $URL = '/admin/drill';


    /**
     * Basic route example for your current URL
     * You can append any additional parameter to URL
     * and use it in tests like: Page\Edit::route('/123');
     * @param $param
     * @return string
     */
    public static function route($param)
    {
        return static::$URL . $param;
    }



}
