<h1>hello</h1>


   <a href="tasks/create">create blog</a>
 <table border="1">   <thead>
<tr>
      <th>id</th>
       <th>title</th>
       <th>description</th>
       <th>action</th>
      </tr>
       </thead>

   <tbody>
   	  @foreach($tasks as  $tsk)
    <tr>   <td>{{ $tsk['id']}}</td>
       <td>{{$tsk['title']}}</td>
       <td>{{$tsk['description']}}</td>

       <td><a href={{ asset("tasks/".$tsk['id']) }} >edit  </a>
           <a href={{( $tsk['id'])}}>delete</a></td>
   </tr>

             @endforeach
       </tbody>
</table>
 