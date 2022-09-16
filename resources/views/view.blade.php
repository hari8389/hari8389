
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
      
    @foreach ($contact as $details)
            
             
      <th scope="row">{{ $details->id}}</th>
      <td>{{ $details->name}}</td>
      
       <td>view</td>
       <td><a href="/profile/{id}">Profile</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
            



