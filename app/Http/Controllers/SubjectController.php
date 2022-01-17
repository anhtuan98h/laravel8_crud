<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Http\Validator;
use Symfony\Component\Console\Input\Input;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::paginate(5);
        return view('subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subjects.create');
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
            'subject_name' => 'required|unique:subjects|max:255'
        ]);
        $subject = new Subject();
        $subject->subject_name = $request->input('subject_name');
        $subject->save();
        return redirect()->route('subject.index')
            ->with('success', 'Subject has been updated successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subject = Subject::find($id);
        return view('subjects.show')->with('subjects', $subject);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject = Subject::find($id);
        return view('subjects.edit')->with('subjects', $subject);
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
        // $request->validate([
        //     'faculty_name' => "required|unique:faculties,faculty_name,$id"
        // ]);
        // $faculty = Faculty::findOrFail($id);
        // // $faculty = new Faculty;
        // $input = $request->all();
        // $faculty->faculty_name = $request->faculty_name;
        // $faculty->update($input);
        // return redirect()->route('faculty.index')->with('success', 'Faculty has been updated successfully.');

        $request->validate([
            'subject_name' => 'required|unique:subjects,subject_name'
        ]);
        $subject = Subject::find($id);
        $input = $request->all();
        $subject->subject_name = $request->input('subject_name');
        $subject->update($input);
        return redirect()->route('subject.index')->with('success', 'Subject has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subject::destroy($id);
        return redirect()->route('subject.index')
            ->with('success', 'Subject has been deleted successfully');
    }
}
