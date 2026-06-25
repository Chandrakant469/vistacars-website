<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\TblUsedCarDetail;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Makes;

class HomeController extends Controller
{

    public function home()
    {
        $title = 'Buy Car | Mumbai - Pune | Vistacars';
        $description = 'Buy a car in Mumbai Pune and Navi Mumbai from Vistacars. Options: Toyota, Tata, Honda, Maruti Suzuki, Ford etc. Click here to see more.';
        $keywords = 'Buy Car, Mumbai, Pune, Vistacars';

        $topMakes = Makes::selectRaw('makes.make_name, makes.make_url, COUNT(u.make) as count')
            ->join('tbl_used_car_detail as u', 'makes.make_id', '=', 'u.make')
            ->groupBy('makes.make_id', 'makes.make_name', 'makes.make_url')
            ->get();

        $vehicleCertified = TblUsedCarDetail::select(
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
            ->where('tbl_used_car_detail.type', '!=', 'Featured')
            ->inRandomOrder()
            ->limit(9)
            ->get();

        $featured_vehicle = TblUsedCarDetail::select(
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
            ->where('tbl_used_car_detail.type', '!=', 'Certified')
            ->inRandomOrder()
            ->limit(9)
            ->get();

        $reviews = Review::where('status', 1)
            ->inRandomOrder()
            ->take(8)
            ->get();

        return view('home', compact('title','description','keywords','vehicleCertified', 'featured_vehicle', 'reviews', 'topMakes'));
    }

    public function setLocation(Request $request)
    {
        $location = $request->input('location');
        if ($location) {
            session(['tlocation_web' => $location]);
            return response()->json(['success' => true, 'message' => 'Location set successfully']);
        }

        return response()->json(['success' => false, 'message' => 'Invalid location']);
    }

    public function suggestions(Request $request)
    {
        $query = $request->input('search');
        $suggestions = TblUsedCarDetail::select(
            'm1.make_name',
            'm.model_name',
            'v.variant_name',
        )
            ->join('make_models as m', 'm.model_id', '=', 'tbl_used_car_detail.model')
            ->join('makes as m1', 'm1.make_id', '=', 'tbl_used_car_detail.make')
            ->join('model_variant as v', 'v.variant_id', '=', 'tbl_used_car_detail.variant')
            ->where('tbl_used_car_detail.status', '!=', '-1')
            ->where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('m1.make_name', 'like', '%' . $query . '%')
                    ->orWhere('m.model_name', 'like', '%' . $query . '%')
                    ->orWhere('v.variant_name', 'like', '%' . $query . '%');
            })
            ->limit(7)
            ->get();
        $formattedSuggestions = $suggestions->map(function ($item) {
            return [
                'name' => "{$item->make_name} {$item->model_name}",
                'model_name' => $item->model_name,
            ];
        });
        return response()->json($formattedSuggestions);
    }
}
