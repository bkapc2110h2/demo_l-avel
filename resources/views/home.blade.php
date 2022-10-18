@extends('layouts.master')
@section('title', 'Trang chủ')
@section('main')

<x-list-product :products="$newProduct" :title="'SẢN PHẨM NỔI BẬT'"/>

<hr>

<x-list-product :products="$saleProduct" title="SẢN PHẨM KHUYẾN MÃI"/>
<hr>

<x-list-product :products="$ramdomProduct" title="SẢN PHẨM NGẪU NHIÊN"/>

@endsection