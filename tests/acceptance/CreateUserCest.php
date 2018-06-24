<?php

class CreateUserCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function testSomeFeature(AcceptanceTester $I)
    {
        //Ajout d'un User
        $I->amOnPage('/login');
        $I->see('Espace de connexion');
        $I->fillField('_username', 'admin');
        $I->fillField('_password', "f%/R4Uk#](wUvM'V");
        $I->click('_submit');
        $I->see('Dashboard');
        $I->amOnPage('/app/employee');
        $I->click('Ajouter');

        $I->amOnPage('/app/employee/new');
        $I->see('Employee creation');
        $I->fillField( 'appbundle_employee[firstName]',"riad");
        $I->fillField( 'appbundle_employee[lastName]',"Tarik");
        $I->fillField( 'appbundle_employee[birthDate]',"23/23/2018");
        $I->fillField( 'appbundle_employee[entryDate]',"23/23/2018");
        $I->fillField( 'appbundle_employee[initials]',"KAZ");
        $I->fillField( 'appbundle_employee[phoneNumber]',"0656602633");
        $I->fillField( 'appbundle_employee[faxNumber]',"0656602633");
        $I->fillField( 'appbundle_employee[FixeNumber]',"0656602633");
        $I->fillField( 'appbundle_employee[currentAddress][postalCode]',"400000");
        $I->fillField( 'appbundle_employee[currentAddress][description]',"sfsd okpoz noakzo pop");
        $I->fillField( 'appbundle_employee[currentAddress][city]',"Marrakech");
        $I->selectOption( 'appbundle_employee[jobPosition]',"Collaborateur");
        $I->selectOption( 'appbundle_employee[manager]',"1");
        $I->fillField('appbundle_employee[userAccount][username]','tarik.riad');
        $I->fillField('appbundle_employee[userAccount][email]','tarik.riad@gmail.com');
        $I->fillField('appbundle_employee[userAccount][password][first]','123456');
        $I->fillField('appbundle_employee[userAccount][password][second]','123456');
        $I->click('Ajouter');
        $I->amOnPage('/app/employee/$id/show');
        $I->see('employee');
    }
}