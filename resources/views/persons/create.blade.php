@extends('persons.index')

@section('person_content')
    <div class="table-responsive col-md-6 m-auto d-block">
        Create New Person
        <form action="{{ route('persons.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-controll">
                </div>
                <div class="col-md-6">
                    <label for="age">Age</label>
                    <input type="number" name="age" class="form-controll">
                </div>
                <div class="col-md-6">
                    <label for="birth_day">birth day</label>
                    <input type="date" name="birth_day" class="form-controll">
                </div>
                <div class="col-md-6">
                    <label for="birth_day">natonality</label>
                    <select name="natonality_id">
                        @foreach ($natonalities as $natonality)
                            <option value="{{ $natonality->id }}">
                                {{ $natonality->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 d-block m-auto">
                    <button type="submit" class="btn btn-info">
                        Create
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
