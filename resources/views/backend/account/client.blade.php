@extends('backend.authenticate.layouts.app')
@section('content')

<div class="row my-5">
    <h3 class="fs-4 mb-3">Clinet</h3>
    <div class="col">
        <table class="table bg-white rounded shadow-sm  table-hover table-striped table-success ">
            <thead>
                <tr>
                    <th scope="col" width="50">#</th>
                    <th scope="col">User_name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Times</th>
                    {{-- <th scope="col">Password</th> --}}
                    <th scope="col">Sửa/Xóa</th>
                    
                </tr>
            </thead>
            @foreach ($accounts as $account )
                <tbody class="">
                    <tr>
                        <th scope="row">{{ $account->id }}</th>
                        <td>{{ $account->user_name }}</td>
                        <td>{{ $account->email }}</td>
                        <td>{{ $account->telephone }}</td>
                        <td>{{ $account->created_at }}</td>
                        {{-- <td>{{ $account->password }}</td> --}}
                        <td>
                          {{-- <form action="">

                              <a href="{{ url("account/{$account->id}") }}" class="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                  Sửa
                                </a>
                                
                                <!-- Modal -->
              
                              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Chỉnh Sửa</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <label for="exampleInputEmail1" class="form-label">User_name</label>
                                    <input type="email" name="user_name" value="{{ $account->user_name }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Email</label>
                                    <input type="text"  name="email" value="{{ $account->email }}" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">password</label>
                                    <input type="text"  name="password" value="{{ $account->password }}" class="form-control" id="exampleInputPassword1">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                                </div>
                              </div>
                              </div>
                          </form> --}}

                            <a href="{{ url("admin/{$account->id}/edit") }}"><i class="fas fa-edit"></i></a>


                            <a href="javascript:void(0)" onclick=" confirm('bạn có muốn xóa') && document.getElementById('delete-'+{{$account->id}}).submit()"><i class="fas fa-trash"></i> </a>
                            <form id="delete-{{$account->id}}" method="POST" action="{{url("admin/{$account->id}")}}" >
                                @csrf
                                @method("DELETE")
                            
                            </form>
                        </td>
                        
                    </tr>
                
                </tbody>
            
            @endforeach
        </table>
        {{ $accounts->links() }}
    </div>
{{-- </div> --}}

@endsection