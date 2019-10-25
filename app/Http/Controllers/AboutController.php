<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{

    public function index()
    {
        $about = About::first();
        if (!empty($about)) {
            $mediaItems = $about->getMedia('image');
            $publicFullUrl = $mediaItems[0]->getFullUrl();

            $about = $about->toArray();
            $about['img_url'] = $publicFullUrl;
        }

        return view('web.pages.about',['about'=>$about]);
    }

}
