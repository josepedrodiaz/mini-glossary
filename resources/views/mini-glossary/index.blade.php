@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mini Glossaries</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table id="mini_glossary_list" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Base Language</th>
                                    <th class="text-center">Owner</th>
                                    <th class="text-center">Tasks</th>
                                </tr>
                            </thead>
                        <tbody>
                        @foreach($mini_glossaries as $mini_glossary)
                            <tr class="data_row">  
                                <td> 
                                    {{ $mini_glossary->name }}
                                </td>
                                <td> 
                                    {{ $mini_glossary->language->name }}
                                </td>
                                <td> 
                                    @if ($mini_glossary->user->id == Auth::user()->id )
                                        You
                                    @else
                                        {{ $mini_glossary->user->name }}
                                    @endif
                                </td>
                                <td> 
                                    @if ($mini_glossary->user->id == Auth::user()->id )
                                        <a href="#">Add Terms</a> 
                                        -
                                        <a href="#">Translate</a>
                                    @else
                                        <a href="#">Help with translation</a>
                                    @endif
                                    <a href="#">View</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
