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
      /*  $I->amOnPage(ClientList::$UrlListCLient);
        $I->click(ClientList::$navigatelistclient);
        $I->seeCurrentUrlEquals(ClientList::$UrlListCLient);
        $I->see(ClientList::$legalForm);*/
    }
}