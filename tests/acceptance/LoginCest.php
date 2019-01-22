<?php 

class LoginCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->wantto('register myself');
        $I->seelink('Zarejestruj się');
        $I->click('Zarejestruj się');
        $I->see('Rejestracja');
        $I->see('Imię (pełne)');
        $I->see('Nazwisko');
        $I->see('Adres');
        $I->see('Telefon');
        $I->see('E-mail');
        $I->see('Login');
        $I->see('Hasło');


    }
}
