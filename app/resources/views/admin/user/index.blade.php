@extends('bootlayout.app')

@section('content')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="max-height: 300px;">
    <div class="container">
        <div class="justify-content-center text-center">
            <h2 class="">
                {{ __('Users') }}
            </h2>
            <a href="{{ route('admin.user.create') }}" class="btn btn-primary">
                Create User
            </a>
        </div>
    </div>
  </section><!-- End Hero -->
  
  <main id="main">
    <div class="wrapper">
      <div class="container">
        <table class="table table-responsive">
            <thead>
                <tr>
                    <td>S.No</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Created At</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $key => $user)
                <tr>
                    <td>{{ ($users->currentPage() - 1) * $users->perPage() + $key + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('d M, Y') }}</td>
                    <td>
                        <!-- Button to view user details -->
                        <a href="{{ route('admin.user.show', ['id' => $user->id]) }}" class="btn btn-primary">
                            View User
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <!-- Pagination Links -->
        <div class="d-flex justify-content-center">
            {{ $users->links() }}
        </div>
        
        <style>
svg.w-5.h-5 {
    width: 10px;
}
        </style>
    </div>
  </div>
  </main><!-- End #main -->

@endsection
