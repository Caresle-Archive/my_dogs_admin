<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use App\Models\DogBreed;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DogsBreedController extends Controller
{
    public function index(Request $request) {
        $dogs_breeds = DogBreed::paginate(10);

        return inertia('DogsBreed/DogsBreed', [
            'data' => $dogs_breeds,
        ]);
    }

    public function create() {
        return inertia('DogsBreed/DogsBreedForm');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|min:5|max:255|unique:dog_types,name',
        ]);

        DogBreed::create(['name' => $request->name]);

        return to_route('dogs_breed.index')->with('message', 'Dog type created successfully');
    }

    public function edit(string $id) {
        $dog_breed = DogBreed::find($id);

        return inertia('DogsBreed/DogsBreedForm', [
            'isEdit' => true,
            'dogBreed' => $dog_breed,
        ]);
    }

    public function update(Request $request, string $id) {
        $request->validate([
            'name' => [
                'required',
                'string',
                'min:5',
                'max:255',
                Rule::unique('dog_breeds', 'name')->ignore($id),
            ],
        ]);

        DogBreed::find($id)->update(['name' => $request->name]);

        return to_route('dogs_breed.index')->with('message_info', 'Dog type updated successfully');
    }

    public function destroy(string $id) {
        $valid = Dog::where('id_dog_breed', '=', $id)->count();

        if ($valid >= 1)
            return back()->withErrors(['general' => "You can't delete a dog type that is being in use"]);

        DogBreed::find($id)->delete();

        return to_route('dogs_breed.index')->with('message', 'Dog type deleted successfully');
    }
}
