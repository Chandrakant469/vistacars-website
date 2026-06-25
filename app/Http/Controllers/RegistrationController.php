<?php

namespace App\Http\Controllers;

use App\Models\TblUserLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'email' => 'required|email|max:255',
            'contact' => 'required|digits:10',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
        }
        $name = $request->input('name');
        $email = $request->input('email');
        $mobileNumber = $request->input('contact');
        $existingUser = TblUserLogin::where('moblie_number', $mobileNumber)->first();
        $otp = rand(100000, 999999);
        $data = [
            'sender' => 'ATVSTA',
            'destinations' => ['91' . $mobileNumber],
            'template_id' => '1707173433362677445',
            'params' => ['91' . $mobileNumber => ['otp' => $otp]],
        ];
        $response = $this->sendOTPRequest($data);
        $currentDate = Carbon::now()->toDateString();
        $currentTime = Carbon::now('Asia/Kolkata')->format('h:i:s A');
        if (!$existingUser) {
            TblUserLogin::create([
                'name' => $name,
                'moblie_number' => $mobileNumber,
                'email_id' => $email,
                'city' => session('tlocation_web', 'Mumbai'),
                'created_date' => $currentDate,
                'created_time' => $currentTime,
                'otp' => $otp,
                'user_status' => 1,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'OTP send Successfully!',
                'otp' => $otp,
                'name' => $name,
                'mobile_number' => $mobileNumber
            ]);
        } else {
            TblUserLogin::where('moblie_number', $mobileNumber)->update([
                'email_id' => $email,
                'city' => session('tlocation_web', 'Mumbai'),
                'created_date' => $currentDate,
                'created_time' => $currentTime,
                'otp' => $otp,
                'name' => $name,
                'moblie_number' => $mobileNumber,
                'user_status' => 1,
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'OTP send Successfully!',
                'otp' => $otp,
                'name' => $name,
                'mobile_number' => $mobileNumber
            ]);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'OTP send Successfully!',
            'otp' => $otp,
            'name' => $name,
            'mobile_number' => $mobileNumber
        ]);
    }

    //This function will manage resend otp functionality
    public function resendOTP(Request $request)
    {
        $request->validate([
            'contact' => 'required|digits:10',
        ]);
        $contact = $request->contact;
        $otp = rand(100000, 999999);
        $data = [
            'sender' => 'ATVSTA',
            'destinations' => ['91' . $contact],
            'template_id' => '1707173433362677445',
            'params' => ['91' . $contact => ['otp' => $otp]],
        ];
        $response = $this->sendOTPRequest($data);
        $updateData = ['otp' => $otp];
        if (!empty($request->name)) {
            $updateData = ['name' => $request->name];
        }
        TblUserLogin::where('moblie_number', $contact)->update($updateData);
        return response()->json([
            'status' => 'success',
            'otp' => $otp,
            'message' => 'OTP resent successfully!',
            'contact' => $contact
        ]);
    }

    //This function will update the user mobile number
    public function changeNumber(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_name' => 'required|string|max:255',
            'mobile' => 'required|digits:10',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
        }
        $name = $request->input('customer_name');
        $newmobileNumber = $request->input('mobile');
        $existingmobileNumber = $request->input('prevcontact');
        $newMobileExists = TblUserLogin::where('moblie_number', $newmobileNumber)->first();
        if ($newMobileExists) {
            return response()->json([
                'status' => 'error',
                'message' => 'The new mobile number already exists. Please use a different number.'
            ]);
        }
        $existingUser = TblUserLogin::where('moblie_number', $existingmobileNumber)->first();
        if ($existingUser) {
            $otp = rand(100000, 999999);
            $data = [
                'sender' => 'ATVSTA',
                'destinations' => ['91' . $newmobileNumber],
                'template_id' => '1707173433362677445',
                'params' => ['91' . $newmobileNumber => ['otp' => $otp]],
            ];
            $response = $this->sendOTPRequest($data);
            $existingUser->update([
                'moblie_number' => $newmobileNumber,
                'name' => $name,
                'otp' => $otp
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Mobile number updated successfully!',
                'name' => $name,
                'mobile_number' => $newmobileNumber,
                'otp' => $otp
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'The previous mobile number does not exist in our records.'
            ]);
        }
    }

    public function verifyOTP(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6',
            'contact' => 'required|digits:10',
        ]);
        $otp = $request->otp;
        $contact = $request->contact;
        $user = TblUserLogin::where('moblie_number', $contact)->first();
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found.',
            ]);
        }
        if ($user->otp !== $otp) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid OTP, please try again.',
            ]);
        }
        Session::forget('tlocation_web');
        Session::put('user_logged_in', true);
        Session::put('user_contact', $contact);
        Session::put('user_name', $user->name);
        Session::put('user_location', $user->city);
        Session::put('user_email', $user->email_id);
        Session::put('login_id', $user->login_id);
        return response()->json([
            'status' => 'success',
            'message' => 'OTP verified successfully!',
        ]);
    }


    public function checkSession()
    {
        return response()->json([
            'is_logged_in' => Session::get('user_logged_in', false),
        ]);
    }

    public function logout()
    {
        session()->flush();
        session()->put('session_expired', false);
        return redirect('/');
    }


    private function sendOTPRequest($data)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Api-Key sUszpKAL.BGzNy8EDrfdGUhFuJNwN2dzBOTOE3Jqb',
            'Content-Type'  => 'application/json',
        ])->post('https://app.chat360.io/api/smsbot/otp', $data);

        return [
            'httpCode'  => $response->status(),
            'response'  => $response->body(),
        ];
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
