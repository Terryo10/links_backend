@extends('layouts.app', ['pageSlug' => 'payments', 'page' => 'Create Payments ', 'section' => 'transactions'])
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                Create Organisation
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-body">


                            <div>

                            </div>



                            <div class="pl-lg-4">
                                @include('alerts.success')


                                <div  >

                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12">
                                                <div >
                                                    <form method="post" action="{{route("organisations.store")}}" autocomplete="off" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="pl-lg-4">
                                                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                                                <label class="form-control-label" for="input-price">Name Of Organisation</label>
                                                                <input type="name" name="name" id="input-price" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" value="" required>
                                                                @include('alerts.feedback', ['field' => 'name'])
                                                            </div>

                                                            <div class="form-group{{ $errors->has('Location') ? ' has-danger' : '' }}">
                                                                <label class="form-control-label" for="input-price">Location</label>
                                                                <input type="Location" name="location" id="input-price" class="form-control form-control-alternative{{ $errors->has('Location') ? ' is-invalid' : '' }}" value="" required>
                                                                @include('alerts.feedback', ['field' => 'email'])
                                                            </div>

                                                            <div class="form-group{{ $errors->has('product_id') ? ' has-danger' : '' }}">
                                                                <label class="form-control-label" for="input-qty">Number of Employees</label>
                                                                <input type="number" name="number_of_employees" id="input-qty" class="form-control form-control-alternative{{ $errors->has('number_of_employees') ? ' is-invalid' : '' }}"  required>
                                                                @include('alerts.feedback', ['field' => 'number_of_employees'])
                                                            </div>

                                                            <div >
                                                                <label class="form-control-label" for="input-qty">Select here to upload organisation Logo</label>
                                                                <input name="image" type="file" required/>                                                               @include('alerts.feedback', ['field' => 'image_path'])
                                                            </div>
<style>
    .custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
}
</style>
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
                </div>
            </div>

        </div>

    </div>

@endsection
