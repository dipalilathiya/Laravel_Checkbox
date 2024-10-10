
@extends('layout.header')
@section('demo')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
      .i1{
        width: 400px;
        margin: auto;
        margin-top:200px;
        height: 400px;
        border-radius:40px;
        /* border: 6px solid rgb(183, 183, 183); */
        background-color: thistle;
        box-shadow:-5px -5px 20px -5px rgb(86, 85, 85) ;
      }
      .i2{
        width: 300px;
        height: 395px;
        border: 1px solid thistle;
        margin: auto;
      }
</style>
<body>
    <div class="i1">
    <form  method="POST" enctype="multipart/form-data" action="{{route('create')}}">
        @csrf
        <div class="i2">
          <input type="hidden" name="id" value="{{@$edit->id}}">
        <p>Name</p>
        <input type="text" name="name" placeholder="name"    value="{{ isset($edit) ? $edit->name : '' }}">
        <p>Gender</p>
          <input type="radio"  name="gender" value="male"{{ isset($edit) ? ($edit->gender == 'male' ? 'checked' : "") : "" }}>
          <label>Male</label><br>
          <input type="radio" name="gender" value="female"{{ isset($edit) ? ($edit->gender == 'female' ? 'checked' : "") : "" }}>
          <label >Female</label><br>
        <p>Hobby</p>
        <input type="checkbox" name="checkbox[]" value="music"{{ isset($edit) ? (in_array('music',$hb) ? 'checked' : "") : "" }}  value="">
        <label for="vehicle1"> Music</label><br>
        <input type="checkbox" name="checkbox[]" value="criket"{{ isset($edit) ? (in_array('criket',$hb) ? 'checked' : "") : "" }}>
        <label for="vehicle2">Criket</label><br>
        <input type="checkbox" name="checkbox[]" value="reading"{{ isset($edit) ? (in_array('reading',$hb) ? 'checked' : "") : "" }}>
        <label for="vehicle3">Reading </label><br><br>
        <p>City</p>
        <select name="city">
          <option value="">Select City</option>
            @foreach($city as $value)
              <option value="{{$value->id}}">{{$value->city_name}}</option>
            @endforeach
          </select>
          <input type="file" name="img"  value="{{ isset($edit) ? $edit->img : '' }}">
          <input type="submit" name="submit">
        </div>
    </form>
</div>
</body>
</html>
@endsection