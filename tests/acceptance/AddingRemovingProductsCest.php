<?php 

class AddingRemovingProductsCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {

        $I->wantto('Add Products to my basket');
        $I->wantTo('see homepage');
        $I->amOnPage("index.php");
        $I->seeInTitle('KONFIGURATOR PC');
        $I->fillField("login",'kowal');
        $I->fillField("password",'kowal');
        $I->click('ZALOGUJ');
        $I->seeInCurrentUrl('/customer');


        $I->see('płyty główne');
        $I->click('płyty główne', 'a[href = "customer.php?value=plytyglowne"]');
        $I->seeInCurrentUrl('/customer.php?value=plytyglowne');
        $I->see('dodaj do koszyka');


    }
}
