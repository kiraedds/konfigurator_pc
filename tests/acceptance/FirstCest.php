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
        $I->amOnPage("index.php");
        $I->seeInTitle('KONFIGURATOR PC');

        $I->wantTo("have default database when visiting homepage");
        $I->seeNumRecords(4, "users");

        $I->wantTo("use homepage link");
        $I->see('Strona główna');
        $I->click('Strona główna');

        $I->wantto('look around');
        $I->see('na skróty');
        $I->see('płyty główne');
        $I->see('procesory');
        $I->see('karty graficzne');
        $I->see('pamięć ram');
        $I->see('zasilacze');
        $I->see('obudowy');
        $I->see('dyski');
        $I->see('chłodzenie');
        $I->see('rejestracja');


        $I->wantto('send a question');
        $email = "email@gmail.com";
        $subject = "subject";
        $massage = "massage about a subject";
        $I->fillField("email",$email);
        $I->fillField("subject", $subject);
        $I->fillField("massage", $massage);
        $I->click('Wyślij');
        $I->see("Twoja wiadomość została poprawnie wysłana. 
Postaramy sie odpowiedzieć jak najszybciej.");
        








        //KONFIGURATOR PC Menu Płyty główne Procesory Karty graficzne Ram Zasilacze Obudowy Dyski SSD Chłodzenie Strona główna Zarejestruj się





    }
}

