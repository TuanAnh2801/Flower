@extends('backend.authenticate.layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Category') }}</div>

                    <form action="{{ url('admin/createCategory') }}" method="POST">
                        @csrf
                        <div class="card-body">


                            {{-- <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                placeholder="email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}

                            <div class="mb-3">
                                <label for="name_category" class="form-label">Name Category</label>
                                <input name="name_category" type="text"
                                    class="form-control @error('name_category') is-invalid @enderror" id="name_category"
                                    placeholder="name_category">
                                @error('name_category')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>



                            <div class="mb-3">
                                <label for="desc" class="form-label">Desc</label>
                                <textarea name="desc" type="text"
                                    class="form-control @error('desc') is-invalid @enderror" id="desc"
                                    placeholder="desc"></textarea>
                                @error('desc')
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
