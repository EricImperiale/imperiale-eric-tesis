<?php

namespace App\Http\Controllers;

use App\Http\Requests\Owner\ConfirmDeleteRequest;
use App\Http\Requests\Tenant\CreateRequest;
use App\Http\Requests\Tenant\EditRequest;
use App\Models\PhonePrefix;
use App\Models\Tenant;
use App\Repositories\BaseEloquentRepository;
use App\Searches\BaseSearches;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public BaseEloquentRepository $repo;

    public function __construct()
    {
        $this->repo = new BaseEloquentRepository(Tenant::class);
    }

    public function index(Request $request)
    {
        $builder = $this->repo->withRelations(['phonePrefixes']);

        $baseSearches = new BaseSearches(
            fullName: $request->query('fn'),
        );

        if ($baseSearches->getFullName()) {
            $builder->where(function ($query) use ($baseSearches) {
                $query
                    ->orWhere('name', 'LIKE', '%' . $baseSearches->getFullName() . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $baseSearches->getFullName() . '%');
            });
        }

        $tenants = $builder->paginate(2);

        return view('tenants.index', [
            'tenants' => $tenants,
            'baseSearches' => $baseSearches,
        ]);
    }

    public function create()
    {
        return view('tenants.create-form', [
            'action' => 'processCreate',
            'route' => 'tenants.processCreate',
            'phonePrefixes' => PhonePrefix::all(),
        ]);
    }

    public function processCreate(CreateRequest $request)
    {
        $data = $request->except(['_token']);

        try {
            $this->repo->create($data);

            return redirect()
                ->route('tenants.index')
                ->withInput()
                ->with('message', 'El Inquilino fue creado con éxito.')
                ->with('type', 'success');
        } catch(\Exception $e) {
            return redirect()
                ->route('tenants.index')
                ->with('message', 'Ocurrió un error al grabar la información. Por favor, probá de nuevo en un rato. Si el problema persiste, comunicate con nosotros.' . htmlspecialchars($e->getMessage()))
                ->with('type', 'error')
                ->withInput();
        }
    }

    public function edit(string $id)
    {
        return view('tenants.edit-form', [
            'tenant' => $this->repo->findOrFailWithRelations($id, ['phonePrefixes']),
            'phonePrefixes' => PhonePrefix::all(),
            'action' => 'processCreate',
            'route' => 'tenants.processCreate',
        ]);
    }

    public function processUpdate(EditRequest $request, string $id)
    {
        $data = $request->except(['_token']);

        try {
            $tenant = $this->repo->update($id, $data);

            if ($request->user()->cannot('update', $tenant)) {
                return redirect()
                    ->route('tenants.index')
                    ->with('message', 'Solo el administrador puede editar un Inquilino.')
                    ->with('type', 'error');
            }

            return redirect()
                ->route('tenants.index')
                ->withInput()
                ->with('message', 'El Inquilino <b>' . e($tenant->fullName) . '</b> fue editado con éxito.')
                ->with('type', 'success');
        } catch(\Exception $e) {
            return redirect()
                ->route('tenants.index')
                ->with('message', 'Ocurrió un error al editar la información. Por favor, probá de nuevo en un rato. Si el problema persiste, comunicate con nosotros.' . $e->getMessage())
                ->with('type', 'error')
                ->withInput();
        }
    }

    public function delete(string $id)
    {
        return view('tenants.confirm-delete', [
            'tenant' => $this->repo->findOrFailWithRelations($id, ['phonePrefixes']),
        ]);
    }

    public function confirmDelete(ConfirmDeleteRequest $request, string $id)
    {
        $tenant = $this->repo->findOrFail($id);

        if ($request->user()->cannot('delete', $tenant)) {
            return redirect()
                ->route('tenants.index')
                ->with('message', 'Solo el administrador puede eliminar un Inquilino.')
                ->with('type', 'error');
        }

        if ((int) $request->input('dni') !== $tenant->dni) {
            return back()
                ->with('message', 'El DNI no coincide con el Inquilino que querés eliminar.')
                ->with('type', 'error')
                ->withInput();
        }

        if ($tenant->properties()->exists()) {
            return back()
                ->with('message', 'No se puede eliminar el Garante porque tiene propiedades asociadas.')
                ->with('type', 'error')
                ->withInput();
        }

        try {
            $this->repo->delete($id);

            return redirect()
                ->route('tenants.index')
                ->withInput()
                ->with('message', 'El Inquilino fue eliminado con éxito.')
                ->with('type', 'success');
        } catch(\Exception $e) {
            return redirect()
                ->route('tenants.index')
                ->with('message', 'Ocurrió un error al eliminar la información. Por favor, probá de nuevo en un rato. Si el problema persiste, comunicate con nosotros.' . $e->getMessage())
                ->with('type', 'error');
        }
    }
}
