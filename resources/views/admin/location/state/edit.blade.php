@extends('admin.layouts.master')
@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Edit States</h1>
        </div>

        <div class="section-body">
        </div>
    </section>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit States</h4>
            </div>
            <div class="card-body ">
                <form action="{{ route('admin.states.update', $state->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Country</label>
                                <select name="country" id="" class="form-control select2 {{ hasError($errors,'country') }}">
                                    <option value="">Select</option>
                                    @foreach ($countries as $country)
                                    <option @selected($state->country_id === $country->id) value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('country')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">State Name</label>
                                <input type="text" class="form-control {{ hasError($errors, 'name') }}" value="{{ old('name',$state->name) }}"
                                    name="name">
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
