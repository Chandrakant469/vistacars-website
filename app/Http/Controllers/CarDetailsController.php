<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\TblUsedCarDetail;
use App\Models\TblShowroomAddress;
use App\Models\TblTestDriveModel;
use App\Models\TblUserLogin;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class CarDetailsController extends Controller
{
    function carDetails(Request $request)
    {
        $title = 'Vistacars';
        $query = TblUsedCarDetail::select('m.make_name', 'm1.model_name', 'v.variant_name', 'm.make_url', 'tbl_used_car_detail.*')
            ->join('make_models as m1', 'm1.model_id', '=', 'tbl_used_car_detail.model')
            ->join('makes as m', 'm.make_id', '=', 'tbl_used_car_detail.make')
            ->join('model_variant as v', 'v.variant_id', '=', 'tbl_used_car_detail.variant')
            ->where('tbl_used_car_detail.product_url', $request->product_url)
            ->where('tbl_used_car_detail.status', '!=', '-1');
        $popularVehicles = $query->get();
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
            ->get();

        $locations = TblShowroomAddress::select('location_name')
            ->where('location_type', 'Pre Owned Cars')
            ->where('status', 1)->orderBy('location_name', 'asc')
            ->get();

        return view('car_details', compact('popularVehicles', 'relatedCars', 'locations', 'title'));
    }

    public function bookTestDrive(Request $request)
    {
        
        $validatedData = $request->validate([
            'product_id' => 'required',
            'showroom_location' => 'required|string|max:255',
            'test_drive_date' => 'required|date_format:d/m/Y',
            'test_drive_time' => 'required|string|max:255',
            'address' => 'nullable|string|max:500',
        ], [
            'product_id.required' => 'Product ID is missing.',
            'showroom_location.required' => 'Please select a location.',
            'showroom_location.string' => 'Invalid location format.',
            'test_drive_date.required' => 'Please select a test drive date.',
            'test_drive_date.date_format' => 'The test drive date must be in dd/mm/yyyy format.',
            'test_drive_time.required' => 'Please select a test drive time.',
            'address.max' => 'Address cannot exceed 500 characters.',
        ]);
        $login_id = Session::get('login_id');
        $user = TblUserLogin::where('login_id', $login_id)->first();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found.',
            ]);
        }
        $test_drive_date = \Carbon\Carbon::createFromFormat('d/m/Y', $request->input('test_drive_date'))->format('Y-m-d');
        $currentDateTime = \Carbon\Carbon::now('Asia/Kolkata');
        $created_date = $currentDateTime->format('Y-m-d');
        $created_time = $currentDateTime->format('h:i:s A');
        $test_drive_details = [
            "login_id" => $user->login_id,
            "showroom_location" => $request->input('showroom_location'),
            "test_drive_date" => $test_drive_date,
            "test_drive_time" => $request->input('test_drive_time'),
            "address" => $request->input('address'),
            "product_id" => $request->input('product_id'),
            "created_date" => $created_date,
            "created_time" => $created_time,    
            "td_status" => 1,
        ];
        $inserted = TblTestDriveModel::insert($test_drive_details);
        return response()->json([
            'success' => $inserted ? true : false,
            'data' => $inserted,
            'message' => $inserted ? 'Test drive scheduled successfully!' : 'Failed to schedule test drive.',
        ]);
    }

}
