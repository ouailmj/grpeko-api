<?php

use Step\Acceptance\Login;
use Tests\_support\Page\Client\EntreRelation as ERedit;

class RelationEditCest
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

        /*

        $I->amOnPage(ERedit::$URLEDIT);
        $I->selectoption(ERedit::$contributorfield,ERedit::$contributor);
        $I->selectoption(ERedit::$societe_creerfield,ERedit::$societe_creer);
        $I->fillField(ERedit::$legalNamefield, ERedit::$legalName);
        $I->selectoption(ERedit::$legalFormfield,ERedit::$legalForm);
        $I->fillField(ERedit::$capitalSocialfield, ERedit::$capitalSocial);
        $I->selectoption(ERedit::$integralitefield, ERedit::$integralite);
        $I->fillField(ERedit::$date_creationfield, ERedit::$date_creation);
        $I->fillField(ERedit::$date_cloturefield, ERedit::$date_cloture);
        $I->selectoption(ERedit::$irppfield, ERedit::$irpp);
        $I->selectoption(ERedit::$zonefield, ERedit::$zone);
        $I->fillField(ERedit::$date1text1field, ERedit::$date1text1);
        $I->fillField(ERedit::$date1text2field, ERedit::$date1text2);
        $I->fillField(ERedit::$date1text3field, ERedit::$date1text3);
        $I->fillField(ERedit::$date1text4field, ERedit::$date1text4);
        $I->fillField(ERedit::$date1text5field, ERedit::$date1text5);

        $I->click(ERedit::$submitButtonedit);
        $I->see(ERedit::$successmessage);

        */
    }
}