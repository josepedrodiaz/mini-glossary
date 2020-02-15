@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Mini Glossary</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['method' => 'POST', 'route' => ['mini-glossary.store'], 'id' => 'form-create-mini-glossary']) !!}
                        {!! Form::text('name', null,['maxlength' => 191, 'placeholder' => 'Mini Glossary Name', 'class' => 'form-control']) !!}
                        @error('name')
                            <div style="color:#761b18">{{ $message }}</div>
                        @enderror
                        <br />
                        <h5>Select a base language from which the translations of this Mini-glossary will be made</h5>
                        {!! Form::select('language_id', $languages, null, ['class' => 'form-control']) !!}
                        @error('language_id')
                            <div style="color:#761b18">{{ $message }}</div>
                        @enderror
                        <br />
                        {!! Form::submit('Create New Mini-glossary', ['class' => 'btn btn-primary']) !!}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
