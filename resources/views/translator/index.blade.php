@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Mini-glossary Name: {{ $mini_glossary->name }} <br>
                    Base language: {{ $mini_glossary->language->name }} (<small><b> {{ $mini_glossary->language->code }} </b></small>)
                </div>

                <div class="card-body">
                    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @if (session('ok_message'))
                        <div class="alert alert-success" role="alert">
                        {{ session('ok_message') }}
                        </div>
                    @endif

                    @if ( count( $mini_glossary->terms) < 5 )
                        {!! Form::open(['method' => 'POST', 'route' => ['terms.store'], 'id' => 'form-add-term']) !!}
                            {!! Form::text('value', null,['maxlength' => 191, 'placeholder' => 'Add Term', 'class' => 'form-control']) !!}
                            @error('value')
                                <div style="color:#761b18">{{ $message }}</div>
                            @enderror
                            {{ Form::hidden('mini_glossaries_id', $mini_glossary->id) }}
                            <br />
                            {!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}
                        {{ Form::close() }}       
                    @else
                     You reach the limit of {{ count( $mini_glossary->terms) }} terms for this Mini-glossary
                    @endif

                               
                </div>
            </div>
            <br><br>
            <!-- Display Terms for actual Mini Glossary -->
            @if( isset( $mini_glossary->terms ))
            <div class="card">
                <div class="card-header">
                    Mini glossary terms
                </div>
                <div class="card-body">
                    <ul>
                        @foreach($mini_glossary->terms as $term)
                            <li><a href="/terms/{{ $term->id }}">{{ $term->value }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
