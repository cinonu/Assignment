 <table class="table table-bordered">
        <tr>
            
            
            <th>role</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($roles as $role)
        <tr>
          
            <td>{{ $role->role_name }}</td>
            <td>
                <form action="{{ route('role.destroy',$product->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('role.show',$role->role_id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('role.edit',$role->role_id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  