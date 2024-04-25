@extends('admin.layouts.master')
@section('content')
<main role="main" class="main-content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <h2 class="page-title">Create Notification</h2>
          <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('notifications.send') }}" method="POST" enctype="multipart/form-data">
                    @csrf
              <div class="row">
        
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="simpleinput">Notification Message</label>
                        <textarea name="message" id="message" cols="30" rows="5" class="form-control"></textarea>
                        <span class="help-block">
                            @error('message')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </span>
                    </div>
                </div>
              </div>
              <div class="mb-2">
                <button type="submit" class="btn mb-2 btn-primary">Send</button>
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
