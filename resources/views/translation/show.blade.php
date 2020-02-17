@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Term translations of {{ $term->value }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (isset($ok_message))
                        <div class="alert alert-success" role="alert">
                            {!! $ok_message !!}
                        </div>
                    @endif
                    <ul>
                        @foreach($term->translations as $translation)
                            <li>{{ $translation->pivot->translation }} 
                            @if ($translation->pivot->approved == 0)
                                NOT APPROVED
                            @endif
                            (language: 
                            {{App\Translation::getLanguageCode($translation->pivot->language_id)}}
                            )</li>
                        @endforeach
                    </ul>

                    <p><a href="/translation/create/{{ $term->id }}">Add translation for <strong>'{{ $term->value }}'</strong></a></p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
