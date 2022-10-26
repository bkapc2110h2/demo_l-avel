@extends('layouts.master')
@section('title', 'Giới thiệu')
@section('main')

<form action="" method="POST" role="form">
    @csrf
    <legend>Form login</legend>

    <div class="form-group">
        <label for="">Email</label>
        <input type="text" class="form-control" name="email" placeholder="Input email">
    </div>

    
    <div class="form-group">
        <label for="">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Input password">
    </div>

    <p>
        Nếu bạn chưa có tài khoản, <a href="{{ route('home.register') }}">click vào đây</a> để đăng ký
    </p>

    <button type="submit" class="btn btn-primary">Login</button>
</form>

@stop()
