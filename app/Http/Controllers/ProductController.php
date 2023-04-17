<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{


    public function index(Request $request): View
    {
        return view('product.product',[
            'user' => $request->user(),
        ]);
    }
    public function create(Request $request)
    {
            return view('product.layouts.create-product-form',[
                'user' => $request->user(),
            ]);
    }
    public function store()
    {

    }
    public function update()
    {

    }
    public function destroy()
    {

    }

}
