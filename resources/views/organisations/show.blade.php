@extends('layouts.app', ['pageSlug' => 'organisations', 'page' => 'Dashboard', 'section' => '', ])

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                        {{ $organisation->name .__(' Organisation Page')}}
                            </div>
                            <div class="col-4 text-right">
                                <button>Post A Job For this Organisation</button>
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
                                    <th>for</th>
                                    <th>Action</th>

                                    </thead>
                                    <tbody>
                                    @foreach($jobs as $job)
                                        <tr>
                                            <td>{{ $job->created_at->format('l jS \\of F Y h:i:s A') }}</td>
                                            <td>{{ $job->name}}</td>
                                            <td><a href="/" class="btn btn-sm btn-primary">
                                                    preview job
                                                </a></td>
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
