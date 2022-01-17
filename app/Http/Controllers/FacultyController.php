<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Http\Validator;
use Symfony\Component\Console\Input\Input;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculties = Faculty::paginate(5);
        return view('faculties.index')->with('faculties', $faculties);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faculties.create');
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
            'faculty_name' => 'required|unique:faculties|max:255'
        ]);
        $faculty = new Faculty();
        $faculty->faculty_name = $request->input('faculty_name');
        $faculty->save();
        return redirect()->route('faculty.index')
            ->with('success', 'Faculty has been updated successfully.');
        // return redirect('faculty')->with('flash_message', 'Faculty Addedd!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $faculty = Faculty::find($id);
        return view('faculties.show')->with('faculties', $faculty);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faculty = Faculty::find($id);
        return view('faculties.edit')->with('faculties', $faculty);
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
            'faculty_name' => "required|unique:faculties,faculty_name,$id"
        ]);
        $faculty = Faculty::findOrFail($id);
        // $faculty = new Faculty;
        $input = $request->all();
        $faculty->faculty_name = $request->faculty_name;
        $faculty->update($input);
        return redirect()->route('faculty.index')->with('success', 'Faculty has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Faculty::destroy($id);
        return redirect()->route('faculty.index')
            ->with('success', 'Faculty has been deleted successfully');
    }
}
