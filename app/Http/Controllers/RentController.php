<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rent;
use App\Models\Car;
use App\Models\User;
use Illuminate\Support\Carbon;
class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perpage = $request->perpage ?? 4;
        return view('rents', [
            'rents' => Rent::paginate($perpage)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rent_create', [
            'cars' => Car::all(),
            'users' => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'start_time' => 'required|date',
            'car_id' => 'required|integer',
            'user_id' => 'required|integer'
        ]);
        $rent = new Rent($validated);
        $rent->save();
        return redirect('/rent');
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
        return view('rent_edit', [
            'rent' => Rent::all()->where('id', $id)->first(),
            'cars' => Car::all(),
            'users' => User::all()
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rent = Rent::findOrFail($id);

        $validated = $request->validate([
            'user_id' => 'required',
            'car_id' => 'required',
            'end_time' => 'nullable|date|after:'.$rent->start_time,
        ], [
            'end_time.after' => 'Время окончания должно быть позже времени начала.',
            'user_id.required' => 'Поле "Пользователь" обязательно для заполнения.',
            'car_id.required' => 'Поле "Автомобиль" обязательно для заполнения.',
        ]);
        $start_time = Carbon::parse($rent->start_time);

        $rent = Rent::all()->where('id', $id)->first();
        $rent->user_id = $validated['user_id'];
        $rent->car_id = $validated['car_id'];
        $rent->end_time = $validated['end_time'];

        if ($rent->end_time) {
            $end_time = Carbon::parse($validated['end_time']);
            $duration = $end_time->diffInMinutes($start_time);
            $rent->checksum = $duration * $rent->car->cost_per_minute * (1 - $rent->user->discount / 100);
        }

        $rent->save();
        return redirect('/rent');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Rent::destroy($id);
        return redirect('/rent');
    }
}
