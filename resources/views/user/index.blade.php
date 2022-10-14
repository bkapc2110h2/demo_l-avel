@extends('layouts.admin')
@section('title', 'Quản lý danh mục')
@section('main')
<form action="{{ route('user.store') }}" method="POST" role="form">
    <legend>Form title</legend>
    @csrf
    <div class="form-group @error('name') has-error @enderror">
        <label for="">Họ tên</label>
        <input type="text" class="form-control" name="name" placeholder="Input name">
        @error('name') <div>{!!$message!!}</div> @enderror
    </div>
    <div class="form-group @error('text') has-error @enderror">
        <label for="">Email</label>
        <input type="text" class="form-control" name="email" placeholder="Input email">
        @error('email') <div>{!!$message!!}</div> @enderror
    </div>
    <div class="form-group @error('password') has-error @enderror">
        <label for="">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Input email">
        @error('password') <div>{!!$message!!}</div> @enderror
    </div>
    <div class="form-group @error('confirm_password') has-error @enderror">
        <label for="">Confirm password</label>
        <input type="password" class="form-control" name="confirm_password" placeholder="Input email">
        @error('confirm_password') <div>{!!$message!!}</div> @enderror
    </div>
   
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<hr>

<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{$loop->index + 1}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                <form action="{{ route('user.destroy', $user->id) }}" method="post">
                    @csrf @method("DELETE")
                    <button onclick="return confirm('Bạn có muốn xóa không?')"
                     class="btn btn-sm btn-danger">Xóa</button>
                     <a href="{{ route('user.edit', $user->id) }}"
                     class="btn btn-sm btn-primary">Sửa</a>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<hr>
{{$users->links()}}

@stop()