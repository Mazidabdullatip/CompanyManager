<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:companies',
            'email' => 'required|email|unique:companies',
            'logo' => 'required|image|dimensions:min_width=100,min_height=100',
            'website' => 'required|url',
        ]);

        $validated['logo'] = $request->file('logo')->store('logos', 'public');

        Company::create($validated);

        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    }

    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        $validated = $request->validate([
            'name' => ['required', Rule::unique('companies')->ignore($company->id)],
            'email' => ['required', 'email', Rule::unique('companies')->ignore($company->id)],
            'logo' => 'nullable|image|dimensions:min_width=100,min_height=100',
            'website' => 'required|url',
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('logos', 'public');
        } else {
            $validated['logo'] = $company->logo;
        }

        $company->update($validated);

        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }
}



