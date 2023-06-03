<?php

namespace App\Http\Controllers;

use App\Models\RentalHistory;
use App\Models\RentCar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LandingPageController extends Controller
{
    public function index()
    {
        $jsonString = file_get_contents(public_path('car.json'));
        $data = json_decode($jsonString, true);

        return response()->json($data);
    }

    public function cars()
    {
        $data = file_get_contents(public_path('car.json'));
        $cars = json_decode($data, true);
        $carsCollection = collect($cars['Cars']);

        $rentedCars = RentCar::where('overdue', '>=', Carbon::now())->get();

        $carsCollection->transform(function ($car) use ($rentedCars) {
            foreach ($rentedCars as $rentCar) {
                if ($car['id'] == $rentCar['car_id']) {
                    $car['Availability'] = 'false';
                }
            }
            return $car;
        });


        return view('cars', compact('carsCollection'));
    }
    public function detail($id)
    {
        $jsonString = file_get_contents(public_path('car.json'));
        $cars = json_decode($jsonString, true);

        $carsCollection = collect($cars['Cars']);

        $car = $carsCollection->where('id', '=', $id)->first();

        return view('detail', compact('car'));
    }

    public function checkuser(Request $request)
    {
        if (!$request->email) {
            $errorMessage = 'email is required';

            return response()->json([
                'error' => $errorMessage,
            ], Response::HTTP_BAD_REQUEST);
        }
        $users = RentalHistory::where('email', '=', $request->email)->get();
        $count = count($users);
        $cars = $request->session()->get('cars', []);

        $total = 0;
        foreach ($cars as $car) {
            $total += $car['price'] * ((int)$car['perday'] ?? 1);
        }
        if ($count < 1) {
            $total += 200;
        }
        return response()->json([
            'count' => $count,
            'total' => $total
        ]);
    }

    public function migrateFresh()
    {
        try {
            Artisan::call('migrate:fresh');
            $output = Artisan::output();

            // You can do something with the output if needed

            return 'Migration successfully executed.';
        } catch (\Exception $e) {
            return 'An error occurred while running migrations: ' . $e->getMessage();
        }
    }
}
