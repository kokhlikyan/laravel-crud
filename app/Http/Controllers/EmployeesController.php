<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employeer;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employeer::paginate(10);
        return view('employees.index', ['data' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        return view('employees.create', ['companies' => $companies]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'company_id' => 'required',
        ]);
        $employeer = Employeer::create($data);
        if ($employeer->save()) {
            return redirect()->route('companies.company.employee.index');
        }
        return back()->withErrors([
            'first_name' => 'First name is required.',
            'last_name' => 'Last name is required.',
            'company_id' => 'Company  is required.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $companies = Company::all();
        $employeer = Employeer::find($id);
        return view('employees.edit', ['companies' => $companies, 'employeer' => $employeer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $employeer = Employeer::find($id);

        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);
        $employeer->update($data);
        $employeer->company_id = $request->input('company_id');
        if ($employeer->save()) {
            return redirect()->route('companies.company.employee.index');
        }
        return back()->withErrors([
            'first_name' => 'First name is required.',
            'last_name' => 'Last name is required.',
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Employeer::find($id)->delete()) {
            return redirect()->route('companies.company.employee.index');
        }
    }
}
