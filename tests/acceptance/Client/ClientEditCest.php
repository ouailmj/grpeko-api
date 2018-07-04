<?php

use Step\Acceptance\Login;
use Tests\_support\Page\Client\Client as Clientedit;
use Tests\_support\Page\Client\Client as Clientadd;
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
        $I->amOnPage(Clientedit::$UrlListCLient);
        $I->click(Clientedit::$buttoneditclient);
        $I->amOnPage(Clientedit::$UrlEdit);
    }
}