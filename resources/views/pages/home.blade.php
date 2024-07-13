@extends('layouts.layout')
@section('content')
    <div class="flex justify-between h-[10rem] mx-6 gap-5">
        <a href="/family" class="w-1/2 bg-green-400 rounded-md flex justify-center items-center">Family Tree</a>
        <a href="/relationships" class="w-1/2 bg-blue-400 rounded-md flex justify-center items-center">Relationships</a>
    </div>

    <view-tree />
@endsection
