<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

@include('teacher.style')

<!--************************* modal for  add student *************************************-->
<div class="py-12">
   
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               
      <table class="table">
                 
      <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  ADD STUDENT
</button>

<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3>Add Student</h3>
      </div>
      <div class="modal-body">
      <form action="/addstudent" method="POST" class="form-container" enctype="multipart/form-data">
      @csrf
      <h3>Name:</h3>
      <input type="text" placeholder="Enter Student name"  name="student_name" value=""   required autofocus>
      <h3>image:</h3>
      <input type="file" name="gallery"  required="required">
      <h3>Date Of Birth:</h3>
      <input type="date" name="date_of_birth"   required="required">
      
      <input type="hidden" placeholder="Enter class name" name="std_id" value="{{ request()->id}}" required>
       <!-- <input type="submit" class="btn btn-primary" data-dismiss="modal" name="submit" > -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
</form>
</div>
    </div>
  </div>
</div>
<!--****************************************** end of add student model*********************************** -->



<!--************************* modal for  edit student *************************************-->
<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3>Student Edit</h3>
      </div>
      <div class="modal-body">
      <form class="row g-3 needs-validation"  action="/updatestudent/{$id}" method="post"  enctype="multipart/form-data">
      @csrf
    
      <input type="hidden" name="id" id="sid" value="">
       <input type="hidden" placeholder="Enter class name" id="std_i" name="std_id"  required>
       <h5>Name:</h5>
       <input type="text" placeholder="Enter Student name" id="student_nam" name="student_name"   required>
      <br>
       <h5>Date Of Birth:</h5>
       <input type="date" placeholder="Enter the date of birth" id="date_of_birt" name="date_of_birth" required>
       <!-- <input type="file" placeholder="upload image file" id="galler" name="gallery"   required>  -->
       
       @if($students->gallery)
               <img src="{{ url ('storage/app/public'.$students->gallery ) }}" alt="">
               @else
               <p> image found</p>
               @endif
              <input type="file" name="gallery" placeholder="" value="{{ url ('storage/app/public'.$students->gallery ) }}" >
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"  data-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-primary" name="submit">Save changes</button> 

</form>
</div>
    </div>
  </div>
</div> 

<!--****************************************** end of edit student model*********************************** -->

<!-- *************************************** table listing of student **************************************   -->
   <thead class="thead-dark">
   <h3 style="text-align: center;">Students Name</h3>
   <tr style="text-align:center">
       
       <th scope="col">@sortablelink('id','ID')</th>
       <th scope="col">@sortablelink('student_name','Name')</th>
       <th scope="col">DOB</th>
       <th scope="col">profile</th>
       <th scope="col">Update</th>
       <th scope="col">Remove</th>
     </tr>
  </thead>
    <tbody> 
      <tr >
       @if(!empty($students))  
       @foreach ($students->getstudent as $details)
       <td>{{$details->id}} </td>
       <td>{{$details->student_name}} </td>
       <td>{{$details->date_of_birth}} </td>
       <td scope="col"><img src="../storage/{{$details['gallery']}}" width="50" height="50" class="img img-response" alt=""></td>
       <td>
       <!-- <form action="/editstudent/{details->id}" role="form" method="get" class="form-container" enctype="multipart/form-data"> -->
          <button type="button" class="btn btn-success editbtn btn-sm" value="{{$details->id}}" style="width: 50%;" data-toggle="modal" >Edit</button>
               
       <!-- </form> -->
       </td>
       <td >
        <form action="/destroy/{$id}" id="id" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="id" name="id" value="{{$details->id}}">
                <input type="hidden" id="std_id" name="std_id" value="{{$details->std_id}}">
                <button type="submit" data-toggle="modal"  class="btn btn-sm delete btn-danger" value="{{$details->id}}">Delete</button>
            </div>
            </form>
        </td>
         </tr>
    @endforeach
    
  
  @endif
 
  {{ $students->paginate(10)  }}
   </tbody>
</table>

<!--**************************************** end of table listing *********************************************-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>


    

    <!-- ********************************************script for edit student************************************** -->
    <script >
      $(document).ready(function(){
        $(document).on('click','.editbtn',function(){
         var id=$(this).val();
         $('#editModal').modal('show');
         $.ajax({ //create an ajax request to display.php
                    type: "GET",
                    url: "/editstudent/"+id,
                     //expect html to be returned                
                    success: function (response) {
                      $('#student_nam').val(response.students.student_name);
                      // $('#galler').val(response.students.gallery );
                      $('#date_of_birt').val(response.students.date_of_birth);
                      $('#std_i').val(response.students.std_id);
                        $('#sid').val(response.students.id);
                        console.log(response.students);
                    }
                    });
        });
      });

    // **********************************script for  delete ***********************************************  
    </script>

    <script>
     $(document).on('click','.delete',function(){
              id = $(this).attr('id');
             $('#id').val(id);
        });
    </script>

           
            



