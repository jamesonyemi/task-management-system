@extends('layouts.default')
@section('content')

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(array('route' => 'tasks.store','method'=>'POST', 'enctype'=>"multipart/form-data")) !!}
         @include('tasks.form')
    {!! Form::close() !!}
@endsection