<?php

use Page\Login as LoginPage;

class CreateUserCest
{
    public function _before(AcceptanceTester $I)
    {

    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function testSomeFeature(AcceptanceTester $I,$username = 'admin', $password = 'f%/R4Uk#](wUvM\'V')
    {
        $I->amOnPage(LoginPage::$URL);
        $I->fillField(LoginPage::$usernameField, $username);
        $I->fillField(LoginPage::$passwordField, $password);
        $I->click(LoginPage::$submitButton);
        $I->see('Dashboard');
        $I->amOnPage('/app/employee');
        $I->click('Ajouter');
        $I->amOnPage('/app/employee/new');
        $I->see('Employee creation');
        $I->fillField( LoginPage::$firstNameField,LoginPage::$firstName);
        $I->fillField( LoginPage::$lastNameField,LoginPage::$lastName);
        $I->fillField( LoginPage::$birthDateField,LoginPage::$birthDate);
        $I->fillField( LoginPage::$entryDateField,LoginPage::$entryDay);
        $I->fillField( LoginPage::$initialsField,LoginPage::$initials);
        $I->fillField( LoginPage::$FixenumbreField,LoginPage::$fixeNumber);
        $I->fillField(LoginPage::$FaxField,LoginPage::$faxNumber);
        $I->fillField( LoginPage::$phonenbrField,LoginPage::$phoneNumber);
        $I->fillField( LoginPage::$postalcodeField,LoginPage::$postalCode);
        $I->fillField( LoginPage::$descriptionField,LoginPage::$description);
        $I->fillField( LoginPage::$cityField,LoginPage::$city);
        $I->selectOption( LoginPage::$jobPositionField,LoginPage::$jobPosition);
        $I->selectOption( LoginPage::$ManagerField,LoginPage::$manager);
        $I->fillField(LoginPage::$usernameField_second,LoginPage::$username);
        $I->fillField(LoginPage::$emailField,LoginPage::$email);
        $I->fillField(LoginPage::$passwordField_first,LoginPage::$password_first);
        $I->fillField(LoginPage::$passwordField_second,LoginPage::$password_second);

    }
}