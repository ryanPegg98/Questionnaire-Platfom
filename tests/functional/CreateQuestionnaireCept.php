<?php 
$I = new FunctionalTester($scenario);

$I->am('admin');
$I->wantTo('Create Questionnaire');

//Login as an admin
Auth::loginUsingId(1);

// Give database information

//Make sure they are on the questionnaires pages
$I->amOnPage('/admin/questionnaires');
$I->see('Questionnaires', 'h1');
$I->see('Create Questionnaire', 'a');
$I->dontSee('Test Questionnaire');
$I->click('Create Questionnaire');

// User should be on the create page
$I->amOnPage('/admin/questionnaires/create');
$I->see('Create Questionnaire', 'h1');

// Submit the form with the questionnaire
$I->submitForm('#createquestionnaire', [
    'title' => 'Test Questionnaire',
    'description' => 'Questionnaire one for test purposes',
    'agreement' => '',
    'layout' => 1
]);

$questionnaire = $I->grabRecord('questionnaires', ['title' => 'Test Questionnaire']);

// User should be returned to the questionnaires page
$I->seeCurrentUrlEquals('/admin/questionnaires/' . $questionnaire->id . '/edit');
$I->see('Test Questionnaire', 'h1');
$I->see('Questions', 'a');
$I->click('Questions', 'a');
$I->see('Create Question', 'a');
$I->click('Create Question', 'a');

// Make sure the correct page is in
$I->seeCurrentUrlEquals('/admin/questions/create/' . $questionnaire->id);
$I->see('Create Question', 'h1');
$I->submitForm('#createquestion', [
    'question' => 'Question 1?',
    'type' => 1
]);

// Make sure we are back at the questionnaire page
$I->seeCurrentUrlEquals('/admin/questionnaires/' . $questionnaire->id . '/edit');
$I->see('Questions', 'a');
$I->click('Questions', 'a');
$I->see('Question 1?');

