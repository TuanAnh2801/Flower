@extends('backend.authenticate.layouts.app')
@section('content')
    <div class="row my-5">
        {{-- @foreach ($products as $product)
        
        @endforeach
        --}}
        <h3 class="fs-4 mb-3">Product</h3>
        <li class="nav-item dropdown nav nav-item">
            <a class="nav-item dropdown-toggle list-group-item list-group-item-action bg-transparent second-text fw-bold "
                href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Category</a>


            <ul class="ms-3 dropdown-menu" aria-labelledby="navbarDropdownMenuLink ml">
                {{-- <li><a class="dropdown-item" href="{{ url('admin/order/showOrder') }}">All Orders</a></li>
                <li><a class="dropdown-item" href="{{ url('admin/order/delivery') }}">Delivery All Orders</a></li> --}}
                @foreach ($categories as $category)
                {{-- @dd($category->id) --}}
                    <li>
                        <a class="dropdown-item" href='{{ route('backend.category-product.index', $category->id) }}'>{{ $category->name_category }}</a>
                    </li>
                @endforeach
            </ul>
        </li>
        <div class="col">
            <table class="table bg-white rounded shadow-sm  table-hover table-striped table-success ">
                <thead>
                    <tr>
                        <th scope="col" width="50">STT</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        {{-- <th scope="col">Description</th> --}}
                        <th scope="col">Img</th>
                        <th style="text-align: center;" scope="col">Quantity</th>
                        <th style="text-align: center;" scope="col">Price</th>
                        <th scope="col">Edit/Delete</th>

                    </tr>
                </thead>
                @foreach ($products as $product)
                    <tbody class="">
                        <tr>

                            <td scope="row">{{ ++$i }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name_category }}</td>
                            {{-- <td>{{ $product->desc }}</td> --}}
                            <td>
                                @foreach ($product->img as $image)
                                    <img src="{{ asset('storage/backend/product/' . $image) }}"
                                        style="width:40px; height:40px" />
                                @endforeach
                            </td>

                            <td style="text-align: center;">{{ $product->inventory->quantity }}</td>
                            <td style="text-align: right;">{{ number_format($product->price) }} VND</td>


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
                                <a style="margin-left: 15px;" href="{{ url("admin/product/{$product->id}/edit") }}"><i
                                        class="fas fa-edit"></i></a>


                                <a href="javascript:void(0)"
                                    onclick=" confirm('bạn có muốn xóa') && document.getElementById('delete-'+{{ $product->id }}).submit()"><i
                                        style="color: black" class="fas fa-trash"></i> </a>
                                <form id="delete-{{ $product->id }}" method="POST"
                                    action="{{ url("admin/delete/{$product->id}") }}">
                                    @csrf
                                    @method('DELETE')

                                </form>
                            </td>

                        </tr>

                    </tbody>
                @endforeach
            </table>
            {{ $products->links() }}
        </div>

        @if (session('delete'))
            <div class="alert alert-danger alert-dismissible fade show position-fixed bottom-0 end-0" role="alert">
                {{ session('delete') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-primary alert-dismissible fade show position-fixed bottom-0 end-0" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    @endsection
    <script>
        // Tự động ẩn đoạn thông báo sau 5 giây
        setTimeout(function() {
            document.querySelector('.alert').classList.remove('show');
        }, 5000);
    </script>
