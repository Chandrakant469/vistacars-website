<?php

namespace App\Http\Controllers;

use App\Models\TblShowroomLocation;
use App\Models\TblShowroomAddress;
use App\Models\leadMasterUsed;

use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function contactUs(Request $request)
    {
        $title = 'Buy Car | Contact || Vistacars';
        $description = 'Buy Used Car from Vistacars in Mumbai, Navi Mumbai and Pune. Click here to contact us now.';
        $locations = TblShowroomAddress::select('city', 'location_name', 'address', 'contact', 'location_type')
            ->where('status', 1)
            ->whereIn('city', ['Mumbai', 'Navi Mumbai', 'Pune'])
            ->whereIn('location_type', ['Workshop', 'Pre Owned Cars'])
            ->orderBy('city', 'ASC')
            ->get()
            ->groupBy('city');
        return view('contact_us', compact('locations','title','description'));
    }

}
