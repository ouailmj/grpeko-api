<?php
/**
 * Created by PhpStorm.
 * User: alfa
 * Date: 23/02/18
 * Time: 18:25
 */

namespace Page;


 class Skill
{
    // include url of current page
    public static $URL = '/admin/skill';


    public static $name              = 'appbundle_skill[name]';
    public static $desc              = 'appbundle_skill[description]';
    public static $color             = 'appbundle_skill[color]';
    public static $btn_submit_create = 'form button[type=submit]';
    public static $btn_submit_edit   = '#form button[type=submit]';
    public static $btn_submit_delete = '#formdelete button[type=submit]';
    public static $link_up = 'table.table tbody tr:nth-last-child(2) td:nth-child(2) a[title=Modifier]';
    public static $link = 'table.table tbody tr:first-child td:nth-child(2) a';


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
