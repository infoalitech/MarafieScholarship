@extends('bootlayout.app')

@section('content')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="max-height: 300px;">
    <div class="container">
      <div class="justify-content-center text-center">
        <h2>{{ __('Edit User') }}</h2>
      </div>
    </div>
  </section><!-- End Hero -->
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <main id="main">
    <div class="container mt-5">
      <!-- Edit User Form -->
      <div class="card">
        <div class="card-header">
          Edit {{ $user->name }}
        </div>
        <div class="card-body">
          <form action="{{ route('admin.user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Name Field -->
            <div class="form-group">
              <label for="name">{{ __('Name') }}</label>
              <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
            </div>

            <!-- Email Field -->
            <div class="form-group">
              <label for="email">{{ __('Email') }}</label>
              <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
            </div>

            <!-- Gender Field -->
            <div class="form-group">
              <label for="gender">{{ __('Gender') }}</label>
              <select name="gender" class="form-control" required>
                <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
              </select>
            </div>

            <!-- Role Field (Multiple Select) -->
            {{-- <div class="form-group">
              <label for="roles">{{ __('Roles') }}</label>
              <select name="roles[]" class="form-control" multiple >
                @foreach($roles as $role)
                  <option value="{{ $role->id }}" {{ in_array($role->id, $user->roles->pluck('id')->toArray()) ? 'selected' : '' }}>
                    {{ $role->name }}
                  </option>
                @endforeach
              </select>
            </div> --}}

            <!-- Permissions Field (Multiple Select) -->
            {{-- <div class="form-group">
              <label for="permissions">{{ __('Permissions') }}</label>
              <select name="permissions[]" class="form-control" multiple >
                @foreach($permissions as $permission)
                  <option value="{{ $permission->id }}" {{ in_array($permission->id, $user->permissions->pluck('id')->toArray()) ? 'selected' : '' }}>
                    {{ $permission->name }}
                  </option>
                @endforeach
              </select>
            </div> --}}

            <!-- Job Field (Multiple Select) -->
            <div class="form-group">
              <label for="jobs">{{ __('Jobs') }}</label>
              <select name="jobs[]" class="form-control" multiple required>
                @foreach($jobs as $job)
                  <option value="{{ $job->id }}" {{ in_array($job->id, $user->jobs->pluck('id')->toArray()) ? 'selected' : '' }}>
                    {{ $job->post }}
                  </option>
                @endforeach
              </select>
            </div>



            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">{{ __('Save Changes') }}</button>
          </form>
        </div>
