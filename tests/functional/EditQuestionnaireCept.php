<?php 
$I = new FunctionalTester($scenario);

$I->am('admin');
$I->wantTo('Edit a questionnaire and a question');

//Log the user in as an admin
Auth::loginUsingId(1);

//Give the records of the questionnaire
$I->haveRecord('questionnaires', [
    'title' => 'Test Questionnare',
    'description' => 'This is just a description',
    'agreement' => 'This is the agreement',
    'status' => 0,
    'layout' => 1,
    'creator' => 1
]);

$I->seeRecord('questionnaires', [
    'title' => 'Test Questionnare'
]);



//get the record we created
$questionnaire = $I->grabRecord('questionnaires', [
    'title' => 'Test Questionnare'
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



// Check the page to see the correct data
$I->amOnPage('/admin/questionnaires');
$I->see('Questionnaires', 'h1');
$I->see('Test Questionnare');
$I->dontSee('Test Questionnaire');

// Look for the link to the edit page
$I->see('Edit', ['name' => 'edit' . $questionnaire->id]);
$I->click('Edit', ['name' => 'edit' . $questionnaire->id]);

// Check the current URL is equal to
$I->seeCurrentUrlEquals('/admin/questionnaires/' . $questionnaire->id . '/edit');
$I->see('Edit - ' . $questionnaire->title, 'h1');
$I->see('Questions', 'a');
$I->click('Questions', 'a');

// Look for the question that will be changed
$I->see('Question 1?');
$I->dontSee('Question one?');
$I->see('Edit', ['name' => 'qedit' . $question->id]);
$I->click('Edit', ['name' => 'qedit' . $question->id]);

//See if the user is in the url
$I->seeCurrentUrlEquals('/admin/questions/' . $question->id . '/edit');
$I->see('Edit - ' . $question->question, 'h1');

$I->fillField('question', 'Question one?');
$I->click('Update Question');

//Check that the data has been updated
$I->seeRecord('questions', [
   'question' => 'Question one?'
]);

// check that the user is back on the questionnaire page
$I->seeCurrentUrlEquals('/admin/questionnaires/' . $questionnaire->id . '/edit');
$I->see('Questions', 'a');
$I->click('Questions', 'a');

$I->see('Question one?');
$I->dontSee('Question 1?');

//Go back to the details and change the title
$I->see('Details', 'a');
$I->click('Details', 'a');

//Look for the name
$I->see('Edit - Test Questionnare', 'h1');
$I->dontSee('Edit - test Questionnaire', 'h1');

$I->fillField('title', 'Test Questionnaire');
$I->click('Update Questionnaire');

//Check to see if the data has been updated
$I->seeRecord('questionnaires', [
    'title' => 'Test Questionnaire'
]);

// Make sure they have been redirected back to the questionnaire page
$I->seeCurrentUrlEquals('/admin/questionnaires/' . $questionnaire->id . '/edit');

//Check to see if the data is being displayed
$I->see('Edit - Test Questionnaire', 'h1');

//End of test