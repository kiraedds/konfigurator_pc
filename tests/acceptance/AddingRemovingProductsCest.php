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
        $I->amOnPage("customer.php?value=plytyglowne");
        $I->seeInCurrentUrl('/customer.php?value=plytyglowne');
        $I->see('dodaj do koszyka');
        $I->click('a[href = "customer.php?value=cartAction&action=addToCart&id=60"]');

        $I->see('twój koszyk');
        $I->click('a[href = "customer.php?value=viewCart"]');

        $I->amOnPage("customer.php?value=viewCart");
        $I->see('potwierdź zakupy');
        $I->see('kontunuuj zakupy');
        $I->click('Potwierdź zakupy' , 'a[ href="customer.php?value=checkout"]');
        $I->see('Wyślij zamówienie');
        $I->click('Wyślij zamówienie');
        $I->see('Zamówienie zostało wysłane do realizacji');

        #adding working

        $I->wantto('Remove Product from my basket');
        $I->click('a[href = "customer.php"]');
        $I->seeInTitle('KONFIGURATOR PC');



        $I->see('płyty główne');
        $I->click('płyty główne', 'a[href = "customer.php?value=plytyglowne"]');
        $I->amOnPage("customer.php?value=plytyglowne");
        $I->seeInCurrentUrl('/customer.php?value=plytyglowne');
        $I->see('dodaj do koszyka');
        $I->click('a[href = "customer.php?value=cartAction&action=addToCart&id=60"]');

        $I->see('twój koszyk');
        $I->click('a[href = "customer.php?value=viewCart"]');

        $I->amOnPage("customer.php?value=viewCart");
        $I->see('potwierdź zakupy');
        $I->see('kontunuuj zakupy');

        $I->click('a.btn.btn-danger');


        $I->see('kontunuuj zakupy');
        $I->dontsee('potwierdź zakupy');
        $I->see('Twój koszyk jest pusty...');

        #removing working
    }
}
