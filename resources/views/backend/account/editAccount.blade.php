@extends('backend.authenticate.layouts.app')
@section('content')
<form method="POST" action="{{ url("admin/{$accounts->id}") }}">
@method('PUT') 
@csrf
<div class="modal-body">
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">User_name</label>
    <input type="text" name="user_name" value="{{ $accounts->user_name }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Email</label>
    <input type="text"  name="email" value="{{ $accounts->email }}" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">password</label>
    <input type="text"  name="password" value="{{ $accounts->password }}" class="form-control" id="exampleInputPassword1">
    </div>
  
        <button type="submit" class="form-submit">Save</button>
        

</div>
</form>
@endsection