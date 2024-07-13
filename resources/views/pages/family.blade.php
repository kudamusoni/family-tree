@extends('layouts.layout')
@section('content')

<a href="{{ route('family.create') }}">
    <button class="mr-2 mb-2 bottom-0 right-0 fixed z-10 bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 focus:outline-none disabled:bg-gray-400">
        Add Member
    </button>
</a>

<view-family :family="{{ json_encode($family) }}"/>

@endsection
