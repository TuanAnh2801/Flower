@extends('backend.authenticate.layouts.app')
@section('content')

<div class="row my-5">
    <h3 class="fs-4 mb-3">All Product</h3>
    <div class="col">
        <table class="table bg-white rounded shadow-sm  table-hover table-striped table-success ">
            <thead>
                <tr>
                    <th scope="col" width="50">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    {{-- <th scope="col">Description</th> --}}
                    <th scope="col">Img</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Edit/Delete</th>
                    
                </tr>
            </thead>
            @foreach ($products as $product )
                <tbody class="">
                    <tr>
                        <th scope="row">{{ ++$i }}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category->name_category }}</td>
                        {{-- <td>{{ $product->desc }}</td> --}}
                        <td>
                            @foreach($product->img as $image)
                            <img src="{{ asset('storage/backend/product/'.$image) }}" style="width:40px; height:40px" />
                            @endforeach
                        </td>
                        
                        <td>{{ $product->inventory->quantity }}</td>
                        <td>{{ $product->price }}$</td>


                        {{-- <td>{{ $product-> }}</td>
                        <td> --}}
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
                          <td>
                            <a style="margin-left: 15px;" href="{{ url("admin/product/{$product->id}/edit") }}"><i class="fas fa-edit"></i></a>


                            <a href="javascript:void(0)" onclick=" confirm('bạn có muốn xóa') && document.getElementById('delete-'+{{$product->id}}).submit()"><i style="color: black" class="fas fa-trash"></i> </a>
                            <form id="delete-{{$product->id}}" method="POST" action="{{url("admin/delete/{$product->id}")}}" >
                                @csrf
                                @method("DELETE")
                            
                            </form>
                        </td>
                        
                    </tr>
                
                </tbody>
            
            @endforeach
        </table>
        {{ $products->links() }}
    </div>


@endsection