@extends('admin.layouts.master')

@section('contents')
<section class="section">
    <div class="section-header d-flex justify-content-between align-items-center">
        <h1>Edit User</h1>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to All Users
        </a>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Edit User Details</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                    </div>



                    <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" id="role" class="form-control select2">
                            <option value="candidate" {{ $user->role == 'candidate' ? 'selected' : '' }}>Candidate</option>
                            <option value="company" {{ $user->role == 'company' ? 'selected' : '' }}>Company</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
