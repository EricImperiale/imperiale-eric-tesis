<?php

namespace App\Http\Controllers;

use App\Http\Requests\Guarantors\CreateRequest;
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

    public function edit()
    {
        return view('guarantors.edit-form');
    }
}
