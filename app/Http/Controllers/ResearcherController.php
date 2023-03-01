<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\Researcher;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ResearcherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $researchers = Researcher::paginate(8);
        return view('researchers.index', compact('researchers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculties = Faculty::all();
        $departments = Department::all();
        $classes = Classes::all();
        $teachers = Teacher::all();
        return view('researchers.create', compact('faculties', 'departments', 'classes', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { {
            $researcher = $request->all();
            //! fixed date
            // $realTimestampStart = substr($request->dob, 0, 10);
            // $researcher['dob'] = date('Y-m-d H:i:s', intval($realTimestampStart));

            // $realTimestampStart = substr($request->start_of_job, 0, 10);
            // $researcher['start_of_job'] = date('Y-m-d H:i:s', intval($realTimestampStart));

            $file1 = $request->file('photo');
            $photo = '';
            if (!empty($file1)) {
                $photo = time() . "." . $file1->getClientOriginalExtension();
                $file1->move('files/photos', $photo);
                $researcher['photo'] = $photo;
            }

            $file2 = $request->file('soft');
            $soft = '';
            if (!empty($file2)) {
                $soft = time() . "." . $file2->getClientOriginalExtension();
                $file2->move('files/softs', $soft);
                $researcher['soft'] = $soft;
            }

            Researcher::create($researcher);

            return redirect()->route('researchers.index')->with('swal-success', 'تحقیق کننده جدید با موفقیت اضافه شد.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function print()
    {
        $researchers = Researcher::paginate(8);
        return view('researchers.print', compact('researchers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $researcher = Researcher::FindOrFail($id);
        $faculties = Faculty::all();
        $departments = Department::all();
        $classes = Classes::all();
        $teachers = Teacher::all();
        return view('researchers.edit', compact('researcher', 'faculties', 'departments', 'classes', 'teachers'));
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
        $researcher = Researcher::FindOrFail($id);
        $inputs = $request->all();
        //! fixed date
        // $realTimestampStart = substr($request->dob, 0, 10);
        // $inputs['dob'] = date('Y-m-d H:i:s', intval($realTimestampStart));

        // $realTimestampStart = substr($request->start_of_job, 0, 10);
        // $inputs['start_of_job'] = date('Y-m-d H:i:s', intval($realTimestampStart));

        $file1 = $request->file('photo');
        $photo = '';
        if (!empty($file1)) {
            if (file_exists('files/photos/' . $researcher->photo)) {
                unlink('files/photos/' . $researcher->photo);
            }
            $photo = time() . "." . $file1->getClientOriginalExtension();
            $file1->move('files/photos', $photo);
            $inputs['photo'] = $photo;
        } else {
            $photo = $researcher->photo;
        }

        $file2 = $request->file('soft');
        $soft = '';
        if (!empty($file2)) {
            if (file_exists('files/softs/' . $researcher->soft)) {
                unlink('files/softs/' . $researcher->soft);
            }
            $soft = time() . "." . $file2->getClientOriginalExtension();
            $file2->move('files/softs', $soft);
            $inputs['soft'] = $soft;
        } else {
            $soft = $researcher->soft;
        }

        $researcher->update($inputs);

        return redirect()->route('researchers.index')->with('swal-success', 'تحقیق کننده با موفقیت ویرایش شد.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $researcher = Researcher::FindOrFail($id);
        $researcher->destroy($id);
        return redirect()->route('researchers.index')->with('swal-success', 'تحقیق کننده با موفقیت حذف شد.');
    }


    public function search(Request $request){
        $researchers = Researcher::where($request->search_by, $request->search)->paginate(8);
        return view('researchers.index', compact('researchers'));
    }

}
