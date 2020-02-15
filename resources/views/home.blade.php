@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (isset($ok_message))
                        <div class="alert alert-success" role="alert">
                            {{ $ok_message }}
                        </div>
                    @endif

                    You are logged in! Are you ready to translate?
                    <br /><br />
                    <a class="btn btn-primary" href="/mini-glossary/create" role="button">Create new Mini-glossary</a>
                    <br /><br />
                    Also you can
                    <br /><br />
                    <a class="btn btn-primary" href="/language/create" role="button">Add a new language</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
