<?php

namespace App\Http\Controllers;

use App\Models\DogType;
use Illuminate\Http\Request;

class DogsTypeController extends Controller
{
    public function index(Request $request) {
        return inertia('DogsType/DogsType');
    }

    public function create() {
        return inertia('DogsType/DogsTypeForm');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|min:5|max:255|unique:dog_types,name',
        ]);

        DogType::create([
            'name' => $request->name,
        ]);

        return to_route('dogs_type.index');
    }

    public function edit(string $id) {
        $dog_type = DogType::find($id);
        dd($dog_type);
    }

    public function update(Request $request, string $id) {}

    public function destroy(string $id) {}
}
