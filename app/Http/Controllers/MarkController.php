<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mark;
use Illuminate\Support\Facades\DB;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marks = Mark::all();
        $marks = DB::table('student_subject')
            ->join('students', 'student_subject.student_id', '=', 'students.id')
            ->join('subjects', 'student_subject.subject_id', '=', 'subjects.subject_id')->select('student_subject.*', 'students.student_name', 'subjects.subject_name')->get();
        return view('marks.index')->with('marks', $marks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marks = Mark::all();
        $marks = DB::table('subjects')
            ->select('subjects.subject_id', 'subjects.subject_name')->get();
        return view('marks.create')->with('marks', $marks);
        // return view('marks.create')->with();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'student_id' => 'required',
            'subject_id' => 'required',
            'mark' => 'required',
        ]);
        $mark = new Mark();
        $mark->student_id = $request->input('student_id');
        $mark->subject_id = $request->input('subject_id');
        $mark->mark = $request->input('mark');
        $mark->save();
        return redirect()->route('mark.index')
            ->with('success', 'Mark has been updated successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mark = Mark::find($id);
        return view('marks.show')->with('marks', $mark);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mark = Mark::find($id);

        return view('marks.edit')->with('marks', $mark);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required',
            'subject_id' => 'required',
            'mark' => 'required',
        ]);
        $mark = Mark::find($id);
        $input = $request->all();
        // $mark = new Mark();
        $mark->student_id = $request->input('student_id');
        $mark->subject_id = $request->input('subject_id');
        $mark->mark = $request->input('mark');

        $mark->update($input);
        return redirect()->route('mark.index')->with('success', 'Mark has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mark::destroy($id);
        return redirect()->route('mark.index')
            ->with('success', 'Mark has been deleted successfully');
    }
}
