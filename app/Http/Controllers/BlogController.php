<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TblBlog;

class BlogController extends Controller
{
    public function blog(Request $request)
    {
        $title = 'Blog || Vistacars';
        $description = 'Check the Blogs Vistacars has recently shared. Visit www.vistacars.in to check car models. Hyundai, Tata, Ford, Honda, Maruti Suzuki, Toyota.';
        $keywords = 'upcoming cars, new cars, used cars, pre-owned cars, old cars, renew car insurance, maruti suzuki cars, buy car online, car blogs, car articles';
        $blogs = TblBlog::where('status', 1)
        ->get();

        // echo"<pre>";print_r($blogs);die();

        return view('blog', compact('blogs','title','description','keywords'));
    }
}
