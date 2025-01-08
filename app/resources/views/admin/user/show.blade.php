@extends('bootlayout.app')

@section('content')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="max-height: 300px;">
    <div class="container">
      <div class="justify-content-center text-center">
        <h2>{{ __('User Details') }}</h2>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <div class="container mt-5">
      <!-- User Details Card -->
      <div class="card">
        <div class="card-header">
          {{ $user->name }}'s Details
        </div>
        <div class="card-body">
          <table class="table">
            <tr>
              <th>Name:</th>
              <td>{{ $user->name }}</td>
            </tr>
            <tr>
              <th>Email:</th>
              <td>{{ $user->email }}</td>
            </tr>
            <tr>
              <th>Gender:</th>
              <td>{{ $user->gender }}</td>
            </tr>
            <tr>
              <th>Scholarships:</th>
              <td>{{ $user->jobs->pluck('post') }}</td> <!-- Assuming role is directly available -->
            </tr>
            <tr>
              <th>Created At:</th>
              <td>{{ $user->created_at->format('d M, Y') }}</td>
            </tr>
          </table>

          <!-- Edit Button -->
          <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-primary">
            Edit User
          </a>
        </div>
      </div>
    </div>
  </main><!-- End #main -->
@endsection
