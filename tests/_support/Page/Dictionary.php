<?php
/**
 * Created by PhpStorm.
 * User: alfa
 * Date: 23/02/18
 * Time: 18:25
 */

namespace Page;


 class Dictionary
{
    // include url of current page
    public static $URL = '/admin/dictionary';


    //links
    public static $link_to_traduire="table.table tbody tr:nth-child(1) td:nth-last-child(1) a.btn-info";


    //element to see
    public static $message_succes='Votre opération a été exécutée avec succès';

//inputs attribute name elements for form edit 
    public static $nameField="appbundle_skill[name]";
    public static $descriptionField="appbundle_skill[description]";
    public static $colorField="appbundle_skill[color]";
    public static $btn_submit="form button[type=submit]";

     //create form field content
    public static $name="test name";
    public static $description="test description";
    public static $color="#00ff00";



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
