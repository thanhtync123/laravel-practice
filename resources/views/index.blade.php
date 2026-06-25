@extends('layouts.app')

@section('title', 'Danh sách Task')
@section('page_title', 'Danh sách việc cần làm')
@section('content')
<a href="{{route('task.create')}}"><button>Tạo mới</button></a>

@if(session('success'))
<p class="success">{{ session('success') }}</p>
@endif
@foreach($tasks as $item)
<p>
    <b>ID:</b>
    {{$item->id}}
    <a href="{{route('task.show',$item->id)}}">
        <button class="bg-blue-500">
            Xem chi tiết
        </button>
    </a>
    <a href="{{route('task.edit',$item->id)}}"> <button>Sửa</button></a>
<form action="{{route('task.delete',$item->id)}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Xóa</button>
</form>
<form action="{{route('task.toggle-completed',$item->id)}}" method="POST">
    @csrf
    @method('PUT')
    <button type="submit">{{ $item->completed ? 'Đánh dấu chưa hoàn thành' : 'Đánh dấu hoàn thành' }}</button>
</form>


</p>
<p><b>Title: </b>{{$item->title}}</p>
<p><b>Created_at: </b>{{$item->created_at}}</p>
<p><b>Completed: </b>{{$item->completed == 1 ? 'Đã xong' : 'Chưa xong'}}</p>
@endforeach
{{ $tasks->links() }}
@endsection