@extends('layouts.admin')
@section('admin')

<div class="mb-2" class="row">
    @session('success')
        <div class="alert alert-success" role="alert">
            {{ $value }}
        </div>
    @endsession

    <div class="col-lg-12 mb-3">
        <a class="btn btn-success" href="{{ route('admin.people.create') }}">Add Person</a>
    </div>
</div>

<div class="card">
    <div class="card-header">People List</div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Name</th>
                    <th scope="col">SA ID</th>
                    <th scope="col">Mobile No.</th>
                    <th scope="col">Email</th>
                    <th scope="col">Language</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($people as $person)
                    <tr>
                        <td>{{ $person->name . " " . $person->surname }}</td>
                        <td>{{ $person->south_african_id_no }}</td>
                        <td>{{ $person->mobile }}</td>
                        <td>{{ $person->email }}</td>
                        <td>{{ Illuminate\Support\Str::limit($person->language->name, 20) }}</td>
                        <td>
                            <form action="{{ route('admin.people.destroy', $person->id) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <a href="{{ route('admin.people.show', $person->id) }}"
                                    class="btn btn-warning btn-sm">
                                    <i class="bi bi-eye"></i>
                                </a>

                                <a href="{{ route('admin.people.edit', $person->id) }}"
                                    class="btn btn-primary btn-sm">
                                    <i class="bi bi-pencil-square"></i>
                                </a>   

                                <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Do you want to delete this product?');">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        <td colspan="6">
                            <span class="text-danger">
                                <strong>No People Found!</strong>
                            </span>
                        </td>
                    @endforelse
                </tbody>
            </table>
            {{ $people->links() }}
        </div>
    </div>
</div>
@endsection