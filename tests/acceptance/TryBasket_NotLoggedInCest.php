<?php 

class TryBasket_NotLoggedInCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->wantto('add to basket without loging in');
        $I->amonpage('index.php');
        $I->seeInTitle('KONFIGURATOR PC');


        $I->wantto('browse through some motherboards');
        $I->see('płyty główne');
        $I->click(['id' => 'plyty glowne']);
        $I->amOnPage("index.php?value=plytyglowne");
        $I->seeInCurrentUrl('/index.php?value=plytyglowne');

        $I->dontsee('dodaj do koszyka');
        $I->see('Zaloguj sie, aby dodać do koszyka');

        $I->comment("unble to add to cart while not logged in");


    }
}
