<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use App\Models\DogType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DogsController extends Controller
{
    public function index(Request $request) {
        return inertia('Dogs/Dogs');
    }

    public function create() {
        $dog_types = DogType::all();
        return inertia('Dogs/DogsForm', [
            'dog_types' => $dog_types,
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|min:5|unique:dogs,name',
            'height' => 'required|numeric|min:1',
            'weight' => 'required|numeric|min:1',
            'dog_type' => 'required|integer|exists:dogs_type,id',
        ]);

        Dog::create([
            'name' => $request->name,
            'dog_type' => $request->dog_type,
            'height' => $request->height,
            'weight' => $request->weight,
        ]);

        return to_route('dogs.index');
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

        return inertia('Dogs/DogsForm', [
            'isEdit' => true,
            'dog' => $dog,
        ]);
    }

    public function update(Request $request, string $id) {
        $request->validate([
            'name' => ['required', 'string', 'min:5', Rule::unique('dogs', 'name')->ignore($id)],
            'height' => 'required|numeric|min:1',
            'weight' => 'required|numeric|min:1',
            'dog_type' => 'required|integer|exists:dogs_type,id',
        ]);

        Dog::where('id', '=', $id)->update([

        ]);
    }

    public function destroy(string $id) {
        Dog::where('id', '=', $id)->delete();
        return to_route('dogs.index');
    }
}
