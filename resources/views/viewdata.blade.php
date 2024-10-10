 @extends('layout/header')
 @section('demo')
 <form action="{{route('search')}}"  method="get" enctype="multipart/form-data">
   <input type="text" name="search">
   <button type="submit" name="submit">Search</button>
   {{-- <button><a href="{{route('back')}}">Back</a></button> --}}
</form>
<table border="1">
   <tr>
       <th>Name</th>
       <th>gender</th>
       <th>chekbox</th>
       <th>city</th>
       <th>img</th>
       <th>edit</th>
       <th>delete</th>
   </tr>
   @foreach ($data as $value)
   <tr>
             <td>{{$value->name}}</td>
             <td>{{$value->gender}}</td>
             <td>{{$value->checkbox}}</td>
             <td>{{$value->connect ? $value->connect->city_name : ""}}</td>
             <td>
                <img src="{{ asset('image/'.$value->img) }}" alt="" width="50px" height="50px">
             </td>
             <td><button><a href="{{route('edit', $value->id)}}">edit</a></button></td>
             <td><button><a href="{{route('delete', $value->id)}}">delete</a></button></td>
   </tr>
   @endforeach
      </table> 
      {!! $data->links() !!}
   @endsection

      