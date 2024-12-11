@extends('persons.index')

@section('person_content')
    <h3> All Person </h3>
    <a href="{{ route('persons.create') }}" class="btn btn-info">
        Create Person
    </a>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Natonality</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($persons as $person)
                    <tr>
                        <th scope="row"> {{ $person->id }} </th>
                        <td>{{ $person->name }}</td>
                        <td>{{ $person->natonality->name }}</td>
                        <td>
                            <a href="#" class="btn btn-success">
                                Edit
                            </a>
                            <a href="#" class="btn btn-danger">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
