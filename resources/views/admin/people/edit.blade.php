@extends('layouts.admin')
@section('admin')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">
        <div class="card">

            <div class="card-header">
                <div class="float-start">
                @if(isset($person))
                    Edit {{ $person->name . " " . $person->surname . "'s" }} Record
                @else
                    Add New Person
                @endif
                </div>
                <div class="float-end">
                    <a href="{{ route('admin.people.index') }}" 
                        class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>

            <div class="card-body">
            @if(isset($person))
                <form action="{{ route('admin.people.update', $person->id) }}" method="post">
                @method("PUT")
            @else
                <form action="{{ route('admin.people.store') }}" method="post">
            @endif
                @csrf
                    
                    <div class="mb-3 row">
                        <label for="code"
                            class="col-md-4 col-form-label text-md-end text-start">
                            Name
                        </label>
                        <div class="col-md-6">
                          <input type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            id="name"
                            name="name"
                            value="{{ old('name', isset($person) ? $person->name : '') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="surname"
                            class="col-md-4 col-form-label text-md-end text-start">
                            Surname
                        </label>
                        <div class="col-md-6">
                          <input type="text"
                            class="form-control @error('surname') is-invalid @enderror"
                            id="surname"
                            name="surname"
                            value="{{ old('surname', isset($person) ? $person->surname : '') }}">
                            @error('surname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="south_african_id_no"
                            class="col-md-4 col-form-label text-md-end text-start">
                            South African Id Number
                        </label>
                        <div class="col-md-6">
                          <input type="text"
                            class="form-control @error('south_african_id_no') is-invalid @enderror"
                            id="south_african_id_no"
                            name="south_african_id_no"
                            value="{{ old('south_african_id_no', isset($person) ? $person->south_african_id_no : '') }}">
                            @error('south_african_id_no')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="mobile"
                            class="col-md-4 col-form-label
                                text-md-end text-start">
                                Mobile Number
                            </label>
                        <div class="col-md-6">
                          <input type="text"
                            class="form-control @error('mobile') is-invalid @enderror"
                            id="mobile"
                            name="mobile"
                            value="{{ old('mobile', isset($person) ? $person->mobile : '') }}">
                            @error('mobile')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="email"
                            class="col-md-4 col-form-label
                            text-md-end text-start">
                            Email Address
                        </label>
                        <div class="col-md-6">
                          <input type="text"
                            class="form-control @error('email') is-invalid @enderror"
                            id="email"
                            name="email"
                            value="{{ old('email', isset($person) ? $person->email : '') }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="language" 
                            class="col-md-4 col-form-label text-md-end text-start">
                            Languages
                        </label>
                        <div class="col-md-6">
                            <select class="form-select form-control @error('language_id') is-invalid @enderror"
                                id="language_id" 
                                name="language_id" 
                                value="{{ old('language_id', isset($person) ? $person->language->id : '') }}">
                                <option disabled selected value="">Please select a language...</option>
                                @foreach($languages as $language)
                                @if(isset($person))
                                <option value="{{ old('language_id', isset($languages) ? $language->id : '') }}"
                                    {{ $language->id == $person->language_id ? 'selected' : '' }}>
                                    {{ $language->name }}
                                </option>
                                @else
                                    <option value="{{ $language->id }}">{{ $language->name}}</option>
                                @endif
                                @endforeach
                            </select>
                            @error('language_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="interest"
                            class="col-md-4 col-form-label text-md-end text-start">
                            Interests
                        </label>
                        <div class="col-md-6">
                            <select class="form-select form-control @error('interests') is-invalid @enderror"
                                id="interests"
                                name="interests[]"
                                multiple
                                data-live-search="true">
                                <option disabled value="">Please select interests...</option>
                                @foreach($interests as $interest)
                                @if(isset($person))
                                <option value="{{ old('interests[]', isset($interests) ? $interest->id : '') }}"
                                    {{ $selectedInterests->contains('id', $interest->id) ? 'selected' : '' }}>
                                    {{ $interest->name }}
                                </option>
                                @else
                                    <option value="{{ $interest->id }}">{{ $interest->name}}</option>
                                @endif
                                @endforeach
                            </select>
                            @error('interests')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="{{ isset($person) ? 'Update' : 'Add' }}">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
@endsection