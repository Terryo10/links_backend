@extends('layouts.app', ['pageSlug' => 'organisations', 'page' => 'Dashboard', 'section' => '', ])

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <div class="row">
                            <div class="col-4 ">
                                <p>you can preview your organisations here</p>
                            </div>
                            <br>

                        </div>
                        <div class="col-8 text-center">
                            <a href="organisations/create"><button class="btn btn-sm btn-primary">create a new organisation</button></a>
                        </div>
                    </div>


                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                    <th>name</th>
                                    <th>Created On</th>
                                    <th>Action</th>

                                    </thead>
                                    <tbody>
                                    @foreach($organisations as $organisation)
                                        <tr>
                                            <td>{{$organisation->name}}</td>
                                            <td>{{ $organisation->created_at->format('l jS \\of F Y h:i:s A') }}</td>
                                            <td><a href="/organisations/{{$organisation->id}}" class="btn btn-sm btn-primary">
                                                    preview</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
