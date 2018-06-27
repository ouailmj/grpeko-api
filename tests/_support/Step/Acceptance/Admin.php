<?php
namespace Step\Acceptance;

use Page\Login as LoginPage;

class Admin extends \AcceptanceTester
{


    public function loginAsAdmin($username = 'admin', $password = 'f%/R4Uk#](wUvM\'V')
    {
        $I = $this;

        // logging in
        $I->amOnPage(LoginPage::$URL);

        $I->fillField(LoginPage::$usernameField, $username);
        $I->fillField(LoginPage::$passwordField, $password);
        $I->click(LoginPage::$submitButton);
        $I->see($username);
        $I->see('Dashboard');
    }

    public function loginAsUser($username = '', $password = '')
    {
        $I = $this;

        // logging in
        $I->amOnPage(LoginPage::$URL);

        $I->fillField(LoginPage::$usernameField, $username);
        $I->fillField(LoginPage::$passwordField, $password);
        $I->click(LoginPage::$submitButton);
        $I->see($username);

    }
}
