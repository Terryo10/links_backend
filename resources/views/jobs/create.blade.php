@extends('layouts.app', ['pageSlug' => 'jobs', 'page' => 'Dashboard', 'section' => '', ])

@section('content')
    <div class="card-body">
        <div class="card-body">


            <div>
                @include('alerts.success')
            </div>

            <div class="pl-lg-4">

                <div  >

                    <div class="container">
                        <p>You are currently posting a job for {{$organisation->name}} organisation</p>
                        <div class="row">
                            <style>

                                .others {
                                    color:black
                                }
                            </style>
                            <div class="col-12">
                                <div >
                                    <form method="post" action="{{route("jobs.store")}}" autocomplete="off" enctype="multipart/form-data">
                                        @csrf
                                        <div class="pl-lg-4">
                                            <input type="hidden" name="organisation_id" value="{{$organisation->id}}">

                                            <div class="form-group{{ $errors->has('Location') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-price">Expertise</label>
                                                <select name="expertises_id" class="custom-select custom-select-lg mb-3 others" required>
                                                    @foreach($expertise as $expertie)
                                                    <option class="others" value="{{$expertie->id}}">{{$expertie->name}}</option>
                                                    @endforeach
                                                </select>

                                                @include('alerts.feedback', ['field' => 'name'])
                                            </div>

                                            <div class="form-group{{ $errors->has('Location') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-price">Name Of Job</label>
                                                <input type="Location" placeholder="Enter job position" name="name" id="input-price" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" value="" required>
                                                @include('alerts.feedback', ['field' => 'name'])
                                            </div>



                                            <div class="form-group{{ $errors->has('type') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-qty">Type Of Job</label>
                                                <input type="text" name="type" placeholder="E.g full-time , partime ..." id="input-qty" class="form-control form-control-alternative{{ $errors->has('type') ? ' is-invalid' : '' }}"  required>
                                                @include('alerts.feedback', ['field' => 'type'])
                                            </div>

                                            <div class="form-group{{ $errors->has('product_id') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-qty">Description</label>
                                                <textarea type="text" name="description"  placeholder="Enter a brief job description" id="input-qty" class="form-control form-control-alternative{{ $errors->has('number_of_employees') ? ' is-invalid' : '' }}"  required></textarea>
                                                @include('alerts.feedback', ['field' => 'number_of_employees'])
                                            </div>

                                            <div class="form-group{{ $errors->has('product_id') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-qty">Tasks</label>
                                                <textarea type="text" name="tasks" placeholder="Enter job tasks" id="input-qty" class="form-control form-control-alternative{{ $errors->has('number_of_employees') ? ' is-invalid' : '' }}"  required></textarea>
                                                @include('alerts.feedback', ['field' => 'number_of_employees'])
                                            </div>



                                            <div class="text-center">
                                                <button type="submit" class="btn btn-success mt-4">Create</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
