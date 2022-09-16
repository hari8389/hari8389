
<style>
table, td, th {
  border: 1px solid black;
}

table {
  border-collapse: collapse;
  width: 100%;
}

td {
  text-align: center;
}
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">

    <div class="py-12">
   
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               
                <table class="table">
  <thead>
    <h3 style="text-align:center;">Teacher List</h3>
    <tr style="text-align: center;">
       
      <th scope="col">ID</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      
      <th scope="col">Phone </th>
      <th scope="col">Actions </th>
    </tr>
  </thead>
  <tbody>
    <tr style="text-align: center;">
      
    @foreach ($teacher as $details)
            
             
      <th>{{ $details->id}}</th>
      <td>{{ $details->firstname}}</td>
      <td>{{ $details->lastname}}</td>
     
      <td>{{ $details->phone}}</td>
       <td><a href="/viewclass/{{$details->id}}">class</a></td>
       </tr>
    
    @endforeach
    {{ $teacher->render() }}
  </tbody>
  
</table>
            



