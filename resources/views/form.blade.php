@extends('layouts.app')
@section('title', isset($task)?'Sửa Task':'Tạo Task')
@section('page_title', isset($task)?'Sửa Task':'Tạo Task')
@section('content')

<form action="{{ isset($task) ? route('task.update',$task->id) :route('task.store') }}" method="POST">
    @csrf
    @isset($task)
        @method('PUT')
    @endisset
    Title:<input type="text" name="ipt_title" value="{{old('ipt_title',$task->title??'')}}"> <br>
    @error('ipt_title')
    <p class="error">{{$message}}</p>
    @enderror
    Description:<input type="text" name="ipt_description" value="{{ old('ipt_description', $task->description ?? '') }}">
    @error('ipt_description')
    <p class="error">{{$message}}</p>
    @enderror <br>
    Long description:<textarea name="ta_longdescription">{{old('ta_longdescription',$task->long_description??'')}}</textarea>
    @error('ta_longdescription')
    <p class="error">{{$message}}</p>
    @enderror <br>
    <button type="submit">Submit</button>
</form>
@endsection