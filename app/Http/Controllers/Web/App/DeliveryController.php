<?php

namespace App\Http\Controllers\Web\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Web\App\DeliveryRequest;
use App\Models\User;
use App\Models\Driver;
use App\Models\Currency;
use App\Models\Place;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use App\Models\Delivery;
use App\Services\AmountService;

class DeliveryController extends Controller
{
    protected $amountService;

    public function __construct(AmountService $amountService)
    {
        $this->amountService = $amountService;
    }


    public function index()
    {
        $user_id = Auth::user()->id;
        $deliveries = Delivery::where('user_id', $user_id)->get();

        return view('app.delivery.index', [
            'deliveries' => $deliveries
        ]);
    }

    public function create()
    {
        $currencies = Currency::where('active', 1)->get();
        $places = Place::where('active', 1)->get();
        $addresses = Address::where('active', 1)->get();

        return view('app.delivery.create', [
            'currencies' => $currencies,
            'places' => $places,
            'addresses' => $addresses
        ]);
    }

    public function store(DeliveryRequest $request)
    {
        if (!$request->address_id) {
            $address = $this->saveAddress($request);
            $request->merge(['address_id' => $address->id]);
        }

        $user_id = Auth::user()->id;
        $amount  = $this->amountService->format($request->amount);
        $request->merge(['user_id' => $user_id, 'amount' => $amount, 'status' => 'pending', 'progress' => 25]);

        Delivery::create($request->all());

        return redirect()->route('delivery')->withSuccess('Entrega creada correctamente');
    }

    public function detail(Request $request, $id)
    {
        $request->merge(['id' => $id]);

        $this->validate($request, [
            'id' => 'required|exists:deliveries,id'
        ], [
            'id.exists' => 'La orden no existe'
        ]);

        $delivery = Delivery::with('address', 'place', 'user', 'driver', 'currency')->where('id', $id)->first();

        return view('app.delivery.detail', [
            'delivery' => $delivery
        ]);
    }

    private function saveAddress($request)
    {
        $address = Address::create([
            'user_id' => Auth::user()->id,
            'name' => $request->address,
            'address' => $request->address,
            'lat' => $request->lat,
            'lng' => $request->lng,
            'active' => 1
        ]);

        return $address;
    }
}
