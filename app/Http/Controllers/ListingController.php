<?php

namespace App\Http\Controllers;

use App\Models\Listing;


class ListingController extends Controller
{

    public function getListings()
    {
        return view('listing.list', ['lists' => Listing::all()]);
    }

    public function getOne(Listing $id)
    {
        return view('listing.show', ['listing' => $id]);
    }

    public function delete(Listing $list)
    {
        // Check if the user logged in created this listing.
        if ($list->created_by != auth()->id()) {
            abort(403, 'Unauthorized Action!');
        }

        $list->delete();
        return redirect('/')->with('message', 'List deleted successfully.');
    }
}
