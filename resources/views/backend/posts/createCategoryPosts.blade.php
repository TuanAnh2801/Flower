@extends('backend.authenticate.layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Category') }}</div>

                    <form action="{{ url('admin/posts/category') }}" method="POST">
                        @csrf
                        <div class="card-body">


                       

                            <div class="mb-3">
                                <label for="name" class="form-label">Name Category</label>
                                <input name="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" id="name"
                                    placeholder="name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>



                        <div class="card-footer">
                            <button type="submit"
                                style="background: greenyellow;     border-radius: 5px; padding:3px">Create Category</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    @if (session('updateCategory'))
        <div class="alert alert-primary alert-dismissible fade show position-fixed bottom-0 end-0" role="alert">
            {{ session('updateCategory') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
@endsection
