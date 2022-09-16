<?php

namespace App\Http\Controllers;
use App\Models\Teacher;
use App\Models\Std;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Support\Facades\File;
class FrontendController extends Controller
{
    
    public function teacherlist()//list of all  Teachers
    {
        $teacher = Teacher::paginate(2);
        return view ('teacher.view', ['teacher' => $teacher]);
    }
    public function viewclass($id)//list of classes
    {
       
       
        $clas = Teacher::with('getclass')->find($id);
        $clas->load(['getclass' => function ($q) {
            $q->orderBy('id', 'desc')->paginate(4);
        }]);
        
        return view('teacher.profile',compact('clas'));
    }
    public function viewstudents($id)//list of students
    {
       
        $students = Std::with('getstudent')->find($id);
        return view('teacher.students',compact('students'));
    }
  
    public function addclass(Request $request)//insert new class
    {
    
        $request->validate([
            'class_name' => ['required', 'string', 'max:255'],
        ]);
        $clas =Std::Create(
            ['class_name' => $request->class_name,
            'teacher_id'=>$request->teacher_id]
        );
            if($clas->save())
            {
                return redirect('/viewclass/'.$request->teacher_id);
            }
            else
            {
                echo "fail";exit;
            }

    }
    public function addstudent(Request $request )//insert new student
    {
        
        $request->validate([
            'student_name' => ['required', 'string', 'max:255'],
        ]);    
        if ($request->hasFile('gallery')) {
            $extension = $request->file('gallery')->getClientOriginalExtension();
            $fileNameToStore = time() . '.' . $extension;
            $pathToStore = $request->file('gallery')->storeAs('public', $fileNameToStore);
        } else {
            if (empty($product)) {
                $fileNameToStore = 'noImage.png';
            } else {
                $fileNameToStore = $product->gallery;
            }
        }
        $students =Student::Create(
            ['student_name' => $request->student_name,
            'gallery' => $fileNameToStore,
            'date_of_birth'=>$request->date_of_birth,
            'std_id'=>$request->std_id]
        );
         
        // echo $students;
        if($students->save())
        {
            // echo "done";
            
            // return redirect()->route('addstudent');
            return redirect('/viewstudents/'.$request->std_id);
        }
        else
        {
            echo "fail";exit;
        }
            // echo $prfl;
     // return redirect()->route('addstudent');
    }        
    public  function editstudent($id)  
        {
            $students = Student::find($id);
            // return view('teacher.students',['students'=>$students]); 
            return response()->json([
               'status'=> 200,
               'students'=> $students,
            ]);
        }     
    public function updatestudent(Request $request,$id)
    {
       
        $id= $request->input('id');
       
        $students = Student::find($id);
        $students->std_id=$request->std_id;
        $students->student_name=$request->student_name;
        $students->date_of_birth=$request->date_of_birth;
        if ($request->hasFile('gallery')) {
            $extension = $request->file('gallery')->getClientOriginalExtension();
            $fileNameToStore = time() . '.' . $extension;
            $pathToStore = $request->file('gallery')->storeAs('public', $fileNameToStore);
        } else {
            $fileNameToStore = Student::find($id)->gallery;
        }
           
            
            // $students->image=$request->input('image');
            // echo $students;exit();
            $students->gallery=$fileNameToStore;
            $students->save();
           return redirect('/viewstudents/'.$request->std_id);
           return response()->json([
            'status'=> 200,
            'students'=> $students,
         ]);
        
        }



    public function destroy(Request $request,$std_id)
    {  
        
        $id=$request->input('id');
        $std_id=$request->input('std_id');
        $student=Student::find($id);
        $student->std_id=$request->std_id;
        $student->destroy($id);
        
        return redirect('/viewstudents/'.$std_id);
       
    }
  
}