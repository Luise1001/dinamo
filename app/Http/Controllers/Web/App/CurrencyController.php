<?php

namespace App\Http\Controllers\Web\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Web\App\CurrencyRequest;
use App\Models\Currency;
use App\Services\AmountService;

class CurrencyController extends Controller
{
    protected $amountService;

    public function __construct(AmountService $amountService)
    {
        $this->amountService = $amountService;
    }

    public function index()
    {
        return view('app.currencies.index');
    }

    public function create()
    {
        return view('app.currencies.create');
    }

    public function edit(Request $request, $id)
    {
        $request->merge(['id' => $id]);
        
        $this->validate(
            $request,
            [
                'id' => 'required|exists:currencies,id'
            ],
            [
                'id.required' => 'El id es requerido',
                'id.exists' => 'El id no existe'
            ]
        );

        $currency = Currency::find($id);

        return view('app.currencies.edit', [
            'currency' => $currency
        ]);
    }


    public function store(CurrencyRequest $request)
    {
        $user_id = Auth::user()->id;
        $name = ucfirst($request->name);
        $code = strtoupper($request->code);
        $rate = $this->amountService->format($request->rate);
        $min_user = $this->amountService->format($request->min_user);
        $max_user = $this->amountService->format($request->max_user);
        $max_driver = $this->amountService->format($request->max_driver);

        $request->merge([
            'user_id' => $user_id,
            'name' => $name,
            'code' => $code,
            'rate' => $rate,
            'min_user' => $min_user,
            'max_user' => $max_user,
            'max_driver' => $max_driver,
        ]);

        Currency::create($request->all());

        return redirect()->route('currencies')->withSuccess('Moneda creada correctamente');
    }


    public function update(CurrencyRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:currencies,id',
        ], [
            'id.required' => 'El id es requerido',
            'id.exists' => 'El id no existe',
        ]);

        $user_id = Auth::user()->id;
        $name = ucfirst($request->name);
        $code = strtoupper($request->code);
        $rate = $this->amountService->format($request->rate);
        $min_user = $this->amountService->format($request->min_user);
        $max_user = $this->amountService->format($request->max_user);
        $max_driver = $this->amountService->format($request->max_driver);

        $request->merge([
            'user_id' => $user_id,
            'name' => $name,
            'code' => $code,
            'rate' => $rate,
            'min_user' => $min_user,
            'max_user' => $max_user,
            'max_driver' => $max_driver,
        ]);

        $currency = Currency::find($request->id);
        $currency->update($request->all());

        return redirect()->route('currencies')->withSuccess('Moneda actualizada correctamente');
    }
}
