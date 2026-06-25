@extends('layouts.app')
@section('title', 'Chi tiết Task')
@section('page_title', 'Chi tiết việc cần làm')
@section('content')
<a href="{{route('task.index')}}"> <button class="bg-blue-500">Quay lại</button></a>
<p>
    <b>ID: {{$task->id}}</b>
</p>
<p><b>Title: </b>{{$task->title}}</p>
<p><b>Created_at: </b>{{$task->created_at}}</p>
@if($task->completed)
<span class="text-green-600 font-semibold">Đã hoàn thành</span>
@else
<span class="text-red-500 font-semibold">Chưa hoàn thành</span>
@endif
<p><b>Description: </b>{{$task->description}}</p>
<p><b>Long description: </b>{{$task->long_description}}</p>
@endsection