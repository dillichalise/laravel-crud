<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{

    public function getListings()
    {
        return view('listing.list', [
            'lists' => Listing::latest()->filter(request(['tag', 'search']),)->paginate(5)
        ]);
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

    public function getMyLists()
    {
        return view('listing.manage', ['lists' => auth()->user()->listings]);
    }

    public function create()
    {
        return view('listing.add');
    }

    public function add(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['created_by'] = auth()->id();

        Listing::create($formFields);
        return redirect('/')->with('message', 'Listing created successfully');
    }

    public function edit(Listing $listing)
    {
        return view('listing.edit', ['listing' => $listing]);
    }

    public function update(Request $request, Listing $listing)
    {

        if ($listing->created_by != auth()->id()) {
            abort(403, 'Unauthorized Action!');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);
        return back()->with('message', 'Listing data updated successfully.');
    }
}
