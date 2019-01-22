<?php 

class LoginCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {

        $I->amonpage('/php_2018_konfigurator_pc/public/index.php');
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


        $imie = "John";
        $nazwisko = "Doe";
        $adres = "NY city";
        $telefon = "534234321";
        $email = "john.doe@example.com";
        $login = "THEjohn";
        $haslo = "john123";

        $I->fillField("firstname",$imie);
        $I->fillField("lastname", $nazwisko);
        $I->fillField("address", $adres);
        $I->fillField("phone", $telefon);
        $I->fillField("email", $email);
        $I->fillField("login", $login);
        $I->fillField("password", $haslo);


        $I->dontSeeInDatabase("users", ["login" => "$login"]);

        $I->click('Zarejestruj');


        //$I->SeeInDatabase("users", ["id" => ""]);

        $I->amonpage('http://127.0.0.1/php_2018_konfigurator_pc/public/customer.php');

        $I->wantto('logout me-self');
        $I->see("Wyloguj");
        $I->click("Wyloguj");

        $I->amonpage('/php_2018_konfigurator_pc/public/index.php');
        $I->seelink('Zarejestruj się');



    }
}
