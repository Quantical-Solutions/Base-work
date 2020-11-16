@extends('admin.template')

@section('title')
    {!! $title !!}
@endsection

@section('content')
    {!! $title !!}
    @php dump($game) @endphp
@endsection
