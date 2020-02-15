@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Language</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['method' => 'POST', 'route' => ['language.store'], 'id' => 'form-create-language']) !!}
                        {!! Form::text('code', null,['maxlength' => 2, 'placeholder' => 'en']) !!}
                        {!! Form::text('name', null,['maxlength' => 150, 'placeholder' => 'English']) !!}
                        {!! Form::submit('Add Language') !!}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
