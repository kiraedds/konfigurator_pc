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
    }
}
