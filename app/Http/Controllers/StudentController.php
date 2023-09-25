<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
class StudentController extends Controller
{
    public function view(){
        $data['alldata']=Student::all();
        return view('backend.student.view_student',$data);

    }

    public function add(){
        return view('backend.student.add_student');

    }

    public function store(Request $request){

        $validated = $request->validate([
            'name' => 'required',
            'roll' => 'required',
            'class' => 'required',
            'address' => 'required',
           
        ]);

        $data= new Student;
        $data->name=$request->name;
        $data->roll=$request->roll;
        $data->class=$request->class;
        $data->address=$request->address;

        if($request->hasFile('image')){
            $file= $request->file('image');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move('Backend/images/student/',$filename);
            $data->image=$filename;
        }
       
        $data->save();
        return redirect()->route('student.class.view')->with('message','Data Saved Successfully');
    }

    public function edit($id){
        $data['editData']=Student::find($id);
        return view('backend.student.add_student',$data);

    }

    public function update(Request $request,$id){
        
        $validated = $request->validate([
            'name' => 'required',
            'roll' => 'required',
            'class' => 'required',
            'address' => 'required',
        ]);
        $data=Student::find($id);
        $data->name=$request->name;
        $data->roll=$request->roll;
        $data->class=$request->class;
        $data->address=$request->address;

        if($request->hasFile('image')){
            $file= $request->file('image');
            @unlink('Backend/images/student/'.$data->image);
            $filename=time().'.'.$file->getClientOriginalExtension();    
            $file->move('Backend/images/student',$filename);
            $data->image=$filename;   
           }

        $data->save();
        return redirect()->route('student.class.view')->with('message','Data Update Successfully');
    }

    public function delete($id){
        $data=Student::find($id);
        $data->delete();
        return redirect()->route('student.class.view')->with('error','Data Delete Successfully');
    }
}
