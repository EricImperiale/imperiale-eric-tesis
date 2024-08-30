<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contract\ConfirmDeleteRequest;
use App\Http\Requests\Contract\CreateRequest;
use App\Models\Contract;
use App\Models\CurrencyType;
use App\Models\Guarantor;
use App\Models\Owner;
use App\Models\Property;
use App\Models\Tenant;
use App\Repositories\BaseEloquentRepository;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public BaseEloquentRepository $repo;

    public function __construct()
    {
        $this->repo = new BaseEloquentRepository(Contract::class);
    }
    public function index()
    {
        $builder = $this->repo->withRelations(['property', 'owner', 'tenant', 'guarantor', 'currency']);

        $contracts = $builder->paginate(2);

        return view('contracts.index', [
            'contracts' => $contracts,
        ]);
    }

    public function create()
    {
        return view('contracts.create-form', [
            'properties' => Property::all(),
            'owners' => Owner::all(),
            'tenants' => Tenant::all(),
            'guarantors' => Guarantor::all(),
            'currencyTypes' => CurrencyType::all(),
        ]);
    }

    public function processCreate(CreateRequest $request)
    {
        $data = $request->except('_token');

        try {
            $this->repo->create($data);

            return redirect()
                ->route('contracts.index')
                ->with('message', 'El contrato fue creado con éxito.')
                ->with('type', 'success');
        } catch (\Throwable $e) {
            return redirect()
                ->route('contracts.index')
                ->with('message', 'Ocurrió un error al grabar la información. Por favor, probá de nuevo en un rato. Si el problema persiste, comunicate con nosotros.' . htmlspecialchars($e->getMessage()))
                ->with('type', 'error');
        }
    }

    public function edit()
    {
        return view('contracts.edit');
    }

    public function delete(string $id)
    {
        $contract = $this->repo->findOrFailWithRelations($id, ['property', 'owner', 'tenant', 'guarantor', 'currency']);

        return view('contracts.confirm-delete', [
            'contract' => $contract,
            'owners' => Owner::findOrFail($contract->owner_fk_id),
            'tenants' => Tenant::findOrFail($contract->tenant_fk_id),
            'properties' => Property::findOrFail($contract->property_fk_id),
        ]);
    }

    public function processDelete(ConfirmDeleteRequest $request, string $id)
    {
        $contract = $this->repo->findOrFail($id);

        if ($request->user()->cannot('delete', $contract)) {
            return redirect()
                ->route('contracts.index')
                ->with('message', 'Solo el administrador puede eliminar un Contrato.')
                ->with('type', 'error');
        }

        $propertyFkId = $request->input('property_fk_id');
        $ownerFkId = $request->input('owner_fk_id');
        $tenantFkId = $request->input('tenant_fk_id');

        // TODO: Ver de mejorar esto.
        if (
            $propertyFkId != $contract->property_fk_id &&
            $ownerFkId != $contract->owner_fk_id &&
            $tenantFkId != $contract->tenant_fk_id
        ) {
            return back()
                ->with('message', 'Los datos de confirmación no coincide con los del contrato a eliminar.')
                ->with('type', 'error')
                ->withInput();
        }

        try {
            $this->repo->delete($id);

            return redirect()
                ->route('contracts.index')
                ->with('message', 'El contrato fue eliminado con éxito.')
                ->with('type', 'success');
        } catch (\Exception $e) {
            return redirect()
                ->route('contracts.index')
                ->with('message', 'Ocurrió un error al eliminar la información. Por favor, probá de nuevo en un rato. Si el problema persiste, comunicate con nosotros.' . $e->getMessage())
                ->with('type', 'error');
        }
    }
}
