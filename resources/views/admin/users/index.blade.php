@extends('admin.layouts.master')

@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="page-title">users </h2>
                    <div class="row">

                        <div class="col-md-12 my-4">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h5 class="card-title"> Users</h5>
                                   
                                    <table class="table table-hover">
                                        <thead class="thead-dark">
                                            <tr>

                                                {{-- <th>image</th> --}}
                                                <th>user name</th>
                                                <th>mobile_number</th>
                                                <th>location</th>
                                                <th>role</th>
                                                <th>Actions</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($users as $user)
                                                <tr>

                                                    {{-- <td>
                                                        <img src="{{ asset('storage/' . $user->image) }}" alt="User Image" style="max-width: 200px;">

                                                  </td> --}}
                                                    <td>{{ $user->username }}</td>
                                                    <td>{{ $user->mobile_number }}</td>
                                                    <td>{{ $user->location }}</td>
                                                    <td>{{ $user->role }}</td>
                                                    <td>

                                                        <div class="mb-2 row">
                                                            <div style="padding-left: 20px;padding-right: 20px">
                                                                <a href="{{route('users.edit',$user)}}" class="btn mb-2 btn-outline-primary">Edit</a>
                                                            </div>
                                                         <div>
                                                            <form method="POST" action="{{route('users.destroy',[$user->id])}}">
                                                                @csrf
                                                                @method('delete')
                                                                <button class="btn mb-2 btn-outline-danger" data-id={{$user->id}} data-toggle="tooltip" data-placement="bottom" title="Delete">Delete</button>
                                                            </form>
                                                         </div>
                                                        </div>

                                                      </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="9">No data</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <hr>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection


