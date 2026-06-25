<?php

namespace App\Http\Controllers;
use App\Models\TblFaqs;

use Illuminate\Http\Request;

class FaqsController extends Controller
{
    public function faqs(Request $request)
    {

        $title = 'Buy Car | Vistacars | FAQs |';
        $description ='Check the FAQs Vistacars has shared for your knowledge. Buy Used Car from Vistacars in Mumbai, Navi Mumbai and Pune.';
        $keywords = 'frequently asked questions, faqs';
        $faqs = TblFaqs::where('faq_status', 1)
        ->get();

        return view('faq', compact('faqs','title','description','keywords'));
    }
}
