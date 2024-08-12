<?php

namespace App\Http\Controllers;

use App\Http\Requests\Owner\CreateRequest;
use App\Models\Owner;
use App\Models\PhonePrefix;
use App\Repositories\BaseEloquentRepository;
use Illuminate\Http\Request;
use Mockery\Exception;

class OwnerController extends Controller
{
    public BaseEloquentRepository $repo;

    public function __construct()
    {
        $this->repo = new BaseEloquentRepository(Owner::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $builder = $this->repo->withRelations(['phonePrefix']);

        $owners = $builder->paginate(2);

        return view('owners.index', [
            'owners' => $owners,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('owners.create-form', [
            'phonePrefixes' => PhonePrefix::all(),
        ]);
    }

    public function processCreate(CreateRequest $request)
    {
        $data = $request->except(['_token']);

        try {
            $owner = $this->repo->create($data);

            return redirect()
                ->route('owners.index')
                ->withInput()
                ->with('message', 'El Propietario <b>' . $owner->fullName . '</b> fue creado con éxito.')
                ->with('type', 'success');
        } catch(\Exception $e) {
            return redirect()
                ->route('owners.createForm')
                ->withInput()
                ->with('message', 'Ocurrió un error al grabar la información. Por favor, probá de nuevo en un rato. Si el problema persiste, comunicate con nosotros.')
                ->with('type', 'error');
        }
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
    public function delete(string $id)
    {
        return view('owners.delete-form', [
            'owner' => $this->repo->findOrFailWithRelations($id, ['phonePrefix']),
        ]);
    }
}
