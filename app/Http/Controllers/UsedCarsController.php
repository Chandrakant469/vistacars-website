<?php

namespace App\Http\Controllers;

use App\Models\TblShowroomLocation;
use App\Models\TblUsedCarDetail;
use Illuminate\Http\Request;

class UsedCarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $slug = null)
    {
        $title = 'Vistacars True Value';
        $description = '';
        $showrooms = TblShowroomLocation::where('status', 1)->orderBy('id', 'desc')->get();
        $fuel_types = TblUsedCarDetail::where('status', 1)
            ->distinct('fuel_type')
            ->get(['fuel_type']);
        $select_models = TblUsedCarDetail::join('make_models as m1', 'm1.model_id', '=', 'tbl_used_car_detail.model')
            ->join('makes as m', 'm.make_id', '=', 'tbl_used_car_detail.make')
            ->groupBy('m1.model_id', 'm.make_name', 'm1.model_name', 'm1.model_url')
            ->get([
                'm.make_name as make_name',
                'm1.model_name as model_name',
                'm1.model_url as model_url',
                'm1.model_id as model_id',
            ]);
        $query = TblUsedCarDetail::select('m.make_name', 'm1.model_name', 'v.variant_name', 'tbl_used_car_detail.*')
            ->join('make_models as m1', 'm1.model_id', '=', 'tbl_used_car_detail.model')
            ->join('makes as m', 'm.make_id', '=', 'tbl_used_car_detail.make')
            ->join('model_variant as v', 'v.variant_id', '=', 'tbl_used_car_detail.variant')
            ->where('tbl_used_car_detail.status', '!=', '-1');
        switch ($slug) {
            case 'used-car-under-2-lakhs':
                $title = 'Buy Used Car under 2 Lakhs | ' . session('tlocation_web', 'Mumbai');
                $description = 'Buy Used Car in Mumbai Pune or Navi Mumbai from Vistacars under 2 Lakhs only. You can choose from wide collections of Tata, Maruti Suzuki, Ford, Hyundai, Honda and so on.';
                $price = 200000;
                $query->where('tbl_used_car_detail.price', '<=', $price);
                break;
            case 'used-car-under-3-lakhs':
                $title = 'Buy Used Car under 3 Lakhs | ' . session('tlocation_web', 'Mumbai');
                $description = 'Buy Used Car in Mumbai Pune or Navi Mumbai from Vistacars under 3 Lakhs only. You can choose from wide collections of Tata, Maruti Suzuki, Ford, Hyundai, Honda and so on.';
                $price = 300000;
                $query->where('tbl_used_car_detail.price', '<=', $price);
                break;
            case 'used-car-under-4-lakhs':
                $title = 'Buy Used Car under 4 Lakhs | ' . session('tlocation_web', 'Mumbai');
                $description = 'Buy Used Car in Mumbai Pune or Navi Mumbai from Vistacars under 4 Lakhs only. You can choose from wide collections of Tata, Maruti Suzuki, Ford, Hyundai, Honda and so on.';
                $price = 400000;
                $query->where('tbl_used_car_detail.price', '<=', $price);
                break;
            case 'used-car-under-5-lakhs':
                $title = 'Buy Used Car under 5 Lakhs | ' . session('tlocation_web', 'Mumbai');
                $description = 'Buy Used Car in Mumbai Pune or Navi Mumbai from Vistacars under 5 Lakhs only. You can choose from wide collections of Tata, Maruti Suzuki, Ford, Hyundai, Honda and so on.';
                $price = 500000;
                $query->where('tbl_used_car_detail.price', '<=', $price);
                break;
            case 'used-car-under-6-lakhs':
                $title = 'Buy Used Car under 6 Lakhs | ' . session('tlocation_web', 'Mumbai');
                $description = 'Buy Used Car in Mumbai Pune or Navi Mumbai from Vistacars under 6 Lakhs only. You can choose from wide collections of Tata, Maruti Suzuki, Ford, Hyundai, Honda and so on.';
                $price = 600000;
                $query->where('tbl_used_car_detail.price', '<=', $price);
                break;
            case 'used-petrol-cars':
                $title = 'Buy Used Petrol Car | ' . session('tlocation_web', 'Mumbai') . ' | Vistacars';
                $description = 'Buy Used Petrol Car from Vistacars. Brands like Hyundai, Tata, Ford, Maruti Suzuki, Honda etc. Mumbai, Navi Mumbai and Pune.';
                $fuel_url = 'Petrol';
                $query->where('tbl_used_car_detail.fuel_type', $fuel_url);
                break;
            case 'used-diesel-cars':
                $title = 'Buy Used Diesel Car | ' . session('tlocation_web', 'Mumbai') . ' | Vistacars';
                $description = 'Buy Used Diesel Car from Vistacars. Brands like Hyundai, Tata, Ford, Maruti Suzuki, Honda etc. Mumbai, Navi Mumbai and Pune.';
                $fuel_url = 'Diesel';
                $query->where('tbl_used_car_detail.fuel_type', $fuel_url);
                break;
            case 'used-cng-cars':
                $title = 'Buy Used CNG Car | ' . session('tlocation_web', 'Mumbai') . ' | Vistacars';
                $description = 'Buy Used CNG Car from Vistacars. Brands like Hyundai, Tata, Ford, Maruti Suzuki, Honda etc. Mumbai, Navi Mumbai and Pune.';
                $fuel_url = 'CNG';
                $query->where('tbl_used_car_detail.fuel_type', $fuel_url);
                break;
            case 'used-hatchback-cars':
                $title = 'Buy Used Hatchback Car | ' . session('tlocation_web', 'Mumbai');
                $description = 'Buy Used Hatchback Car from Vistacars. Find the car you like from Hyundai, Tata, Ford, Maruti Suzuki, Honda etc. Mumbai, Navi Mumbai and Pune.';
                $body = 'Hatchback';
                $query->where('tbl_used_car_detail.body_type', $body);
                break;
            case 'used-sedan-cars':
                $title = 'Buy Used Sedan Car | ' . session('tlocation_web', 'Mumbai');
                $description = 'Buy Used Sedan Car from Vistacars. Find the car you like from Hyundai, Tata, Ford, Maruti Suzuki, Honda etc. Mumbai, Navi Mumbai and Pune.';
                $body = 'Sedan';
                $query->where('tbl_used_car_detail.body_type', $body);
                break;
            case 'used-suv-cars':
                $title = 'Buy Used SUV Car | ' . session('tlocation_web', 'Mumbai');
                $description = 'Buy Used SUV Car from Vistacars. Find the car you like from Hyundai, Tata, Ford, Maruti Suzuki, Honda etc. Mumbai, Navi Mumbai and Pune.';
                $body = 'SUV';
                $query->where('tbl_used_car_detail.body_type', $body);
                break;
            case 'used-maruti-wagonr-cars':
                $title = 'Buy Used Wagon R Car | ' . session('tlocation_web', 'Mumbai');
                $description = 'Buy Used Wagon R Car from Vistacars. Find the car you like from Hyundai, Tata, Ford, Maruti Suzuki, Honda etc. Mumbai, Navi Mumbai and Pune.';
                $body = 'wagonr';
                $query->where('m1.model_url', $body);
                break;
            case 'used-maruti-swiftdzire-cars':
                $title = 'Buy Used Swift Dzire Car | ' . session('tlocation_web', 'Mumbai');
                $description = 'Buy Used SwiftDzire Car from Vistacars. Find the car you like from Hyundai, Tata, Ford, Maruti Suzuki, Honda etc. Mumbai, Navi Mumbai and Pune.';
                $body = 'swiftdzire';
                $query->where('m1.model_url', $body);
                break;
            case 'used-toyota-innova-cars':
                $title = 'Buy Used Innova Car | ' . session('tlocation_web', 'Mumbai');
                $description = 'Buy Used Innova Car from Vistacars. Find the car you like from Hyundai, Tata, Ford, Maruti Suzuki, Honda etc. Mumbai, Navi Mumbai and Pune.';
                $body = 'innova';
                $query->where('m1.model_url', $body);
                break;
            case 'used-maruti-ertiga-cars':
                $title = 'Buy Used Ertiga Car | ' . session('tlocation_web', 'Mumbai');
                $description = 'Buy Used Ertiga Car from Vistacars. Find the car you like from Hyundai, Tata, Ford, Maruti Suzuki, Honda etc. Mumbai, Navi Mumbai and Pune.';
                $body = 'ertiga';
                $query->where('m1.model_url', $body);
                break;
            case 'used-hyundai-i20-cars':
                $title = 'Buy Used i20 Car | ' . session('tlocation_web', 'Mumbai');
                $description = 'Buy Used i20 Car from Vistacars. Find the car you like from Hyundai, Tata, Ford, Maruti Suzuki, Honda etc. Mumbai, Navi Mumbai and Pune.';
                $body = 'i20';
                $query->where('m1.model_url', $body);
                break;
            case 'used-cars-in-kharghar':
                $location = 'Navi-Mumbai';
                $query->where('tbl_used_car_detail.main_location', $location);
                break;
            case 'used-car-in-pune':
                $location = 'Pune';
                $query->where('tbl_used_car_detail.main_location', $location);
                break;
            case 'used-car-in-mumbai':
                $location = 'Mumbai';
                $query->where('tbl_used_car_detail.main_location', $location);
                break;

            case 'km-driven-less-than-20000':
                $km = 20000;
                $query->where('tbl_used_car_detail.km_driven', '<=',  $km);
                break;
            case 'km-driven-less-than-40000':
                $title = 'Buy Used Car | Less than 40,000 KM Driven |';
                $km = 40000;
                $query->where('tbl_used_car_detail.km_driven', '<=',  $km);
                break;
            case 'km-driven-less-than-60000':
                $km = 60000;
                $query->where('tbl_used_car_detail.km_driven', '<=',  $km);
                break;
            case 'km-driven-less-than-80000':
                $km = 80000;
                $query->where('tbl_used_car_detail.km_driven', '<=',  $km);
                break;
            case 'km-driven-above-80000':
                $km = 80000;
                $query->where('tbl_used_car_detail.km_driven', '>=',  $km);
                break;
            case 'transmission-manual':
                $t_type = 'Manual';
                $query->where('tbl_used_car_detail.transmission_type', $t_type);
                break;
            case 'transmission-automatic':
                $t_type = 'Automatic';
                $query->where('tbl_used_car_detail.transmission_type', $t_type);
                break;
            case 'used-cars-between-2-3lakhs':
                $query->whereBetween('tbl_used_car_detail.price', [200000, 300000]);
                break;
            case 'used-cars-between-3-4lakhs':
                $query->whereBetween('tbl_used_car_detail.price', [300000, 400000]);
                break;

            case 'used-cars-between-4-5lakhs':
                $query->whereBetween('tbl_used_car_detail.price', [400000, 500000]);
                break;

            case 'used-cars-between-5-6lakhs':
                $query->whereBetween('tbl_used_car_detail.price', [500000, 600000]);
                break;

            case 'used-cars-between-6-7lakhs':
                $query->whereBetween('tbl_used_car_detail.price', [600000, 700000]);
                break;

            case 'used-cars-between-7-8lakhs':
                $query->whereBetween('tbl_used_car_detail.price', [700000, 800000]);
                break;

            case 'used-cars-more-than-8lakhs':
                $query->where('tbl_used_car_detail.price', '>', 800000);
                break;

            case 'used-cars-less-than-5-year':
                $title = 'Buy Used Car | Less than 5 years old |';
                $description = 'Buy Less than 5 years old Used Car from Vistacars. Click here to see more brands like Hyundai, Tata, Ford, Honda etc.';
                $currentYear = date('Y');
                $mfgYearLimit = $currentYear - 5;
                $query->where('tbl_used_car_detail.mfg_year', '>=', $mfgYearLimit);
                break;

            case 'used-cars-less-than-6-year':
                $currentYear = date('Y');
                $mfgYearLimit = $currentYear - 6;
                $query->where('tbl_used_car_detail.mfg_year', '>=', $mfgYearLimit);
                break;

            case 'used-cars-less-than-7-year':
                $currentYear = date('Y');
                $mfgYearLimit = $currentYear - 7;
                $query->where('tbl_used_car_detail.mfg_year', '>=', $mfgYearLimit);
                break;

            case 'used-cars-less-than-8-year':
                $currentYear = date('Y');
                $mfgYearLimit = $currentYear - 8;
                $query->where('tbl_used_car_detail.mfg_year', '>=', $mfgYearLimit);
                break;

            case 'used-cars-above-8-year':
                $currentYear = date('Y');
                $mfgYearLimit = $currentYear - 8;
                $query->where('tbl_used_car_detail.mfg_year', '<', $mfgYearLimit);
                break;

            case 'used-maruti-cars':
                $make_name = 'maruti';
                $query->where('m.make_url', $make_name);
                break;

            case 'used-hyundai-cars':
                $make_name = 'hyundai';
                $query->where('m.make_url', $make_name);
                break;

            case 'used-honda-cars':
                $make_name = 'honda';
                $query->where('m.make_url', $make_name);
                break;

            case 'used-toyota-cars':
                $make_name = 'toyota';
                $query->where('m.make_url', $make_name);
                break;

            case 'used-tata-cars':
                $make_name = 'tata';
                $query->where('m.make_url', $make_name);
                break;

            case 'used-ford-cars':
                $make_name = 'ford';
                $query->where('m.make_url', $make_name);
                break;

            case 'used-kia-cars':
                $make_name = 'kia';
                $query->where('m.make_url', $make_name);
                break;

            default:
                break;
        }

        $usedCars = $query->get();
        $relatedCars = TblUsedCarDetail::select(
            'm1.make_name',
            'm.model_name',
            'v.variant_name',
            'tbl_used_car_detail.product_id',
            'tbl_used_car_detail.product_url',
            'tbl_used_car_detail.location',
            'tbl_used_car_detail.type',
            'tbl_used_car_detail.price',
            'tbl_used_car_detail.fuel_type',
            'tbl_used_car_detail.km_driven',
            'tbl_used_car_detail.owner',
            'tbl_used_car_detail.mfg_year',
            'tbl_used_car_detail.rating',
            'tbl_used_car_detail.front_left_side_angle_image',
        )
            ->join('make_models as m', 'm.model_id', '=', 'tbl_used_car_detail.model')
            ->join('makes as m1', 'm1.make_id', '=', 'tbl_used_car_detail.make')
            ->join('model_variant as v', 'v.variant_id', '=', 'tbl_used_car_detail.variant')
            ->where('tbl_used_car_detail.status', '!=', '-1')
            ->inRandomOrder()
            ->limit(9)
            ->get();
        return view('used_cars', compact('showrooms', 'fuel_types', 'select_models', 'usedCars', 'relatedCars', 'title', 'description'));
    }

    public function prepareUsedCarsData(Request $request)
    {
        $query = TblUsedCarDetail::select('m1.make_name', 'm.model_name', 'v.variant_name', 'tbl_used_car_detail.*')
            ->join('make_models as m', 'm.model_id', '=', 'tbl_used_car_detail.model')
            ->join('makes as m1', 'm1.make_id', '=', 'tbl_used_car_detail.make')
            ->join('model_variant as v', 'v.variant_id', '=', 'tbl_used_car_detail.variant')
            ->where('tbl_used_car_detail.status', '!=', '-1');

        // Vehicle type
        if ($request->filled('type')) {
            $query->whereIn('tbl_used_car_detail.type', (array)$request->type);
        }

        // Manufacturing year
        if ($request->filled('year') && is_numeric($request->year)) {
            $currentYear = now()->year;
            $year = $request->year;
            $minYear = $currentYear - $year;

            if ($year == 9) {
                $maxYear = $minYear - 1;
                $query->where('tbl_used_car_detail.mfg_year', '<=', $maxYear);
            } else {
                $query->where('tbl_used_car_detail.mfg_year', '>=', $minYear);
            }
        }

        // Fuel type
        if ($request->filled('fuel')) {
            $query->whereIn('tbl_used_car_detail.fuel_type', (array)$request->fuel);
        }

        // Body type
        if ($request->filled('bodyStyle')) {
            $query->whereIn('tbl_used_car_detail.body_type', (array)$request->bodyStyle);
        }

        // Owner
        if ($request->filled('owner')) {
            $query->whereIn('tbl_used_car_detail.owner', (array)$request->owner);
        }

        if ($request->filled('owner_more') && $request->owner_more == true) {
            $query->where('tbl_used_car_detail.owner', '>', 2);
        }

        // Kilometer driven
        if ($request->filled('km')) {
            if ($request->km === 'more') {
                $query->where('tbl_used_car_detail.km_driven', '>=', 80000);
            } else {
                $query->where('tbl_used_car_detail.km_driven', '<=', $request->km);
            }
        }

        // Transmission type
        if ($request->filled('transmission')) {
            $query->whereIn('tbl_used_car_detail.transmission_type', (array)$request->transmission);
        }

        // Price range 
        if ($request->filled('priceLower') && is_numeric($request->priceLower)) {
            $query->where('tbl_used_car_detail.price', '>=', $request->priceLower);
        }

        if ($request->filled('priceUpper') && is_numeric($request->priceUpper)) {
            $query->where('tbl_used_car_detail.price', '<=', $request->priceUpper);
        }

        // Color
        if ($request->filled('color')) {
            $query->whereIn('tbl_used_car_detail.color', (array)$request->color);
        }

        // Location
        if ($request->filled('location')) {
            $query->whereIn('tbl_used_car_detail.main_location', (array)$request->location);
        }

        // Model
        if ($request->filled('model')) {
            $query->whereIn('tbl_used_car_detail.model', (array)$request->model);
        }

        // New model (if applicable)
        if ($request->filled('new_model')) {
            $query->whereIn('tbl_used_car_detail.model', (array)$request->new_model);
        }

        //insurance
        if ($request->filled('insurance')) {
            $query->whereIn('tbl_used_car_detail.insurance' . (array)$request->insurance);
        }

        // Sorting logic
        if ($request->filled('sortValue')) {
            switch ($request->sortValue) {
                case 'Newly_added':
                    $query->orderBy('tbl_used_car_detail.created_date', 'DESC');
                    break;
                case 'year':
                    $query->orderBy('tbl_used_car_detail.mfg_year', 'DESC');
                    break;
                case 'lprice':
                    $query->orderBy('tbl_used_car_detail.price', 'ASC');
                    break;
                case 'hprice':
                    $query->orderBy('tbl_used_car_detail.price', 'DESC');
                    break;
                case 'km':
                    $query->orderBy('tbl_used_car_detail.km_driven', 'ASC');
                    break;
            }
        }
        $usedCars = $query->get();
        $carCount = $usedCars->count();
        $html = view('partials.filter_usedcars', compact('usedCars'))->render();
        return response()->json([
            'html' => $html,
            'car_count' => $carCount,
        ]);
    }

    public function searchUsedCarsData(Request $request)
    {
        $query = TblUsedCarDetail::select('m1.make_name', 'm.model_name', 'v.variant_name', 'tbl_used_car_detail.*')
            ->join('make_models as m', 'm.model_id', '=', 'tbl_used_car_detail.model')
            ->join('makes as m1', 'm1.make_id', '=', 'tbl_used_car_detail.make')
            ->join('model_variant as v', 'v.variant_id', '=', 'tbl_used_car_detail.variant')
            ->where('tbl_used_car_detail.status', '!=', '-1');
        $modelName = $request->input('modelName');
        if ($modelName) {
            $query->where('m.model_name', $modelName);
        }
        $usedCars = $query->get();
        $carCount = $usedCars->count();
        session()->put('usedCars', $usedCars);
        session()->put('carCount', $carCount);
        $html = view('partials.filtered_used_cars', compact('usedCars'))->render();
        return response()->json([
            'html' => $html,
            'car_count' => $carCount,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
