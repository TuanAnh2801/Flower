@extends('backend.authenticate.layouts.app')
@section('content')
    <h3 class="fs-4 mb-3">Subcribe</h3>
    <div class="col">
        <table class="table bg-white rounded shadow-sm  table-hover table-striped table-success ">
            <thead>
                <tr>
                    <th scope="col" width="50">#</th>
                    <th scope="col">Email</th>
                    <th scope="col">Days</th>
                    <th scope="col">delete</th>

                </tr>
            </thead>
            @foreach ($subcribes as $subcribe)
                {{-- @dd($subcribe) --}}
                {{-- @dd($order['user']) --}}
                <tbody class="">
                    <tr>
                        <th scope="row">{{ ++$i }}</th>
                        <td>{{ $subcribe['email'] }}</td>
                        <td>{{ $subcribe['created_at'] }}</td>
                        <td>
                            <a href="#"
                                onclick="if (confirm('Bạn có chắc chắn muốn xóa?')) { document.getElementById('delete-form-{{ $subcribe['id'] }}').submit(); }">
                                <i class="fas fa-trash"></i>
                            </a>

                            <form id="delete-form-{{ $subcribe['id'] }}" method="POST"
                                action="{{ route('subcribe.delete', $subcribe['id']) }}">
                                @csrf
                                @method('DELETE')
                            </form>
                    </tr>

                </tbody>
            @endforeach
        </table>
        {{ $subcribes->links() }}
    </div>
    <button class="btn btn-primary" onclick="openForm()">Reply</button>

    <div id="myForm" class="my-4 p-4 bg-light rounded" style="display:none;">
        <h2>Enter Email Send</h2>
        <form action="{{ url('admin/createTextMail') }}" method="POST">
            @csrf
            <div class="form-group">
                <textarea name="content" class="form-control" id="myTextarea" rows="10" cols="50"></textarea>
            </div>
            <div class="d-flex justify-content-between">
                <button type="sumbit" class="btn btn-success" onclick="submitForm()">Send</button>
                <button type="button" class="btn btn-danger" onclick="closeForm()">Close</button>
            </div>
        </form>

    </div>

    @if (session('subcribeMail'))
        <div class="alert alert-primary alert-dismissible fade show position-fixed bottom-0 end-0" role="alert">
            {{ session('subcribeMail') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('delete'))
        <div class="alert alert-danger alert-dismissible fade show position-fixed bottom-0 end-0" role="alert">
            {{ session('delete') }}
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


<script>
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }

    function submitForm() {
        var text = document.getElementById("myTextarea").value;
        // Gửi nội dung bài viết đến máy chủ ở đây
        // Ví dụ: sử dụng AJAX để gửi dữ liệu lên máy chủ
    }
</script>
