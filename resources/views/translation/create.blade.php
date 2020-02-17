@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Mini-glossary Name: {{ $term->miniGlossary->name }} <br>
                    New Translation for: {{ $term->value }}
                </div>

                <div class="card-body">
                    @if( session('status') )
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="alert alert-dark" role="alert">
                        You are translating from {{ $term->miniGlossary->language->name }} due to the language settings of this Mini-glossary.</p>
                    </div>

                    {!! Form::open(['method' => 'POST', 'route' => ['translation.store'], 'id' => 'form-create-translation']) !!}
                        {{ Form::hidden('term_id', $term->id) }}
                        <h5>Select the language destination for this translation</h5>
                        {!! Form::select('language_id', $languages, null, ['class' => 'form-control']) !!}
                        @error('language_id')
                            <div style="color:#761b18">{{ $message }}</div>
                        @enderror
                        <br />
                        <br />
                        {!! Form::text('translation', null,['maxlength' => 191, 'placeholder' => 'Insert your translation', 'class' => 'form-control']) !!}
                        @error('translation')
                            <div style="color:#761b18">{{ $message }}</div>
                        @enderror
                        <p></p>
                        {!! Form::submit('Save translation', ['class' => 'btn btn-primary']) !!}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
