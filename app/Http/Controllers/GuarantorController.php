<?php

namespace App\Http\Controllers;

use App\Http\Requests\Guarantors\CreateRequest;
use App\Http\Requests\Guarantors\EditRequest;
use App\Http\Requests\Owner\ConfirmDeleteRequest;
use App\Models\Guarantor;
use App\Models\PhonePrefix;
use App\Repositories\BaseEloquentRepository;
use App\Searches\BaseSearches;
use Illuminate\Http\Request;

class GuarantorController extends Controller
{
    public BaseEloquentRepository $repo;

    public function __construct()
    {
        $this->repo = new BaseEloquentRepository(Guarantor::class);
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

        $guarantors = $builder->paginate(2);

        return view('guarantors.index', [
            'guarantors' => $guarantors,
            'baseSearches' => $baseSearches,
        ]);
    }

    public function create()
    {
        return view('guarantors.create-form', [
            'phonePrefixes' => PhonePrefix::all(),
        ]);
    }

    public function processCreate(CreateRequest $request)
    {
        $data = $request->except(['_token']);

        try {
            $this->repo->create($data);

            return redirect()
                ->route('guarantors.index')
                ->withInput()
                ->with('message', 'El Garante fue creado con éxito.')
                ->with('type', 'success');
        } catch(\Exception $e) {
            return redirect()
                ->route('guarantors.index')
                ->with('message', 'Ocurrió un error al grabar la información. Por favor, probá de nuevo en un rato. Si el problema persiste, comunicate con nosotros.' . htmlspecialchars($e->getMessage()))
                ->with('type', 'error')
                ->withInput();
        }
    }

    public function edit(string $id)
    {
        return view('guarantors.edit-form', [
            'guarantor' => $this->repo->findOrFailWithRelations($id, ['phonePrefixes']),
            'phonePrefixes' => PhonePrefix::all(),
        ]);
    }

    public function processUpdate(EditRequest $request, string $id)
    {
        $data = $request->except(['_token']);

        try {
            $guarantor = $this->repo->update($id, $data);

            if ($request->user()->cannot('update', $guarantor)) {
                return redirect()
                    ->route('guarantors.index')
                    ->with('message', 'Solo el administrador puede editar un Garante.')
                    ->with('type', 'error');
            }

            return redirect()
                ->route('guarantors.index')
                ->withInput()
                ->with('message', 'El Garante <b>' . e($guarantor->fullName) . '</b> fue editado con éxito.')
                ->with('type', 'success');
        } catch(\Exception $e) {
            return redirect()
                ->route('guarantors.index')
                ->with('message', 'Ocurrió un error al editar la información. Por favor, probá de nuevo en un rato. Si el problema persiste, comunicate con nosotros.' . $e->getMessage())
                ->with('type', 'error')
                ->withInput();
        }
    }

    public function delete(string $id)
    {
        return view('guarantors.confirm-delete', [
            'guarantor' => $this->repo->findOrFailWithRelations($id, ['phonePrefixes']),
        ]);
    }

    public function confirmDelete(ConfirmDeleteRequest $request, string $id)
    {
        $guarantor = $this->repo->findOrFail($id);

        if ($request->user()->cannot('delete', $guarantor)) {
            return redirect()
                ->route('guarantors.index')
                ->with('message', 'Solo el administrador puede eliminar un Garante.')
                ->with('type', 'error');
        }

        if ((int) $request->input('dni') !== $guarantor->dni) {
            return back()
                ->with('message', 'El DNI no coincide con el Garante que querés eliminar.')
                ->with('type', 'error')
                ->withInput();
        }

        if ($guarantor->properties()->exists()) {
            return back()
                ->with('message', 'No se puede eliminar el Garante porque tiene propiedades asociadas.')
                ->with('type', 'error')
                ->withInput();
        }
        
        try {
            $this->repo->delete($id);

            return redirect()
                ->route('guarantors.index')
                ->withInput()
                ->with('message', 'El Inquilino fue eliminado con éxito.')
                ->with('type', 'success');
        } catch(\Exception $e) {
            return redirect()
                ->route('guarantors.index')
                ->with('message', 'Ocurrió un error al eliminar la información. Por favor, probá de nuevo en un rato. Si el problema persiste, comunicate con nosotros.' . $e->getMessage())
                ->with('type', 'error');
        }
    }
}
