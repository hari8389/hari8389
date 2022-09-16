<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
@include('teacher.style')


    <!-- <div class="py-12">
   
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

               
                <table class="table">
                <button class="open-button" onclick="openForm()">ADD CLASS</button>

    <div class="form-popup" id="myForm" style="background: aquamarine;">
    <form action="/addclass" method="POST" class="form-container" style="background: aquamarine;">
    @csrf
     <h1>Add Class</h1>

    
       <input type="text" placeholder="Enter class name" name="class_name" required style="background: aquamarine;" >
       <input type="hidden" placeholder="Enter class name" name="teacher_id" value="{{ request()->id}}" required>
   
       <input type="submit" name="Submit" class="btn">
       <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div> -->

<!-- *****************************************add class model ******************************-->

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
        <h3>class Add</h3>
      </div>
      <div class="modal-body">
      <form action="/addclass" method="POST" class="form-container" enctype="multipart/form-data">
      @csrf

      <input type="text" placeholder="Enter Class name" id="class_name" name="class_name" value=""   required autofocus>
       <input type="hidden" placeholder="Enter class name" name="teacher_id" value="{{ request()->id}}" required>
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









<!-- end of class model -->


  <thead>
    <h3 style="text-align: center;">Class Details</h3>
    <tr style="text-align: center;">
       
      <th scope="col">Class Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  
      <tr style="text-align: center;">
       @if(!empty($clas))   
      @foreach ($clas->getclass as $details)
    <td>{{$details->class_name}} </td>
    <td><a href="/viewstudents/{{$details->id}}">student list</a></td>
      </tr>
      @endforeach
    @endif
    {!! $clas->paginate(2) !!}
     </tbody>
</table>
 <script>
    function openForm() {
     document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
      document.getElementById("myForm").style.display = "none";
     }
</script>
            



