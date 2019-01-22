<?php 

class FirstCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {

        $I->wantTo('see homepage');
        $I->amOnPage("/php_2018_konfigurator_pc/public/index.php");
        $I->seeInTitle('KONFIGURATOR PC');

        $I->wantTo("have default database when visiting homepage");
        $I->seeNumRecords(4, "users");

        $I->wantTo("use homepage link");
        $I->see('Strona główna');
        $I->click('Strona główna');






        //KONFIGURATOR PC Menu Płyty główne Procesory Karty graficzne Ram Zasilacze Obudowy Dyski SSD Chłodzenie Strona główna Zarejestruj się





    }
}

