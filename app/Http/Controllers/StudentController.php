<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        $students = DB::table('students')
            ->join('faculties', 'students.faculty_id', '=', 'faculties.id')->select('students.*', 'faculties.faculty_name')->get();

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $students = Student::all();
        $students = DB::table('faculties')
            ->select('faculties.id', 'faculties.faculty_name')->get();
        return view('students.create', compact('students'));
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
            'student_name' => 'required|unique:students|max:255',
            'image' => 'required|mimes:jpeg,jpg,png,gif',
            'birthday' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'gender'   => 'required',
            'faculty_id'  => 'required',
        ]);

        $input = $request->all();

        $id = Student::create($input)->id;
        $student = new Student;
        $student->student_name = $request->student_name;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/students/', $filename);
            $student->image = $filename;
        }

        $student->birthday = $request->birthday;
        $student->address = $request->address;
        $student->phone_number = $request->phone_number;
        $student->gender = $request->gender;
        $student->faculty_id = $request->faculty_id;
        if (count($request->mark) > 0) {
            foreach ($request->mark as  $item => $v) {
                $data = array(

                    'student_id' => $id,
                    'subject_id' => $request->subject_id,
                    'mark' => $request->mark[$item]
                );
            }
        }

        Mark::insert($data);
        return redirect()->route('student.index')->with('success', 'Student Image has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        return view('students.show')->with('students', $student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('students.edit', compact('student'));
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
            'student_name' => 'required|max:255',
            'image' => 'mimes:jpeg,jpg,png,gif',
            'birthday' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'gender'   => 'required',
            'faculty_id'  => 'required'
        ]);

        $student = Student::find($id);
        // $student = new Student;
        // $input = $request->all();
        $student->student_name = $request->student_name;

        if ($request->hasfile('image')) {
            $destination = 'uploads/students/' . $student->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/students/', $filename);
            $student->image = $filename;
        }
        $student->birthday = $request->birthday;
        $student->address = $request->address;
        $student->phone_number = $request->phone_number;
        $student->gender = $request->gender;
        $student->faculty_id = $request->faculty_id;
        $student->update();
        return redirect()->route('student.index')->with('success', 'Student Image Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $destination = 'uploads/students/' . $student->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $student->delete();
        return redirect()->route('student.index')->with('success', 'Student Image Deleted Successfully');
    }
}
