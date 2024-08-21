<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Repositories\BaseEloquentRepository;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public BaseEloquentRepository $repo;

    public function __construct()
    {
        $this->repo = new BaseEloquentRepository(Property::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $builder = $this->repo->withRelations(['owner', 'propertyType']);

        $properties = $builder->paginate(1);

        return view('properties.index', [
            'properties' => $properties,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}