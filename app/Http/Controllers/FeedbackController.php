<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use App\Feedback;
use App\Http\Requests;

class FeedbackController extends Controller
{

    public function show() {
        return Feedback::orderBy('id', 'asc')->get();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function findEmployeeFeedback($id) {
        $employees = Feedback::find($id)->employee;

        if ($employees) {
            return $employees;
        } else {
            return response()->json(['error' => 'Id does not exist']);
        }
    }
    public function findFeedbackEmployee($id) {
        $feedbacks = Employee::find($id)->feedbacks;
        if ($feedbacks) {
            return $feedbacks;
        } else {
            return response()->json(['error' => 'Id does not exist']);
        }
    }
}
