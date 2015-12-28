@extends('layouts.main')
@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
        <ul id="myTabs" class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#file" id="file-tab" role="tab" data-toggle="tab" aria-controls="file" aria-expanded="true">FileScan</a>
            </li>
            <li role="presentation" class="">
                <a href="#url" role="tab" id="url-tab" data-toggle="tab" aria-controls="url" aria-expanded="false">UrlScan</a>
            </li>
            <li role="presentation" class="">
                <a href="#search" role="tab" id="search-tab" data-toggle="tab" aria-controls="search" aria-expanded="false">Search</a>
            </li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade active in" id="file" aria-labelledby="file-tab">
                {!! Form::open(['route' => 'fileScan', 'files' => true]) !!}
                <div class="form-group">
                    {!! Form::label('file', 'File') !!}
                    {!! Form::file('file', ['class' => 'form-control', 'id' => 'file']) !!}
                </div>
                {!! Form::submit('Check!', ['class' => 'btn btn-blank btn-primary']) !!}
                {!! Form::close() !!}
            </div>
            <div role="tabpanel" class="tab-pane fade" id="url" aria-labelledby="url-tab">
                {!! Form::open(['route' => 'urlScan']) !!}
                <div class="form-group">
                    {!! Form::label('url', 'URL') !!}
                    {!! Form::text('url', null, ['class' => 'form-control', 'id' => 'url']) !!}
                </div>
                {!! Form::submit('Check!', ['class' => 'btn btn-blank btn-primary']) !!}
                {!! Form::close() !!}
            </div>
            <div role="tabpanel" class="tab-pane fade" id="search" aria-labelledby="search-tab">
                {!! Form::open(['route' => 'search']) !!}
                <div class="form-group">
                    {!! Form::label('search', 'Search') !!}
                    {!! Form::text('search', null, ['class' => 'form-control', 'id' => 'search']) !!}
                </div>
                {!! Form::submit('Check!', ['class' => 'btn btn-blank btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection