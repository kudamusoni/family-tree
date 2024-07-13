@extends('layouts.layout')
@section('content')

<show-member :family="{{ $family }}" :member="{{ $member }}"/>

@endsection
