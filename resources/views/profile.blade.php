
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


    <div class="py-12">
   
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               
                <table class="table">
  <thead>
    <tr>
       
      <th scope="col">ID</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      
      <th scope="col">Phone </th>
      <th scope="col">Actions </th>
    </tr>
  </thead>
  <tbody>
    <tr>
    @if(!empty($contacts))
    @foreach ($contacts as $details)       
     
      <td>{{ $details->getCompany->name}}</td>    
    </tr>
    @endforeach
    @endif
  </tbody>
</table>
            



