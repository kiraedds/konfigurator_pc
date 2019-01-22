<?php 

class LoginCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {

        $I->amonpage('index.php');
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
        $login = "THEjohn2";
        $haslo = "john123";

        $I->fillField("firstname",$imie);
        $I->fillField("lastname", $nazwisko);
        $I->fillField("address", $adres);
        $I->fillField("phone", $telefon);
        $I->fillField("email", $email);
        $I->fillField("login2", $login);
        $I->fillField("password2", $haslo);


        $I->dontSeeInDatabase("users", ["login" => "$login"]);

        $I->click('Zarejestruj');


      //  $I->SeeInDatabase("users", ["login" => "$login"]);

        $I->wantto('login myself');
        $I->fillField("login", $login);
        $I->fillField("password", $haslo);

        $I->click('ZALOGUJ');

        $I->amonpage('customer.php');

        $I->wantto('logout me-self');
        $I->see("Wyloguj");
        $I->click("Wyloguj");

        $I->amonpage('index.php');
        $I->seelink('Zarejestruj się');



    }
}
