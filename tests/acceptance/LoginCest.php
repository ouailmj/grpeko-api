<?php

use Page\Login as LoginPage;

class LoginCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function TestLogin(AcceptanceTester $I,$username = 'admin', $password = 'f%/R4Uk#](wUvM\'V')
    {

        $I->amOnPage(LoginPage::$URL);
        $I->fillField(LoginPage::$usernameField, $username);
        $I->fillField(LoginPage::$passwordField, $password);
        $I->click(LoginPage::$submitButton);
        $I->see('Dashboard');
    }
}
