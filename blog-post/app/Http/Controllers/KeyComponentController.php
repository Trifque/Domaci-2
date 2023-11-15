<?php

namespace App\Http\Controllers;

use App\Models\KeyComponent;
use App\Models\User;
use Illuminate\Http\Request;

class KeyComponentController extends Controller
{
    //GET-ERI
    public function returnAllComponents()
    {
        $components = KeyComponent::all();

        $components = $components->map(function($component)
        {
            $component = KeyComponentController::GetManufacturerName($component);
            return $component;
        });

        return $components;
    }

    public function returnSpecificComponent($component_id)
    {
        $component = KeyComponent::find($component_id);

        if(is_null($component))
        {
            return response()->json('A component with the provided ID does not exist in the database', 404);
        }

        $component = KeyComponentController::GetManufacturerName($component);

        return response()->json($component);
    }

    //SET-ERI
    public function createKeyComponent(Request $request)
    {
        $validatedData = $request->validate
        ([
            'component_name' => 'required|string',
            'purpose' => 'required|string',
            'size' => 'required|integer',
            'number_of_moving_parts' => 'required|integer',
            'manufacturer_id' => 'required|integer',
        ]);

        $component = KeyComponent::create($validatedData);
        return response()->json(['message' => 'Key component created successfully', 'data' => $component], 201);
    }

    //DELETE-ERI
    public function deleteKeyComponent(Request $request)
    {
        $validatedData = $request->validate(['id' => 'required|integer']);
        KeyComponent::where('id', $validatedData['id'])->delete();

        return response()->json(['message' => 'Key component Deleted successfully'], 201);
    }

    //POMOCNE F-JE
    public function GetManufacturerName($component)
    {
        $componentManufacturer = User::where('id',$component['manufacturer_id'])->get('name_and_surname');
        $component['manufacturer'] = $componentManufacturer[0]['name_and_surname'];

        unset($component['manufacturer_id']);
        return $component;
    }
}
