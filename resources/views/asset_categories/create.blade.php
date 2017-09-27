@extends('layouts.default')

@section('content')

    <div class="panel panel-default card card-header">

        <div class="panel-heading clearfix">
            
            <span class="pull-left">
                <h4 class="mt-5 mb-5">Create New Asset Category</h4>
            </span>

            <div class="btn-group btn-group-sm pull-right push-xs-10  offset-xl-1 col-form-label" role="group">
                <a href="{{ route('asset_categories.asset_category.index') }}" class="btn btn-primary" title="Show All Asset Category">Show
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        <div class="panel-body">
        
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('asset_categories.asset_category.store') }}" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            @include ('asset_categories.form')

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Create">
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection


