<?php
$I = new FunctionalTester($scenario);
$I->am('admin');
$I->wantTo('Create a question');

Auth::loginUsingId(1);

//Give the records of the questionnaire
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

// Get the record to check the actions against
$questionnaire = $I->grabRecord('questionnaires', [
    'title' => 'Test Questionnaire'
]);

// Set the page to the questionnaires page
$I->amOnPage('/admin/questionnaires');
$I->see('Test Questionnaire');
$I->see('Edit', [
    'name' => 'edit' . $questionnaire->id
]);

// Go to the edit page
$I->click('Edit', [
    'name' => 'edit' . $questionnaire->id
]);

// Make sure we are looking a the correct questionnaire
$I->seeCurrentUrlEquals('/admin/questionnaires/' . $questionnaire->id . '/edit');

// See if we can look at the questions
$I->see('Questions', 'a');
$I->click('Questions', 'a');

// There should be no questions
$I->see('You haven\'t created any questions yet!');
$I->see('Create Question', 'a');

// The first question will be a string
$I->click('Create Question', 'a');
$I->seeCurrentUrlEquals('/admin/questions/create/' . $questionnaire->id);

$I->see('Create Question', 'h1');

// Create the question
$I->submitForm('#createquestion', [
    'question' => 'Question 1?',
    'type' => 1
]);

$I->seeCurrentUrlEquals('/admin/questionnaires/' . $questionnaire->id . '/edit');

// See if that question can be seen
$I->see('Questions', 'a');
$I->click('Questions', 'a');
$I->see('Question 1?');

//create question 2 which is a paragraph
$I->see('Create Question', 'a');
$I->click('Create Question', 'a');

// check the url
$I->seeCurrentUrlEquals('/admin/questions/create/' . $questionnaire->id);

$I->see('Create Question', 'h1');

// Create the question
$I->submitForm('#createquestion', [
    'question' => 'Question two?',
    'type' => 2
]);

$I->seeCurrentUrlEquals('/admin/questionnaires/' . $questionnaire->id . '/edit');

// See if that question can be seen
$I->see('Questions', 'a');
$I->click('Questions', 'a');
$I->see('Question 1?');
$I->see('Question two?');

//create question 3 which is a paragraph
$I->see('Create Question', 'a');
$I->click('Create Question', 'a');

// check the url
$I->seeCurrentUrlEquals('/admin/questions/create/' . $questionnaire->id);

$I->see('Create Question', 'h1');

// Create the question
$I->submitForm('#createquestion', [
    'question' => 'Question three?',
    'type' => 3
]);

// The options and scales all have a new form the user has to add to
$I->seeCurrentUrlEquals('/admin/questions');
$I->see('Create Question', 'h1');

$I->click('Create Question');

$question3 = $I->grabRecord('questions', [
    'question' => 'Question three?',
    'questionnaire' => $questionnaire->id
]);


$I->seeCurrentUrlEquals('/admin/questions/' . $question3->id . '/edit');
$I->see('Edit - Question three?', 'h1');
$I->see('Options', 'h2');

$I->amOnPage('/admin/questionnaires/' . $questionnaire->id . '/edit');

// See if that question can be seen
$I->see('Questions', 'a');
$I->click('Questions', 'a');
$I->see('Question 1?');
$I->see('Question two?');
$I->see('Question three?');

//create question 4

$I->see('Create Question', 'a');
$I->click('Create Question', 'a');

// check the url
$I->seeCurrentUrlEquals('/admin/questions/create/' . $questionnaire->id);

$I->see('Create Question', 'h1');

// Create the question
$I->submitForm('#createquestion', [
    'question' => 'Question 4?',
    'type' => 4
]);

// The options and scales all have a new form the user has to add to
$I->seeCurrentUrlEquals('/admin/questions');
$I->see('Create Question', 'h1');

$I->submitForm('#createquestion', [
    'layout' => 1
]);

$question4 = $I->grabRecord('questions', [
    'question' => 'Question 4?',
    'questionnaire' => $questionnaire->id
]);


$I->seeCurrentUrlEquals('/admin/questions/' . $question4->id . '/edit');
$I->see('Edit - Question 4?', 'h1');
$I->see('Scale', 'h2');

$I->amOnPage('/admin/questionnaires/' . $questionnaire->id . '/edit');

// See if that question can be seen
$I->see('Questions', 'a');
$I->click('Questions', 'a');
$I->see('Question 1?');
$I->see('Question two?');
$I->see('Question three?');
$I->see('Question 4?');


//This test is complete
