<?php

namespace App\Http\Controllers;

use App\Http\Requests\Owner\CreateRequest;
use App\Http\Requests\Owner\EditRequest;
use App\Models\Owner;
use App\Models\PhonePrefix;
use App\Models\User;
use App\Repositories\BaseEloquentRepository;
use Illuminate\Http\Request;
use App\Http\Requests\Owner\ConfirmDeleteRequest;

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
        $builder = $this->repo->withRelations(['phonePrefixes']);

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
                ->with('message', 'El Propietario <b>' . e($owner->fullName) . '</b> fue creado con éxito.')
                ->with('type', 'success');
        } catch(\Exception $e) {
            return redirect()
                ->route('owners.index')
                ->with('message', 'Ocurrió un error al grabar la información. Por favor, probá de nuevo en un rato. Si el problema persiste, comunicate con nosotros.' . $e->getMessage())
                ->with('type', 'error')
                ->withInput();
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
        return view('owners.edit-form', [
            'owner' => $this->repo->findOrFailWithRelations($id, ['phonePrefixes']),
            'phonePrefixes' => PhonePrefix::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function processUpdate(EditRequest $request, string $id)
    {
        $data = $request->except(['_token']);

        try {
            $owner = $this->repo->update($id, $data);

            if ($request->user()->cannot('update', $owner)) {
                return redirect()
                    ->route('owners.index')
                    ->with('message', 'Solo el administrador puede editar un Propietario.')
                    ->with('type', 'error');
            }

            return redirect()
                ->route('owners.index')
                ->withInput()
                ->with('message', 'El Propietario <b>' . e($owner->fullName) . '</b> fue editado con éxito.')
                ->with('type', 'success');
        } catch(\Exception $e) {
            return redirect()
                ->route('owners.index')
                ->with('message', 'Ocurrió un error al editar la información. Por favor, probá de nuevo en un rato. Si el problema persiste, comunicate con nosotros.' . $e->getMessage())
                ->with('type', 'error')
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        // TODO: traerlo con las propiedades.
        return view('security.confirm-delete', [
            'model' => $this->repo->findOrFail($id),
        ]);
    }

    public function confirmDelete(ConfirmDeleteRequest $request, string $id)
    {
        $owner = $this->repo->findOrFail($id);

        if ($request->user()->cannot('delete', $owner)) {
            return redirect()
                ->route('owners.index')
                ->with('message', 'Solo el administrador puede eliminar un Propietario.')
                ->with('type', 'error');
        }

        if ((int) $request->input('dni') !== $owner->dni) {
            return back()
                ->with('message', 'El DNI no coincide con el Propietario que querés eliminar.')
                ->with('type', 'error')
                ->withInput();
        }

        try {
            $this->repo->delete($id);

            return redirect()
                ->route('owners.index')
                ->withInput()
                ->with('message', 'El Propietario fue eliminado con éxito.')
                ->with('type', 'success');
        } catch(\Exception $e) {
            return redirect()
                ->route('owners.index')
                ->with('message', 'Ocurrió un error al eliminar la información. Por favor, probá de nuevo en un rato. Si el problema persiste, comunicate con nosotros.' . $e->getMessage())
                ->with('type', 'error');
        }
    }
}
