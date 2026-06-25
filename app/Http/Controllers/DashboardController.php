<?php

namespace App\Http\Controllers;

use App\Models\ModelVariant;
use App\Models\TblShortlisted;
use App\Models\TblShowroomAddress;
use App\Models\TblShowroomLocation;
use App\Models\TblTestDriveModel;
use App\Models\TblUsedCarDetail;
use App\Models\TblUserLogin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Vistacars True Value';
        $description = '';
        if (!Session::has('user_logged_in')) {
            return redirect()->route('home')->with('error', 'You must log in to access the dashboard.');
        }
        $usedCars = collect();
        $testDrives = collect();
        $contact_requesteds = collect();
        $loginId = Session::get('login_id');
        if ($loginId) {
            $productIds = TblShortlisted::where('login_id', $loginId)->pluck('product_id')->toArray();
            if (!empty($productIds)) {
                $usedCars = TblUsedCarDetail::select(
                    'm.make_name',
                    'm1.model_name',
                    'v.variant_name',
                    'tbl_used_car_detail.*'
                )
                    ->join('make_models as m1', 'm1.model_id', '=', 'tbl_used_car_detail.model')
                    ->join('makes as m', 'm.make_id', '=', 'tbl_used_car_detail.make')
                    ->join('model_variant as v', 'v.variant_id', '=', 'tbl_used_car_detail.variant')
                    ->where('tbl_used_car_detail.status', '!=', '-1')
                    ->whereIn('tbl_used_car_detail.product_id', $productIds)
                    ->get();
            }
            $testDrives = TblTestDriveModel::select(
                'makes.make_name',
                'make_models.model_name',
                'model_variant.variant_name',
                'tbl_used_car_detail.*',
                'tbl_test_drive.showroom_location',
                'tbl_test_drive.test_drive_date',
                'tbl_test_drive.test_drive_time',
                'tbl_test_drive.address',
                'tbl_test_drive.test_drive_id'
            )
                ->leftJoin('tbl_used_car_detail', 'tbl_test_drive.product_id', '=', 'tbl_used_car_detail.product_id')
                ->leftJoin('make_models', 'make_models.model_id', '=', 'tbl_used_car_detail.model')
                ->leftJoin('makes', 'makes.make_id', '=', 'tbl_used_car_detail.make')
                ->leftJoin('model_variant', 'model_variant.variant_id', '=', 'tbl_used_car_detail.variant')
                ->where('tbl_test_drive.td_status', 1)
                ->where('tbl_test_drive.login_id', $loginId)
                ->get();
            $contact_requesteds = TblUsedCarDetail::select(
                'm1.make_name',
                'm.model_name',
                'v.variant_name',
                'tbl_used_car_detail.*'
            )
                ->join('make_models as m', 'm.model_id', '=', 'tbl_used_car_detail.model')
                ->join('makes as m1', 'm1.make_id', '=', 'tbl_used_car_detail.make')
                ->join('model_variant as v', 'v.variant_id', '=', 'tbl_used_car_detail.variant')
                ->join('tbl_contact_requested as s', 's.product_id', '=', 'tbl_used_car_detail.product_id')
                ->where('s.cr_status', '1')
                ->where('s.login_id', $loginId)
                ->get();
        }
        $locations = TblShowroomAddress::select('location_name')
            ->where('location_type', 'Pre Owned Cars')
            ->where('status', 1)
            ->orderBy('location_name', 'asc')
            ->get();

        return view('dashboard', compact('usedCars', 'testDrives', 'locations', 'contact_requesteds', 'title', 'description'));
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'contact' => 'required|digits:10',
            'email' => 'required|email|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
        }

        $recaptchaResponse = $request->input('recaptcha');
        if (empty($recaptchaResponse)) {
            return response()->json(['errors' => ['recaptcha' => ['Please complete the reCAPTCHA.']]], 422);
        }

        $recaptchaSecretKey = RECAPTCHA_SECRET_KEY;
        $verifyUrl = "https://www.google.com/recaptcha/api/siteverify?secret={$recaptchaSecretKey}&response={$recaptchaResponse}";
        $verify = file_get_contents($verifyUrl);
        $response = json_decode($verify);

        if (!$response->success) {
            return response()->json(['errors' => ['recaptcha' => ['Invalid reCAPTCHA. Please try again.']]], 422);
        }
        $name = $request->input('name');
        $contact = $request->input('contact');
        $email = $request->input('email');
        $enq = $request->input('enq');
        $message = $request->input('message') ?? '';
        $path = '';
        $location = '';
        $model_id = '';
        $lead_source = 'Vistacars Website';
        $params = [
            "name" => $name,
            "email" => $email,
            "phone" => $contact,
            "enq" => $enq,
            "page_path" => $path,
            "lead_source" => $lead_source,
            "model_id" => $model_id,
            "location" => $location,
            "comment" => $message ?? ''
        ];
        // API URL
        $url = 'https://www.autovista.in/all_lms/index.php/api_web/vistacars_poc_sales';
        $responseApi = $this->postCURL($url, $params);
        $responseData = json_decode($responseApi);
        if ($responseData->success == '1') {
            return response()->json(['status' => 'success', 'message' => 'Form submitted successfully!'], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Failed to submit form. Please try again.'], 500);
        }
    }

    // public function postCURL($url, $params)
    // {
    //     $postData = '';
    //     foreach ($params as $k => $v) {
    //         $postData .= $k . '=' . $v . '&';
    //     }
    //     rtrim($postData, '&');
    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL, $url);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    //     curl_setopt($ch, CURLOPT_HEADER, false);
    //     curl_setopt($ch, CURLOPT_POST, true);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    //     $output = curl_exec($ch);
    //     curl_close($ch);
    //     return $output;
    // }
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'contact' => 'required|digits:10',
            'city' => 'required|string|in:Mumbai,Navi Mumbai,Pune',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
        }

        try {
            $existingUser = TblUserLogin::where('login_id', $id)->first();

            if (!$existingUser) {
                return response()->json(['status' => 'error', 'message' => 'User not found!'], 404);
            }

            $isChanged = false;
            $updates = [];

            if ($existingUser->name !== $request->input('name')) {
                $isChanged = true;
                $updates['name'] = $request->input('name');
            }
            if ($existingUser->email_id !== $request->input('email')) {
                $isChanged = true;
                $updates['email_id'] = $request->input('email');
            }
            if ($existingUser->moblie_number !== $request->input('contact')) {
                $isChanged = true;
                $updates['moblie_number'] = $request->input('contact');
            }
            if ($existingUser->city !== $request->input('city')) {
                $isChanged = true;
                $updates['city'] = $request->input('city');
            }

            if (!$isChanged) {
                return response()->json(['status' => 'info', 'message' => 'No changes detected.'], 200);
            }
            $updateStatus = TblUserLogin::where('login_id', $id)->update($updates);
            if ($updateStatus) {
                $updatedUser = TblUserLogin::where('login_id', $id)->first();
                Session::put('user_logged_in', true);
                Session::put('user_contact', $updatedUser->moblie_number);
                Session::put('user_name', $updatedUser->name);
                Session::put('user_location', $updatedUser->city);
                Session::put('user_email', $updatedUser->email_id);
                Session::put('login_id', $updatedUser->login_id);

                return response()->json(['status' => 'success', 'message' => 'Profile updated successfully!']);
            } else {
                return response()->json(['status' => 'error', 'message' => 'Failed to update profile!'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'An unexpected error occurred!', 'details' => $e->getMessage()], 500);
        }
    }

    public function storeProductId(Request $request)
    {
        if (Session::get('user_logged_in', false)) {
            $loginId = Session::get('login_id');
            $productId = $request->input('product_id');
            $existingEntry = TblShortlisted::where('login_id', $loginId)
                ->where('product_id', $productId)
                ->first();
            if ($existingEntry) {
                return response()->json([
                    'success' => false,
                    'message' => 'Product is already shortlisted.'
                ]);
            }
            $shortlist = new TblShortlisted();
            $shortlist->login_id = $loginId;
            $shortlist->product_id = $productId;
            $shortlist->sl_status = 1;
            $shortlist->created_date = Carbon::now()->toDateString();
            $shortlist->created_time = Carbon::now('Asia/Kolkata')->format('h:i:s A');


            if ($shortlist->save()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Product has been successfully shortlisted.'
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'Failed to shortlist the product. Please try again.'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'User not logged in.'
        ]);
    }

    public function removeFromWishlist(Request $request)
    {
        $productId = $request->input('product_id');
        $loggedIn = Session::get('user_logged_in', false);
        $loginId = Session::get('login_id');
        if ($loggedIn && $loginId) {
            $deleted = TblShortlisted::where('login_id', $loginId)
                ->where('product_id', $productId)
                ->delete();
            if ($deleted) {
                return response()->json([
                    'success' => true,
                    'message' => 'Product removed from wishlist.',
                    'product_id' => $productId
                ]);
            }
        }
        return response()->json([
            'success' => false,
            'message' => 'Failed to remove product. Please try again.'
        ]);
    }

    public function cancelTestDrive(Request $request)
    {
        $testDriveId = $request->test_drive_id;
        $testDrive = TblTestDriveModel::find($testDriveId);
        if ($testDrive) {
            $testDrive->td_status = -1;
            $testDrive->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'Test drive not found']);
    }

    public function updateReschedule(Request $request)
    {
        $validatedData = $request->validate([
            'test_drive_id' => 'required|exists:tbl_test_drive,test_drive_id',
            'showroom_location' => 'required|string|max:255',
            'test_drive_date' => 'required|date_format:d/m/Y',
            'test_drive_time' => 'required|string|max:255',
            'address' => 'nullable|string|max:500',
        ], [
            'test_drive_id.required' => 'Test Drive ID is required.',
            'test_drive_id.exists' => 'Invalid Test Drive ID.',
            'showroom_location.required' => 'Showroom location is required.',
            'test_drive_date.required' => 'Test drive date is required.',
            'test_drive_date.date_format' => 'Test drive date must be in dd/mm/yyyy format.',
            'test_drive_time.required' => 'Test drive time is required.',
        ]);

        $reschedule = TblTestDriveModel::find($validatedData['test_drive_id']);
        if ($reschedule) {
            $reschedule->showroom_location = $validatedData['showroom_location'];
            $reschedule->test_drive_date = \Carbon\Carbon::createFromFormat('d/m/Y', $validatedData['test_drive_date'])->format('Y-m-d');
            $reschedule->test_drive_time = $validatedData['test_drive_time'];
            $reschedule->address = $validatedData['address'] ?? '';
            $reschedule->save();
            return response()->json([
                'success' => true,
                'message' => 'Test drive rescheduled successfully!',
                'data' => $reschedule
            ]);
        }
        return response()->json(['success' => false, 'message' => 'Test drive not found.'], 404);
    }
    public function bookTestDriveBookNow(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'booktestdrive_name' => 'required|string|max:255',
            'booktestdrive_contact' => 'required|digits:10',
            'booktestdrive_email' => 'required|email|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
        }

        $recaptchaResponse = $request->input('recaptcha');
        if (empty($recaptchaResponse)) {
            return response()->json(['errors' => ['recaptcha' => ['Please complete the reCAPTCHA.']]], 422);
        }
        $recaptchaSecretKey = RECAPTCHA_SECRET_KEY;
        $verifyUrl = "https://www.google.com/recaptcha/api/siteverify?secret={$recaptchaSecretKey}&response={$recaptchaResponse}";
        $verify = file_get_contents($verifyUrl);
        $response = json_decode($verify);

        if (!$response->success) {
            return response()->json(['errors' => ['recaptcha' => ['Invalid reCAPTCHA. Please try again.']]], 422);
        }
        $name = $request->input('booktestdrive_name');
        $contact = $request->input('booktestdrive_contact');
        $email = $request->input('booktestdrive_email');
        $enq = $request->input('bookenq');
        $message = $request->input('message') ?? '';
        $path = '';
        $location = '';
        $model_id = '';
        $lead_source = 'Vistacars Website';
        $params = [
            "name" => $name,
            "email" => $email,
            "phone" => $contact,
            "enq" => $enq,
            "page_path" => $path,
            "lead_source" => $lead_source,
            "model_id" => $model_id,
            "location" => $location,
            "comment" => $message ?? ''
        ];
        // API URL
        $url = 'https://www.autovista.in/all_lms/index.php/api_web/vistacars_poc_sales';
        $responseApi = $this->postCURL($url, $params);
        $responseData = json_decode($responseApi);
        if ($responseData->success == '1') {
            return response()->json(['status' => 'success', 'message' => 'Form submitted successfully!'], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Failed to submit form. Please try again.'], 500);
        }
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
