@extends('admin.layouts.master')
@section('content')
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title">Edit User</h2>
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="image">Image</label>
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
                                        <label for="username">User Name</label>
                                        <input type="text" name="username" id="username" class="form-control" value="{{ old('username', $user->username) }}">
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
                                        <label for="mobile_number">Mobile Number</label>
                                        <input type="number" name="mobile_number" id="mobile_number" class="form-control" value="{{ old('mobile_number', $user->mobile_number) }}">
                                        <span class="help-block">
                                            @error('mobile_number')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="role">Role</label>
                                        <select name="role" id="role" class="form-control">
                                            <option value="">Select Role</option>
                                            <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                                            <option value="delivery" {{ $user->role === 'delivery' ? 'selected' : '' }}>Delivery</option>
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
                                        <label for="password">Password</label>
                                        <input type="password" id="password" name="password" class="form-control">
                                        <span class="help-block">
                                            @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="latitude">Latitude</label>
                                        <input type="text" id="latitude" name="latitude" class="form-control" value="{{ old('latitude', $user->location ? json_decode($user->location)->latitude : '') }}">
                                        <span class="help-block">
                                            @error('latitude')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="longitude">Longitude</label>
                                        <input type="text" id="longitude" name="longitude" class="form-control" value="{{ old('longitude', $user->location ? json_decode($user->location)->longitude : '') }}">
                                        <span class="help-block">
                                            @error('longitude')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <button type="submit" class="btn mb-2 btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
