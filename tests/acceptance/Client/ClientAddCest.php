<?php

use Step\Acceptance\Login;
use Tests\_support\Page\Client\Client as Clientadd;

class ClientAddCest
{

    public function _before(Login $I)
    {
        $I->loginAsAdmin();
    }

    public function _after(Login $I)
    {

    }

    public function tryToTest(Login $I)
    {
        $I->amOnPage(Clientadd::$UrlAdd);

        $I->fillField(Clientadd::$legalNameField, Clientadd::$legalName);
        $I->selectoption(Clientadd::$legalFormField,Clientadd::$legalForm);
        $I->selectoption(Clientadd::$taxationRegimeField ,Clientadd::$taxationRegime);
        $I->selectoption(Clientadd::$vatSystemField,Clientadd::$vatSystem);
        $I->selectoption(Clientadd::$apeCodeField,Clientadd::$apeCode);
        $I->fillField(Clientadd::$mainActivityField, Clientadd::$mainActivity);
        $I->fillField(Clientadd::$siretNumberField, Clientadd::$siretNumber);
        $I->fillField(Clientadd::$sirenNumberField, Clientadd::$sirenNumber);
        $I->fillField(Clientadd::$intraCommunityVATField, Clientadd::$intraCommunityVAT);
        $I->fillField(Clientadd::$nbActionsField, Clientadd::$nbActions);
        $I->fillField(Clientadd::$capitalSocialField, Clientadd::$capitalSocial);
        $I->fillField(Clientadd::$currentAddress_adressField , Clientadd::$currentAddress_adress);
        $I->fillField(Clientadd::$currentAddress_postalCodeField , Clientadd::$currentAddress_postalCode);
        $I->fillField(Clientadd::$currentAddress_cityField , Clientadd::$currentAddress_city);
        $I->fillField(Clientadd::$formerAccountant_nameField, Clientadd::$formerAccountant_name);

        $I->click(Clientadd::$submitButton);

        $I->see("FatalThrowableError" );
    }
}
























