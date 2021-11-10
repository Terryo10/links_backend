@extends('layouts.app', ['pageSlug' => 'organisations', 'page' => 'Dashboard', 'section' => '', ])

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">
                        <div class="row">
                            <div class="col-4 text-center">
                               <img src="/storage/organisation_logos/{{$organisation->image_path}}" style="height: 50px;">
                            </div>
                            <div class="col-4 text-center">
                        {{ $organisation->name .__(' Organisation Page')}}
                            </div>
                            <div class="col-4 text-right">
                                <a href="/create_for/{{$organisation->id}}">
                                <button class="btn btn-sm btn-primary">Post A Job For this Organisation</button>
                                </a>
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
                                    <th>Created On</th>
                                    <th>Job Name</th>
                                    <th>Action</th>

                                    </thead>
                                    <tbody>
                                    @foreach($jobs as $job)
                                        <tr>
                                            <td>{{ $job->created_at->format('l jS \\of F Y h:i:s A') }}</td>
                                            <td>{{ $job->name}}</td>
                                            <td><a href="/jobs/{{$job->id}}" class="btn btn-sm btn-primary">
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
