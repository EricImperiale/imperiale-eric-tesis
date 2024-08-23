<?php

namespace App\Http\Controllers;

use App\Http\Requests\Property\ConfirmDeleteRequest;
use App\Http\Requests\Property\CreateRequest;
use App\Http\Requests\Property\EditRequest;
use App\Models\Owner;
use App\Models\PhonePrefix;
use App\Models\Property;
use App\Models\PropertyType;
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
        return view('properties.create-form', [
           'owners' => Owner::all(['id', 'name', 'last_name', 'dni']),
           'phonePrefixes' => PhonePrefix::all(),
           'propertyTypes' => PropertyType::all(),
        ]);
    }

    public function processCreate(CreateRequest $request)
    {
        $data = $request->except(['_token']);
        
        if ($request->hasFile('image')) {
            $request->file('image')->store('images', 'public');
        }

        try {
            $this->repo->create($data);

            return redirect()
                ->route('properties.index')
                ->withInput()
                ->with('message', 'La Propiedad fue creada con éxito.')
                ->with('type', 'success');
        } catch(\Exception $e) {
            return redirect()
                ->route('properties.index')
                ->with('message', 'Ocurrió un error al grabar la información. Por favor, probá de nuevo en un rato. Si el problema persiste, comunicate con nosotros.' . htmlspecialchars($e->getMessage()))
                ->with('type', 'error')
                ->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('properties.edit-form', [
            'property' => $this->repo->findOrFailWithRelations($id, ['owner', 'propertyType']),
            'owners' => Owner::all(['id', 'name', 'last_name', 'dni']),
            'propertyTypes' => PropertyType::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function processUpdate(EditRequest $request, string $id)
    {
        $data = $request->except(['_token']);

        try {
            $property = $this->repo->update($id, $data);

            if ($request->user()->cannot('update', $property)) {
                return redirect()
                    ->route('properties.index')
                    ->with('message', 'Solo el administrador puede editar una Propiedad.')
                    ->with('type', 'error');
            }

            $this->repo->update($id, $data);

            return redirect()
                ->route('properties.index')
                ->with('message', 'La Propiedad fue editada con éxito.')
                ->with('type', 'success');
        } catch(\Exception $e) {
            return redirect()
                ->route('properties.index')
                ->with('message', 'Ocurrió un error al editar la información. Por favor, probá de nuevo en un rato. Si el problema persiste, comunicate con nosotros.' . htmlspecialchars($e->getMessage()))
                ->with('type', 'error');
        }
    }

   public function delete(string $id)
   {
        $property = $this->repo->findOrFail($id);

        return view('properties.confirm-delete', [
            'property' => $property,
            'titleIsNotFromActors' => true,
            'title' => $property->fullAddress,
        ]);
   }

   public function processDelete(ConfirmDeleteRequest $request, string $id)
   {
       $property = $this->repo->findOrFail($id);

       if ($request->user()->cannot('delete', $property)) {
           return redirect()
               ->route('properties.index')
               ->with('message', 'Solo el administrador puede eliminar una Propiedad.')
               ->with('type', 'error');
       }



       $fullAddress = $property->address . ' ' . $property->address_number;
       if ($request->input('full_address') !== $fullAddress) {
           return back()
               ->with('message', 'La dirección no coincide con la propiedades que querés eliminar.')
               ->with('type', 'error')
               ->withInput();
       }

       // TODO: Validar si tiene contrato activo.

       try {
           $this->repo->delete($id);

           return redirect()
               ->route('properties.index')
               ->withInput()
               ->with('message', 'La propiedad fue eliminada con éxito.')
               ->with('type', 'success');
       } catch(\Exception $e) {
           return redirect()
               ->route('properties.index')
               ->with('message', 'Ocurrió un error al eliminar la información. Por favor, probá de nuevo en un rato. Si el problema persiste, comunicate con nosotros.' . $e->getMessage())
               ->with('type', 'error');
       }
   }
}
