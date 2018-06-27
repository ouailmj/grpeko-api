<?php

namespace Step\Acceptance;


use Tests\_support\Page\Client\Access;

class Login extends \AcceptanceTester
{

    public function loginAsAdmin()
    {
        $I=$this;

        $I->amOnPage(Access::$URL);
        $I->see(Access::$loginpage);

        $I->fillField('_username', Access::$usernameField."fgdfg");
        $I->fillField('_password', Access::$passwordField."sdfsf");
        $I->click(Access::$submitButton);
        $I->see(Access::$errorlogin);

        $I->fillField('_username', Access::$usernameField);
        $I->fillField('_password', Access::$passwordField);
        $I->click(Access::$submitButton);
        $I->see(Access::$successlogin);
    }
}
