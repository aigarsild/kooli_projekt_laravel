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

    public function store(Request $request) {
        $feedback = new Feedback;

        $feedback->employee_id = $request->input('employee_id');
        $feedback->personal_tags = $request->input('personal_tags');
        $feedback->professional_tags = $request->input('professional_tags');
        $feedback->rate_person = $request->input('rate_person');
        $feedback->rate_profession = $request->input('rate_profession');
        $feedback->worker_description = $request->input('worker_description');
        $feedback->personal_description = $request->input('personal_description');
        $feedback->professional_feedback = $request->input('professional_feedback');
        $feedback->personal_feedback = $request->input('personal_feedback');
        $feedback->sociable = $request->input('sociable');
        $feedback->creepy = $request->input('creepy');
        $feedback->awesome = $request->input('awesome');
        $feedback->save();

        return 'Feedback record successfully created with id ' . $feedback->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, $id) {
        $employee = Feedback::find($id);

        $employee->delete();

        return "Feedback record successfully deleted #" . $request->input('id');
    }
}
