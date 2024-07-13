<?php

namespace App\Http\Controllers;

use App\Models\FamilyMember;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FamilyMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = FamilyMember::all();
        dd(json_decode(json_encode($members)));
        return view('pages.family', [
            "family" => $members
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $members = FamilyMember::all();
        return view('pages.family-create', [
                "family" => $members
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Is this method exposed to everyone??
        $data = $request->validate([
            'name' => 'required|max:255',
            'gender' => 'string|nullable',
            'mid' => 'integer|nullable',
            'fid' => 'integer|nullable',
            'dob' => 'required|date',
        ]);

        $data['dob'] = Carbon::parse($data['dob'])->format('Y-m-d');

        FamilyMember::create($data);

        return true;
    }

    /**
     * Display the specified resource.
     */
    public function show(FamilyMember $member)
    {
        $members = FamilyMember::all();
        return view('pages.family-show', [
                "family" => $members,
                "member" => $member
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FamilyMember $member, Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'gender' => 'string|nullable',
            'mid' => 'integer|nullable',
            'fid' => 'integer|nullable',
            'dob' => 'required|date',
        ]);

        // dd($member, $data);
        $member->update($data);

        return true;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FamilyMember $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FamilyMember $member)
    {
        //
    }
}
