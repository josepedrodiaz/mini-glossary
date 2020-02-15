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
                       
                                <p>Languaje name
                                <br>
                                {!! Form::text('name', null,['maxlength' => 150, 'placeholder' => 'for example: `English`']) !!}
                                @error('name')
                                    <div style="color:#761b18">{{ $message }}</div>
                                @enderror
                                <br><br>
                                Languaje code
                                <br>
                                {!! Form::text('code', null,['size' => 4, 'maxlength' => 2, 'placeholder' => 'en']) !!}
                                @error('code')
                                    <div style="color:#761b18">{{ $message }}</div>
                                @enderror
                                </p>
                     
                        <div class="row">
                            <div class="col-md-12 text-center">
                            <br>
                                {!! Form::submit('Add Language', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
