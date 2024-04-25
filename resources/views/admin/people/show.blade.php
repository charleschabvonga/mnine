@extends('layouts.admin')

@section('admin')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    {{ $person->name . " " . $person->surname . "'s" }} Information
                </div>
                <div class="float-end">
                    <a href="{{ route('admin.people.index') }}"
                        class="btn btn-primary btn-sm">&larr; Back
                    </a>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <label for="name"
                        class="col-md-4 col-form-label text-md-end text-start">
                        <strong>Name:</strong>
                    </label>
                    <div class="col-md-6 mt-2">
                        {{ $person->name }}
                    </div>
                </div>

                <div class="row">
                    <label for="surname"
                        class="col-md-4 col-form-label text-md-end text-start">
                        <strong>Surame:</strong>
                    </label>
                    <div class="col-md-6 mt-2">
                        {{ $person->surname }}
                    </div>
                </div>

                <div class="row">
                    <label for="south_african_id_no"
                        class="col-md-4 col-form-label text-md-end text-start">
                        <strong>South African ID:</strong>
                    </label>
                    <div class="col-md-6 mt-2">
                        {{ $person->south_african_id_no }}
                    </div>
                </div>

                <div class="row">
                    <label for="mobile"
                        class="col-md-4 col-form-label text-md-end text-start">
                        <strong>Mobile:</strong>
                    </label>
                    <div class="col-md-6 mt-2">
                        {{ $person->mobile }}
                    </div>
                </div>

                <div class="row">
                    <label for="email"
                        class="col-md-4 col-form-label text-md-end text-start">
                        <strong>Email:</strong>
                    </label>
                    <div class="col-md-6 mt-2">
                        {{ $person->email }}
                    </div>
                </div>

                <div class="row">
                    <label for="birth_date"
                        class="col-md-4 col-form-label text-md-end text-start">
                        <strong>Birth Date:</strong>
                    </label>
                    <div class="col-md-6 mt-2">
                        {{ $person->birth_date }}
                    </div>
                </div>

                <div class="row">
                    <label for="language"
                        class="col-md-4 col-form-label text-md-end text-start">
                        <strong>Language:</strong>
                    </label>
                    <div class="col-md-6 mt-2">
                        {{ $person->language->name }}
                    </div>
                </div>

                <div class="row">
                    <span class="col-md-1"></span>
                    <fieldset class="border pb-2 col-md-11 ml-4">
                        <legend  class="float-none w-auto font-weight-bold fs-6">
                            Interests
                        </legend>
                        @foreach ($interests as $interest)
                        <span class="badge badge-primary mr-2">
                            {{ $interest->name }}
                        </span>
                        @endforeach
                    </fieldset>
                </div>
            </div>
        </div>
    </div>    
</div>
    
@endsection