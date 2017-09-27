@extends('layouts.default')

@section('content')

<div class="panel panel-default card card-header">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($assetCategory->name) ? $assetCategory->name : 'Asset Category' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('asset_categories.asset_category.destroy', $assetCategory->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm push-xs-10  offset-xl-0 col-form-label" role="group">
                    <a href="{{ route('asset_categories.asset_category.index') }}" class="btn btn-primary" title="Show All Asset Category">Show
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('asset_categories.asset_category.create') }}" class="btn btn-success" title="Create New Asset Category">Create
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('asset_categories.asset_category.edit', $assetCategory->id ) }}" class="btn btn-primary" title="Edit Asset Category">Edit
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Asset Category" onclick="return confirm(&quot;Delete Asset Category??&quot;)">Delete
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $assetCategory->name }}</dd>
            <dt>Description</dt>
            <dd>{{ $assetCategory->description }}</dd>
            <dt>Is Active</dt>
            <dd>{{ ($assetCategory->is_active) ? 'Yes' : 'No' }}</dd>

        </dl>

    </div>
</div>

@endsection