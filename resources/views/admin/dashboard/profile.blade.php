@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Admin Profile update</h1>
    </div>

    <div class="section-body">
        <div class="card" style="border-top:2px #009933 solid;">
            <div class="card-header">
              <h4>Profile Information</h4>      
            </div>
            
              <!-- Session Status -->
              <x-auth-session-status class="mb-3 ml-5" :status="session('status')" />

            <div class="card-body">
              <form enctype="multipart/form-data" method="POST" action="{{ route('profile.update',  auth()->id()) }}">
                @csrf
                @method('patch')
                <div class="form-group">
                    <div class="col-sm-12 col-md-7">
                        <div id="image-preview" class="image-preview">
                          <label for="image-upload" id="image-label">Choose File</label>
                          <input type="file" name="image" id="image-upload" />
                          
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}">
                    @error('name')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}">
                    @error('email')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" name="username" value="{{ auth()->user()->username }}">
                  @error('username')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>

                <div class="form-group">
                  <label>Phone Number</label>
                  <input type="text" class="form-control" name="phone_no" value="{{ auth()->user()->phone_no }}">
                  @error('phone_no')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                  <button class="btn text-white" type="submit" style="background-color:#009933;">Save</button>
              </form>
            </div>
        </div>

        <div class="card" style="border-top:2px #009933 solid;">
            <div class="card-header">
              <h4>Update Password</h4>
            </div>
            <div class="card-body">
              <form method="POST" action="{{ route('admin.password.update') }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Current Password</label>
                    <input type="password" class="form-control" name="current_password">
                    @error('current_password')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label>New Password</label>
                    <input type="password" class="form-control" name="password">
                    @error('password')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation">
                    @error('password_confirmation')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button class="btn text-white" type="submit" style="background-color:#009933;">Save</button>
              </form>
            </div>
        </div>
    </div>
  </section>

@endsection

@push('scripts')
<script>
  $(document).ready(function () {
      $('.image-preview').css({
          'background-image': 'url({{ asset(auth()->user()->avatar) }})',
          'background-size': 'cover',
          'background-position': 'center',
      });
  });
</script>
@endpush
