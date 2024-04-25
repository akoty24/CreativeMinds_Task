@extends('admin.layouts.master')
@section('content')
<main role="main" class="main-content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <h2 class="page-title">add user</h2>
          <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="image">image</label>
                        <input type="file" name="image" id="imageInput" class="form-control">
                        <span class="help-block">
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </span>
                    </div>
                 
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="simpleinput">user Name</label>
                        <input type="text" name="username" id="simpleinput" class="form-control">
                        <span class="help-block">
                            @error('username')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </span>
                    </div>
                </div>
              </div>

  
              <div class="row">

                <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="simpleinput"> mobile_number</label>
                      <input type="number" name="mobile_number" id="simpleinput" class="form-control">
                      <span class="help-block">
                          @error('mobile_number')
                              <div class="text-danger">{{ $message }}</div>
                          @enderror
                      </span>
                    </div>
                  </div> <!-- /.col -->
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="role">role </label>
                        <select name="role" id="role" class="form-control">
                            <option value="">select role </option>
                           
                                <option value="user">User</option>
                                <option value="delivery">Delivery</option>

                        </select>

                        <span class="help-block">
                            @error('role')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </span>

                    </div>
                    <br>

                </div>
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="simpleinput">Password</label>
                      <input id="password" type="password" class="form-control" name="password" required >
                      <span class="help-block">
                          @error('password')
                              <div class="text-danger">{{ $message }}</div>
                          @enderror
                      </span>
                    </div>
                  </div> <!-- /.col -->
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="simpleinput">latitude</label>
                      <input id="latitude" type="text" class="form-control @error('latitude') is-invalid @enderror" name="latitude" value="{{ old('latitude', $user->location['latitude'] ?? '') }}" required autocomplete="latitude">
                      <span class="help-block">
                          @error('latitude')
                              <div class="text-danger">{{ $message }}</div>
                          @enderror
                      </span>
                    </div>
                  </div> <!-- /.col -->
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="simpleinput">langitude</label>
                      <input id="longitude" type="text" class="form-control @error('longitude') is-invalid @enderror" name="longitude" value="{{ old('longitude', $user->location['longitude'] ?? '') }}" required autocomplete="longitude">

                      <span class="help-block">
                          @error('longitude')
                              <div class="text-danger">{{ $message }}</div>
                          @enderror
                      </span>
                    </div>
                  </div> <!-- /.col -->
              </div>
              <div class="mb-2">
                <button type="submit" class="btn mb-2 btn-primary">Create</button>
            </div>
                </form>
            </div>
          </div> <!-- / .card -->
        </div> <!-- end section -->
      </div> <!-- .col-12 -->
    </div> <!-- .row -->
  </div> <!-- .container-fluid -->
</main> <!-- main -->
@endsection
