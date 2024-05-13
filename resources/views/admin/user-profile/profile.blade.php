@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>{{ $user->name }} Profile update</h1>

    </div>

    <div class="section-body">
        <div class="card" style="border-top:2px #009933 solid;">
            <div class="card-header">
              <h4>Profile Information </h4>
            </div>

              <!-- Session Status -->
              <x-auth-session-status class="mb-3 ml-5" :status="session('status')" />

            <div class="card-body">
              <form enctype="multipart/form-data" method="POST" action="{{ route('profile.update', $user->id) }}">
                @csrf
                @method('patch')
                {{-- <div class="form-group">
                    <div class="col-sm-12 col-md-7">
                        <div id="image-preview" class="image-preview">
                          <label for="image-upload" id="image-label">Choose File</label>
                          <input type="file" name="image" id="image-upload" />
                          
                        </div>
                    </div>
                </div> --}}
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                    @error('name')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                    @error('email')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" name="username" value="{{ $user->username }}">
                  @error('username')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>

                <div class="form-group">
                  <label>Phone Number</label>
                  <input type="text" class="form-control" name="phone_no" value="{{ $user->phone_no }}">
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
            <h4>Bank Information</h4>
          </div>
          <div class="card-body">
            <form enctype="multipart/form-data" method="POST" action="{{ route('bank.details.update', $user->id) }}">
              @csrf
              @method('patch')

              <div class="form-group">
                  <label>Account Number</label>
                  <input type="number" class="form-control" name="account_number" value="{{ $user->bank->account_number}}">
                  @error('account_number')user->id
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
              </div>

              <div class="form-group">
                  <label>Account Name</label>
                  <input type="text" class="form-control" name="account_name" value="{{ $user->bank->account_name }}">
                  @error('account_name')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
              </div>

              <div class="form-group">
                <label>Bank Name</label>
                <input type="text" class="form-control" name="bank_name" value="{{ $user->bank->bank_name }}">
                @error('bank_name')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>

              <div class="form-group">
                <label>Address</label>
                <textarea name="address" id="" cols="30" rows="10" class="form-control">{{ $user->bank->address }}</textarea>
                @error('address')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>

                <button class="btn text-white" type="submit" style="background-color:#009933;">Save</button>
            </form>
          </div>
      </div>

        {{-- <div class="card" style="border-top:2px #009933 solid;">
            <div class="card-header">
              <h4>Update Password</h4>
            </div>
            <div class="card-body">
              <form method="POST" action="{{ route('admin.password.update', user->id) }}">
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
        </div> --}}
    </div>
  </section>

@endsection

@push('scripts')
<script>
  $(document).ready(function () {
      $('.image-preview').css({
          'background-image': 'url({{ asset($user->avatar) }})',
          'background-size': 'cover',
          'background-position': 'center',
      });
  });
</script>
@endpush
