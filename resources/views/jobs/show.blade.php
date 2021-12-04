@extends('layouts.app', ['pageSlug' => 'jobs', 'page' => 'Dashboard', 'section' => '', ])

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    <div class="row">

                        <div class="col-4 text-center">
                    {{ $job->name .__(' Page')}}
                        </div>
                        <div class="col-4 text-right">
                            <a href="/job_applications/{{$job->id}}">
                            <button class="btn btn-sm btn-primary">View Applications For this Job</button>
                            </a>
                        </div>
                        <div class="col-4 text-right">
                            <form method="POST" action="{{ route('jobs.destroy', [$job->id]) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <div class="form-group">
                                    <button type="submit"  class="btn btn-sm btn-primary">Delete Job</button>
                                </div>
                            </form>

                        </div>
                        </div>

                <div class="card-body">
                    <p>
                      Job Category :   {{$expertise->name}}
                    </p>
                    <p>
                        Job Type :   {{$job->type}}
                      </p>

                    <p>
                        Job Description :   {{$job->description}}
                    </p>

                    <p>
                        Job Tasks :   {{$job->tasks}}
                    </p>
            </div>
        </div>
    </div>
</div>
@endsection
