<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	$jobs = \App\HardJob::all();
    return view('welcome', ['jobs'=>$jobs]);
});

Route::get('jobs', function(){
	$jobs = \App\HardJob::all();
	return view('list', ['jobs'=>$jobs]);
});

Route::get('addjob', function(){
	$job = new \App\HardJob();
	$job->message = "Prepare";
	$job->percent = 0;
	$job->wait = rand(0, 4);
	$job->step = rand(1, 10);

	$job->save();

	dispatch(new \App\Jobs\JobProcess($job->id));
});