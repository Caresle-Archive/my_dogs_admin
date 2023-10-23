<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use App\Models\DogBreed;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DogsController extends Controller
{
    public function index(Request $request) {
        $dogs = Dog::with('dog_breed')->paginate(10);
        $dogs_breeds = DogBreed::all();

        return inertia('Dogs/Dogs', [
            'data' => $dogs,
            'dogsBreeds' => $dogs_breeds,
        ]);
    }

    public function create() {
        $dog_types = DogBreed::all();
        return inertia('Dogs/DogsForm', [
            'dogBreeds' => $dog_types,
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|min:5|unique:dogs,name',
            'height' => 'required|numeric|min:1',
            'weight' => 'required|numeric|min:1',
            'dog_type' => 'required|integer|exists:dog_types,id',
        ]);

        Dog::create([
            'name' => $request->name,
            'id_dog_breed' => $request->dog_type,
            'height' => $request->height,
            'weight' => $request->weight,
        ]);

        return to_route('dogs.index')->with('message', 'Dog Created successfully');
    }

    public function show(string $id) {
        $dog = Dog::where('id', '=', $id)->first();

        return inertia('Dogs/DogsForm', [
            'show' => true,
            'dog' => $dog,
        ]);
    }

    public function edit(string $id) {
        $dog = Dog::where('id', '=', $id)->first();
        $dog_types = DogBreed::all();

        return inertia('Dogs/DogsForm', [
            'isEdit' => true,
            'dogBreeds' => $dog_types,
            'dog' => $dog,
        ]);
    }

    public function update(Request $request, string $id) {
        $request->validate([
            'name' => ['required', 'string', 'min:5', Rule::unique('dogs', 'name')->ignore($id)],
            'height' => 'required|numeric|min:1',
            'weight' => 'required|numeric|min:1',
            'dog_type' => 'required|integer|exists:dog_types,id',
        ]);

        Dog::where('id', '=', $id)->update([
            'name' => $request->name,
            'height' => $request->height,
            'weight' => $request->weight,
            'id_dog_breed' => $request->dog_type,
        ]);

        return to_route('dogs.index')->with('message_info', 'Dog updated');
    }

    public function destroy(string $id) {
        Dog::where('id', '=', $id)->delete();
        return to_route('dogs.index')->with('message', 'Dog deleted');
    }
}
