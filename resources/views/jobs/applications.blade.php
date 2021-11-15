@extends('layouts.app', ['pageSlug' => 'jobs', 'page' => 'Dashboard', 'section' => '', ])

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">
                        <div class="row">

                            <div class="col-4 text-center">
                                {{ __(' Applications Page') }}
                            </div>
                            <div class="col-4 text-right">
                                <a href="">
                                    <button class="btn btn-sm btn-primary">Download all cvs for this job</button>
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
                                        <th>Applied On</th>
                                        <th>Applicant Name</th>
                                        <th>Applicant Email</th>
                                        <th>Action</th>

                                    </thead>

                                    @foreach ($applications as $application)
                                        <tr>
                                            <td>{{ $application->created_at->format('l jS \\of F Y h:i:s A') }}</td>
                                            <td>{{ $application->user->name }}</td>

                                            <td>{{$application->user->email }}</td>
                                            <td><a target="blank" href="/storage/cv_file/{{ $application['user']->cvFile['file_path'] }}"
                                                    class="btn btn-sm btn-primary">
                                                  View Applicant CV
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
