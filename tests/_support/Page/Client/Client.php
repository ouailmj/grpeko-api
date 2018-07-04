<?php
/**
 * Created by PhpStorm.
 * User: nejjarimouad
 * Date: 6/25/18
 * Time: 17:46
 */

namespace Tests\_support\Page\Client;


class Client
{
    public static $UrlAdd ='/app/company/new';
    public static $UrlEdit ='/app/company/edit/$id';
    public static $UrlSUP ='/app/company/$id/delete';
    public static $UrlListCLient ='/app/company/list';

    public static $legalNameField    = 'appbundle_company[legalName]';
    public static $legalFormField      = 'appbundle_company[legalForm]';
    public static $taxationRegimeField = 'appbundle_company[taxationRegime]';

    public static $vatSystemField ='appbundle_company[vatSystem]';
    public static $apeCodeField ='appbundle_company[apeCode]';
    public static $mainActivityField ='appbundle_company[mainActivity]';
    public static $siretNumberField ='appbundle_company[siretNumber]';
    public static $sirenNumberField ='appbundle_company[sirenNumber]';
    public static $intraCommunityVATField ='appbundle_company[intraCommunityVAT]';
    public static $nbActionsField ='appbundle_company[nbActions]';
    public static $capitalSocialField ='appbundle_company[capitalSocial]';

    public static $currentAddress_adressField       = 'appbundle_company[currentAddress][description]';
    public static $currentAddress_postalCodeField       = 'appbundle_company[currentAddress][postalCode]';
    public static $currentAddress_cityField      = 'appbundle_company[currentAddress][city]';
    public static $formerAccountant_nameField       = 'appbundle_company[formerAccountant][name]';

    public static $contactFirstNameField       = 'appbundle_company[contacts][firstname]';
    public static $contactLastNameField       = 'appbundle_company[contacts][lastname]';
    public static $contactEmailField       = 'appbundle_company[contacts][email]';

    public static $legalName    = 'societe33';
    public static $legalForm     = 'SARL';
    public static $taxationRegime     = null;

    public static $vatSystem =null;
    public static $apeCode ='Out of Stock';
    public static $mainActivity ='export/import';
    public static $siretNumber =77;
    public static $sirenNumber =33;
    public static $intraCommunityVAT ='111';
    public static $nbActions ='10';
    public static $capitalSocial ='10000';

    public static $currentAddress_adress      = 'Massira3';
    public static $currentAddress_postalCode      = '40000';
    public static $currentAddress_city     = 'Marrakech';
    public static $formerAccountant_name      = 'messi';

    public static $contactFirstName= 'mouad';
    public static $contactLastName= 'nejjari';
    public static $contactEmail ='@gmail.com';

    public static $submitButton     = 'appbundle_company[Enregistrer]';
    public static $successmessage     = 'Votre opération a été exécutée avec succès';
    public static $navigatelistclient    = 'div.sidebar.sidebar-main > div > div > div > ul > li:nth-child(3) > a';
    public static $clientAddedvalue     = 'SARL';
    public static $ClientListedvalue= 'FIXER UN RENDEZ VOUS';
    public static $buttonsupclient    = 'tr:nth-child(1) td form > button > a';
    public static $buttoneditclient    = 'tr:nth-child(1) td div a[title=Modifier]';


}