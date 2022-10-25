@extends('layouts.master')
@section('title', $category->name)
@section('main')

<x-grid-product :products="$products" :title="$category->name"/>

@stop()