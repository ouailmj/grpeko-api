<?php
namespace Page;

class Login
{
    // include url of current page
    public static $URL = '/login';

    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public static $usernameField = '#username';
     * public static $formSubmitButton = "#mainForm input[type=submit]";
     */

    public static $usernameField    = '_username';
    public static $passwordField    = '_password';
    public static $submitButton     = '_submit';

    public static $firstNameField       = 'appbundle_employee[firstName]';
    public static $lastNameField        = 'appbundle_employee[lastName]';
    public static $initialsField        = 'appbundle_employee[initials]';
    public static $phonenbrField        = 'appbundle_employee[phoneNumber]';
    public static $FaxField             = 'appbundle_employee[faxNumber]';
    public static $postalcodeField      = 'appbundle_employee[currentAddress][postalCode]';
    public static $descriptionField     = 'appbundle_employee[currentAddress][description]';
    public static $cityField            = 'appbundle_employee[currentAddress][city]';
    public static $jobPositionField     = 'appbundle_employee[jobPosition]';
    public static $ManagerField         = 'appbundle_employee[manager]';
    public static $birthDateField       = 'appbundle_employee[birthDate]';
    public static $entryDateField       = 'appbundle_employee[entryDate]';
    public static $usernameField_second = 'appbundle_employee[userAccount][username]';
    public static $emailField           = 'appbundle_employee[userAccount][email]';
    public static $passwordField_first  = 'appbundle_employee[userAccount][password][first]';
    public static $passwordField_second = 'appbundle_employee[userAccount][password][second]';
    public static $submit               = 'form button[type=submit]';



    public static $firstName = 'first nametest';
    public static $lastName  = 'lastNameTestAdmin';
    public static $entryDay   = '23/23/2018';
    public static $initials      = 'ZER';
    public static $phoneNumber = '0131232';
    public static $faxNumber     = '0123123';
    public static $fixeNumber        = '123456789';
    public static $birthDate       = '1996-08-10';
    public static $postalCode   = '123312';
    public static $description      = '2AZEAZE AZEAZ';
    public static $city = 'AZEZRE';
    public static $jobPosition     = 'Collaborateur';
    public static $manager        = '12';
    public static $username       = 'AZEAZEaze';
    public static $email   = 'testuser@gmail.com';
    public static $password_first      = '123';
    public static $password_second = '123';

    /**
     * Basic route example for your current URL
     * You can append any additional parameter to URL
     * and use it in tests like: Page\Edit::route('/123-post');
     */
    public static function route($param)
    {
        return static::$URL.$param;
    }


}
