<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use App\Models\DogType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DogsTypeController extends Controller
{
    public function index(Request $request) {
        $dogs_types = DogType::paginate(10);

        return inertia('DogsType/DogsType', [
            'data' => $dogs_types,
        ]);
    }

    public function create() {
        return inertia('DogsType/DogsTypeForm');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|min:5|max:255|unique:dog_types,name',
        ]);

        DogType::create(['name' => $request->name]);

        return to_route('dogs_type.index');
    }

    public function edit(string $id) {
        $dog_type = DogType::find($id);

        return inertia('DogsType/DogsTypeForm', [
            'isEdit' => true,
            'dogType' => $dog_type,
        ]);
    }

    public function update(Request $request, string $id) {
        $request->validate([
            'name' => [
                'required',
                'string',
                'min:5',
                'max:255',
                Rule::unique('dog_types', 'name')->ignore($id),
            ],
        ]);

        DogType::find($id)->update(['name' => $request->name]);

        return to_route('dogs_type.index');
    }

    public function destroy(string $id) {
        $valid = Dog::where('id_dog_type', '=', $id)->count();

        if ($valid >= 1)
            return back()->withErrors(['general' => "You can't delete a dog type that is being in use"]);

        DogType::find($id)->delete();

        return to_route('dogs_type.index');
    }
}
