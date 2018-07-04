<?php

use Step\Acceptance\Login;
use Tests\_support\Page\Client\EntreRelation as ERadd;


class RelationAddCest
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
        $I->click('.sing-up-button > a');
        $I->seeCurrentUrlEquals('/app/employee/');
        $I->click("div.sidebar.sidebar-main > div > div > div > ul > li:nth-child(2) > a");
        $I->seeCurrentUrlEquals('/app/company/list');
        $I->click("div.content-wrapper > div > div > div > div.panel-body > span > a");
        $I->seeCurrentUrlEquals('/app/company/new');
        $I->see("INFORMATIONS GÉNÉRALES");

        $I->click("div.content-group.tab-content-bordered.navbar-component > div > div > ul > li:nth-child(2) > a");



        $I->amOnPage(ERadd::$URLADD);
        $I->selectoption(ERadd::$contributorfield,ERadd::$contributor);
       // $I->selectoption(ERadd::$typemissionfield,ERadd::$typemission);
        $I->selectoption(ERadd::$societe_creerfield,ERadd::$societe_creer);
        $I->fillField(ERadd::$legalNamefield, ERadd::$legalName);
        $I->selectoption(ERadd::$legalFormfield,ERadd::$legalForm);
        $I->fillField(ERadd::$capitalSocialfield, ERadd::$capitalSocial);
        $I->selectoption(ERadd::$integralitefield, ERadd::$integralite);
        $I->fillField(ERadd::$date_creationfield, ERadd::$date_creation);
        $I->fillField(ERadd::$date_cloturefield, ERadd::$date_cloture);
        $I->selectoption(ERadd::$irppfield, ERadd::$irpp);
        $I->selectoption(ERadd::$zonefield, ERadd::$zone);
        $I->fillField(ERadd::$date1text1field, ERadd::$date1text1);
        $I->fillField(ERadd::$date1text2field, ERadd::$date1text2);
        $I->fillField(ERadd::$date1text3field, ERadd::$date1text3);
        $I->fillField(ERadd::$date1text4field, ERadd::$date1text4);
        $I->fillField(ERadd::$date1text5field, ERadd::$date1text5);

        $I->click(ERadd::$submitButtonadd);
        $I->see(ERadd::$successmessage);

*/
    }
}