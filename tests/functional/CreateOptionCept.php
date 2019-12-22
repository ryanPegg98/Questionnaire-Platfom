<?php 
$I = new FunctionalTester($scenario);

$I->am('admin');
$I->wantTo('Create an option for a question');

Auth::loginUsingId(1);

//Add all of the records needed to add an new option
$I->haveRecord('questionnaires', [
    'title' => 'Test Questionnaire',
    'description' => 'This is a test questionnaire',
    'agreement' => 'You are accepting this agreement by clicking the start button',
    'status' => 0,
    'layout' => 1,
    'creator' => 1,
    'slug' => 'test'
]);

//check that the record exists
$I->seeRecord('questionnaires', [
    'title' => 'Test Questionnaire'
]);

// Now get the questionnaire information for future use
$questionnaire = $I->grabRecord('questionnaires', [
    'title' => 'Test Questionnaire'
]);

// Now add the question that has the type of 3 (options)

$I->haveRecord('questions', [
    'question' => 'Test Question',
    'type' => 3,
    'layout' => 1,
    'creator' => 1,
    'questionnaire' => $questionnaire->id
]);

//Check that it has been added
$I->seeRecord('questions', [
    'question' => 'Test Question'
]);


// Get the record for future reference
$question = $I->grabRecord('questions', [
    'question' => 'Test Question'
]);

$I->amOnPage('/admin/questionnaires');
$I->see('Questionnaires', 'h1');
$I->see('Test Questionnaire');
$I->see('Edit', [
    'name' => 'edit' . $questionnaire->id
]);
$I->click('Edit', [
    'name' => 'edit' . $questionnaire->id
]);

$I->seeCurrentUrlEquals('/admin/questionnaires/' . $questionnaire->id . '/edit');

$I->amGoingTo('Edit the question');

$I->see('Questions', 'a');
$I->click('Questions', 'a');
$I->see('Test Question');

$I->see('Edit', [
    'name' => 'qedit' . $question->id
]);
$I->click('Edit', [
    'name' => 'qedit' . $question->id
]);

$I->seeCurrentUrlEquals('/admin/questions/' . $question->id . '/edit');
$I->see('Edit - Test Question', 'h1');
$I->see('Options', 'h2');
$I->see('You have not created any options for this question!', 'p');
//$I->see('Create Option', 'input');

$I->amGoingTo('Create three options for this question');
$I->submitForm('#createoption', [
    'option' => 'Option 1'
]);

$I->seeCurrentUrlEquals('/admin/questions/' . $question->id . '/edit');
$I->see('"Option 1" has been added!');

$I->amGoingTo('Create three options for this question');
$I->submitForm('#createoption', [
    'option' => 'Option 2'
]);

$I->seeCurrentUrlEquals('/admin/questions/' . $question->id . '/edit');
$I->see('"Option 2" has been added!');

$I->amGoingTo('Create three options for this question');
$I->submitForm('#createoption', [
    'option' => 'Option 3'
]);

$I->seeCurrentUrlEquals('/admin/questions/' . $question->id . '/edit');
$I->see('"Option 3" has been added!');

$I->see('Option 1', 'td');
$I->see('Option 2', 'td');
$I->see('Option 3', 'td');

//test has been finished




