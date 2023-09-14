<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Company::all();
        return view('company.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        $logoPath = $request->file('logo')->store('public');
        $company = Company::create($data);
        $company->email = $request->input('email');
        $company->website = $request->input('url');
        $company->logo = $logoPath;
        if ($company->save()) {
            return redirect()->route('companies.company.index');
        }
        return back()->withErrors([
            'name' => 'Name is required.'
        ])->onlyInput('name');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company = Company::find($id);
        return view('company.show', ['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = Company::find($id);
        return view('company.edit', ['data' => $company]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $company = Company::find($id);
        $data = $request->validate([
            'name' => 'required',
        ]);
        $company->update($data);
        $company->email = $request->input('email');
        $company->website = $request->input('url');
        if ($request->file('logo')) {
            $logoPath = $request->file('logo')->store('public');
            $company->logo = $logoPath;
        }
        if ($company->save()) {
            return redirect()->route('companies.company.index');
        }
        return back()->withErrors([
            'name' => 'Name is required.'
        ])->onlyInput('name');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Company::find($id)->delete()) {
            return redirect()->route('companies.company.index');
        }
    }
}
