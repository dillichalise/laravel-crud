<?php

namespace App\Http\Controllers;

use App\Models\Listing;


class ListingController extends Controller
{

    public function getListings()
    {
        return view('listing.list', ['lists' => Listing::all()]);
    }
}
