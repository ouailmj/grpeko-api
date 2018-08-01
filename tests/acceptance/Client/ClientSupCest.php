<?php

use Step\Acceptance\Login;
use Tests\_support\Page\Client\Client as Clientsup;
class ClientSupCest
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
      /*  $I->amOnPage(Clientsup::$UrlListCLient);
        $I->click(Clientsup::$buttonsupclient);
        $I->see(Clientsup::$successmessage);*/
    }
}