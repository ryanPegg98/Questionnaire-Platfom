<?php 
$I = new FunctionalTester($scenario);

$I->am('admin');
$I->wantTo('Delete a Questionnaire');

// Log the test in with the admin account
Auth::loginUsingId(1);

//Now give it data to look for
$I->haveRecord('questionnaires', [
    'title' => 'Test Questionnaire',
    'description' => 'This is just a description',
    'agreement' => 'This is the agreement',
    'status' => 0,
    'layout' => 1,
    'creator' => 1
]);
$I->seeRecord('questionnaires', [
    'title' => 'Test Questionnaire'
]);

//get the record we created
$questionnaire = $I->grabRecord('questionnaires', [
    'title' => 'Test Questionnaire'
]);

//Give a question which is a string

$I->haveRecord('questions', [
    'question' => 'Question 1?',
    'type' => 1,
    'layout' => 0,
    'creator' => 1,
    'questionnaire' => $questionnaire->id
]);

$I->seeRecord('questions', [
    'question' => 'Question 1?'
]);

//get the question that will be changed
$question = $I->grabRecord('questions', [
    'question' => 'Question 1?'
]);

// Look for the questionnaire
$I->amOnPage('/admin/questionnaires');
$I->see('Test Questionnaire');

// Try and find the delete button for the questionnaire
//$I->see(form, [
//    "name" => 'del' . $questionnaire->id
//]);

//Click the button to delete the questionnaire
//$I->click('Delete', [
//    'name' => 'del' . $questionnaire->id
//]);

// Submit the form to delete the questionnaire
$I->submitForm('#del' . $questionnaire->id, []);


//Check that the url is the same
$I->seeCurrentUrlEquals('/admin/questionnaires');
$I->see('Questionnaires', 'h1');

// See if the message has been displayed
$I->see('The questionnaire has been deleted.');

// No longer see the questionnaire
$I->dontSee('Test Questionnaire');
