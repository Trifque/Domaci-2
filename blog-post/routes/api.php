<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\RobotController;
use App\Http\Controllers\KeyComponentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*SVI GET ZAHTEVI*/

//Users
Route::get('/allUsers',[UserController::class, 'returnAllUsers']);
Route::get('/specificUser/{id}',[UserController::class, 'returnSpecificUser']);

//Robots
Route::get('/allRobots',[RobotController::class, 'returnAllRobots']);
Route::get('/specificRobot/{id}',[RobotController::class, 'returnSpecificRobot']);

//KeyComponents
Route::get('/allComponents',[KeyComponentController::class, 'returnAllComponents']);
Route::get('/specificComponent/{id}',[KeyComponentController::class, 'returnSpecificComponent']);



/*SVI SET ZAHTEVI*/

//Users
Route::post('/createUser', [UserController::class, 'createUser']);

//Robots
Route::post('/createRobot', [RobotController::class, 'createRobot']);

//KeyComponents
Route::post('/createComponent', [KeyComponentController::class, 'createKeyComponent']);


/*SVI DELETE ZAHTEVI*/

//Users


//Robots
Route::delete('/deleteRobot', [RobotController::class, 'deleteRobot']);

//KeyComponents
Route::delete('/deleteComponent', [KeyComponentController::class, 'deleteKeyComponent']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
