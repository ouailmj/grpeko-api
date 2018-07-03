<?php

use Step\Acceptance\Login;
use Tests\_support\Page\Client\Client as ClientList;

class ClientListCest
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
        $I->amOnPage(ClientList::$UrlAdd);

        $I->fillField(ClientList::$legalNameField, ClientList::$legalName);
        $I->selectoption(ClientList::$legalFormField,ClientList::$legalForm);
        $I->selectoption(ClientList::$taxationRegimeField ,ClientList::$taxationRegime);
        $I->selectoption(ClientList::$vatSystemField,ClientList::$vatSystem);
        $I->selectoption(ClientList::$apeCodeField,ClientList::$apeCode);
        $I->fillField(ClientList::$mainActivityField, ClientList::$mainActivity);
        $I->fillField(ClientList::$siretNumberField, ClientList::$siretNumber);
        $I->fillField(ClientList::$sirenNumberField, ClientList::$sirenNumber);
        $I->fillField(ClientList::$intraCommunityVATField, ClientList::$intraCommunityVAT);
        $I->fillField(ClientList::$nbActionsField, ClientList::$nbActions);
        $I->fillField(ClientList::$capitalSocialField, ClientList::$capitalSocial);
        $I->fillField(ClientList::$currentAddress_adressField , ClientList::$currentAddress_adress);
        $I->fillField(ClientList::$currentAddress_postalCodeField , ClientList::$currentAddress_postalCode);
        $I->fillField(ClientList::$currentAddress_cityField , ClientList::$currentAddress_city);
        $I->fillField(ClientList::$formerAccountant_nameField, ClientList::$formerAccountant_name);
        $I->click(ClientList::$navigatelistclient);
        $I->seeCurrentUrlEquals(ClientList::$UrlListCLient);
        $I->see(ClientList::$clientAddedvalue);
    }
}