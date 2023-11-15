<?php

namespace App\Http\Controllers;

use App\Models\KeyComponent;
use App\Models\Robot;
use App\Models\User;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;

class RobotController extends Controller
{
    //GET-ERI
    public function returnAllRobots()
    {
        $robots = Robot::all();

        $robots = $robots->map(function($robot)
        {
            $robot = RobotController::GetCreatorAndComponentName($robot);
            return $robot;
        });

        return $robots;
    }

    public function returnSpecificRobot($robot_id)
    {
        $robot = Robot::find($robot_id);

        if(is_null($robot))
        {
            return response()->json('A robot with the provided ID does not exist in the database', 404);
        }

        $robot = RobotController::GetCreatorAndComponentName($robot);

        return response()->json($robot);
    }

    //SET-ERI
    public function createRobot(Request $request)
    {
        $validatedData = $request->validate
        ([
            'model_name' => 'required|string',
            'nickname' => 'required|string',
            'purpose' => 'required|string',
            'height' => 'required|integer',
            'weight' => 'required|integer',
            'cost' => 'required|integer',
            'creator_id' => 'required|integer',
            'key_component_id' => 'required|integer',
        ]);

        $robot = Robot::create($validatedData);
        return response()->json(['message' => 'Robot created successfully', 'data' => $robot], 201);
    }

    //DELETE-ERI
    public function deleteRobot(Request $request)
    {
        $validatedData = $request->validate(['id' => 'required|integer']);
        Robot::where('id', $validatedData['id'])->delete();

        return response()->json(['message' => 'Robot Deleted successfully'], 201);
    }

    //POMOCNE F-JE
    public function GetCreatorAndComponentName($robot)
    {
        $robotCreator = User::where('id',$robot['creator_id'])->get('name_and_surname');
        $robot['creator'] = $robotCreator[0]['name_and_surname'];
        $robotPart = KeyComponent::where('id',$robot['key_component_id'])->get('component_name');
        $robot['key component'] = $robotPart[0]['component_name'];

        unset($robot['creator_id']);
        unset($robot['key_component_id']);
        return $robot;
    }
}
