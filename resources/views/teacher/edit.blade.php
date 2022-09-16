
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="form-popup"  style="background: aquamarine;">
    
     <form class="row g-3 needs-validation"  novalidate action="/updatestudent/{{$students->id}}" method="post"  enctype="multipart/form-data">
     @csrf
       <h1>Edit Students</h1>

     
       <input type="text" placeholder="Enter Student name" name="student_name" value="{{$students->student_name}}"  style="background: aquamarine;" required autofocus>
       <input type="text" placeholder="Enter class name" name="id" value="{{$students->id}}" required>
       <input type="text" placeholder="Enter class name" name="std_id" value="{{$students->std_id}}" required>
       <!-- <input type="submit" value="updateStudent" name="submit" class="btn"> -->
       <div class="col-12 pt-4">
       <button class="btn btn-primary"   type="submit" value="Submit">Submit form</button>
       </div>
</form>
      </div> 
</body>
</html>
