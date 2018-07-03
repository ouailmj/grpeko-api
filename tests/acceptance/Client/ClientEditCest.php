<?php

use Step\Acceptance\Login;
use Tests\_support\Page\Client\Client as Clientedit;
class ClientEditCest
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
        $I->amOnPage(Clientedit::$UrlEdit);

        $I->fillField(Clientedit::$legalNameField,  Clientedit::$legalName);
        $I->selectoption(Clientedit::$legalFormField,Clientedit::$legalForm);
        $I->selectoption(Clientedit::$taxationRegimeField ,Clientedit::$taxationRegime);
        $I->selectoption(Clientedit::$vatSystemField,Clientedit::$vatSystem);
        $I->selectoption(Clientedit::$apeCodeField,Clientedit::$apeCode);
        $I->fillField(Clientedit::$mainActivityField, Clientedit::$mainActivity);
        $I->fillField(Clientedit::$siretNumberField, Clientedit::$siretNumber);
        $I->fillField(Clientedit::$sirenNumberField, Clientedit::$sirenNumber);
        $I->fillField(Clientedit::$intraCommunityVATField, Clientedit::$intraCommunityVAT);
        $I->fillField(Clientedit::$nbActionsField, Clientedit::$nbActions);
        $I->fillField(Clientedit::$capitalSocialField, Clientedit::$capitalSocial);
        $I->fillField(Clientedit::$currentAddress_adressField , Clientedit::$currentAddress_adress);
        $I->fillField(Clientedit::$currentAddress_postalCodeField , Clientedit::$currentAddress_postalCode);
        $I->fillField(Clientedit::$currentAddress_cityField , Clientedit::$currentAddress_city);
        $I->fillField(Clientedit::$formerAccountant_nameField, Clientedit::$formerAccountant_name);

        $I->click(Clientedit::$submitButton);
        $I->see(Clientedit::$successmessage );

    }
}