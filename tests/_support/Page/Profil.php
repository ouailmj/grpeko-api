<?php


namespace Page;

class Profil{

    // include url of current page
    public static $URL="/auth/profile";


    //elements to see
    public static $profil_title="Profil";
    public static $changePassword_page_title="Mettre à jour le mot de passe";
    public static $confirm_title="Coming Soon";
    public static $username_confirm="Nom d'utilisateur: ";
    public static $email_confirm="Adresse e-mail: ";





    //inputs attribute name elements
    // - for edit profil form
    public static $usernameField="fos_user_profile_form[username]";
    public static $emailField="fos_user_profile_form[email]";
    public static $currentPasswordField="fos_user_profile_form[current_password]";
    public static $firstnameField="fos_user_profile_form[firstName]";
    public static $lastnameField="fos_user_profile_form[lastName]";
    public static $gendreField="fos_user_profile_form[gender]";
    public static $countryField="fos_user_profile_form[country]";
    public static $birthDateField="fos_user_profile_form[birthDate]";
    public static $formOptInField="#fos_user_profile_form_optIn";
    // - for change Password form
    public static $currentPasswordToChangeField="fos_user_change_password_form[current_password]";
    public static $firstPlainPasswordField="fos_user_change_password_form[plainPassword][first]";
    public static $secondPlainPasswordField="fos_user_change_password_form[plainPassword][second]";


    public static $btn_submit="form button[type=submit]";

    // fields content
    // - for edit form
    public static $username="admin@eyegofast.com";
    public static $email="admin@eyegofast.com";
    public static $currentPassword="f%/R4Uk#](wUvM'V";
    public static $firstname="firstName";
    public static $lastname="lastName";
    public static $gendre=array('value' => 'male');
    public static $country=array('value' => 'MA');
    public static $birthDate="13/04/2018";
    // - for change password form
    public static $currentPasswordToChange="f%/R4Uk#](wUvM'V";
    public static $firstPlainPassword="f%/R4Uk#](wUvM'V";
    public static $secondPlainPassword="f%/R4Uk#](wUvM'V";


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