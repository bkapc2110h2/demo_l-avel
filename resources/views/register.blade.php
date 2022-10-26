@extends('layouts.master')
@section('title', 'Giới thiệu')
@section('main')

<form action="" method="POST" role="form">
    @csrf
    <legend>Form login</legend>
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Input name">
    </div>

    <div class="form-group">
        <label for="">Email</label>
        <input type="text" class="form-control" name="email" placeholder="Input email">
    </div>

    <div class="form-group">
        <label for="">Phone</label>
        <input type="text" class="form-control" name="phone" placeholder="Input phone">
    </div>

    <div class="form-group">
        <label for="">Address</label>
        <input type="text" class="form-control" name="address" placeholder="Input address">
    </div>

    <div class="form-group">
        <label for="">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Input password">
    </div>

    <div class="form-group">
        <label for="">Confirm Password</label>
        <input type="password" class="form-control" name="confirm_password" placeholder="Input Confirm Password">
    </div>

    <p>
        Nếu đã có tài khoản, <a href="{{route('home.login')}}">click vào đây</a> để đăng nhập
    </p>

    <button type="submit" class="btn btn-primary">Register</button>
</form>

@stop()
