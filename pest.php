<?php

/*
|--------------------------------------------------------------------------
| Pest Configuration
|--------------------------------------------------------------------------
|
| Here you may define all of the "test suites" for your application.
| Each test suite is a collection of test files that are executed together.
| Feel free to add as many test suites as you need to cover all of the
| functionality of your application.
|
*/

use Tests\TestCase;

/*
|--------------------------------------------------------------------------
| Test Suite
|--------------------------------------------------------------------------
|
| The test suite is used to execute tests and configure the test environment.
|
*/

$testCase = new TestCase;

/*
|--------------------------------------------------------------------------
| Global Test Helpers
|--------------------------------------------------------------------------
|
| Here you may define global helper functions that you want to be available
| in all of your tests.
|
*/

// uses(TestCase::class)->in('Feature');
// uses(TestCase::class)->in('Unit');

/*
|--------------------------------------------------------------------------
| Test Files
|--------------------------------------------------------------------------
|
| By default, Pest will load all files in the tests directory. You can
| customize this behavior by defining your own test files below.
|
*/

->in(__DIR__.'/tests');