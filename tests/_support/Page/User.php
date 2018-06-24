<?php
/**
 * Created by alfa.
 * Date: 23/02/18
 * Time: 18:25
 */

namespace Page;


 class User
{
    // include url of current page
    public static $URL = '/admin/user';

    public  static $role = ['Utilisateur','Administrateur'];

     public static $firstName_user  = 'first name test';
     public static $lastName_user   = 'last name test';
     public static $email_user      = 'testuser@gmail.com';

     public static $firstName_admin = 'firstNameTestAdmin';
     public static $lastName_admin  = 'lastNameTestAdmin';
     public static $email_admin     = 'testuserAdmin@gmail.com';

     public static $password        = '123456789';
     public static $birthDate       = '1996-08-10';


     public static $firstNameField       = "input[name='appbundle_user[firstName]']";
     public static $lastNameField        = 'appbundle_user[lastName]';
     public static $emailField_first     = 'appbundle_user[email][first]';
     public static $emailField_second    = 'appbundle_user[email][second]';
     public static $passwordField_first  = 'appbundle_user[new_password][first]';
     public static $passwordField_second = 'appbundle_user[new_password][second]';
     public static $birthDateField       = 'appbundle_user[birthDate]';
     public static $roleUser             = 'appbundle_user[roles]';
     public static $submit               = 'form button[type=submit]';
     public static $submit_delete        = 'form a[class="btn btn-danger legitRipple"]';



     public static  $link = "a[href='/admin/user/new']";
     public static $link_edit_user = "table.table tbody tr:nth-last-child(1) td:nth-last-child(1) a[title=Modifier]";
     public static $link_edit_admin = "table.table tbody tr:nth-last-child(1) td:nth-last-child(1) a[title=Modifier]";


     public static  $see_1 = "Administration";
     public static  $see_2 = "Création d'utilisateur";
     public static  $see_3 = "Prénom";
     public static  $see_4 = "Les deux emails ne sont pas identiques";
     public static  $see_5 = "user.new.password_invalid";


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
