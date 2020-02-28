
{!!Form::open(['route'=>'tasks.store'])!!}

{!!Form::label('title','Title')!!}
{!!Form::text('title')!!}
<br>
{!!Form::label('description','Description')!!}
{!!Form::text('description')!!}
<br>
{!!Form::submit('submit')!!}


{!! Form::close() !!}
