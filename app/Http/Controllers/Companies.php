<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\Response;

class Companies extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null)
    {
        if ($id == null) {
            return Company::orderBy('created_at', 'desc')->get();
        } else {
            return $this->show($id);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $company = new Company;

        $company->name = $request->input('name');
        $company->contact_number = $request->input('contact_number');
        $company->field = $request->input('field');
        $company->save();

        return response()->json([
            'success' => 'Company record successfully created',
            'company_id' => $company->id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        return Company::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $company = Company::find($id);

        $company->name = $request->input('name');
        $company->contact_number = $request->input('contact_number');
        $company->field = $request->input('field');
        $company->save();

        return "Sucess updating company #" . $company->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        $company = Company::find($id);

        $company->delete();

        return "Company successfully deleted #" . $request->input('id');
    }
}
