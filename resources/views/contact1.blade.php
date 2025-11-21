@extends('dashboard.master')

@section('content')

    <p>contact 1</p>
    <p>{{$titulo}}</p>

    @if ($titulo!='david')
        el titulo es 1
    @else
        <h2>titulo 2</h2>
    @endif

    @for ($i = 0; $i < 10; $i++)
        valor es {{$i}}
    @endfor
    @foreach ($personas as $p)
        <p>{{$p['id']}} - {{$p['name']}}</p>
    @endforeach

@endsection
