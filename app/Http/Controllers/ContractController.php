<?php

namespace App\Http\Controllers;

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

    }

    public function edit()
    {
        return view('contracts.edit');
    }

    public function delete()
    {

    }
}
