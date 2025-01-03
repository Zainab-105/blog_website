<!DOCTYPE html>
<html>
<head>
    @include("admin.admincss")
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Correct SweetAlert2 CDN -->
</head>
<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        @include('admin.sidebar')
        <div class="page-content" style="color: antiquewhite">
            <div class="container">
                <h2>Posts List</h2>

                @if(session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <table class="table table-bordered" style="color: antiquewhite">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($posts as $post)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->description }}</td>
                                <td>
                                    <img src="{{ asset('/storage/' . $post->image) }}" alt="" width="50px">
                                </td>
                                <td>
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline-block;" id="deleteForm-{{ $post->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $post->id }})">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin.footer')

    <!-- JavaScript for SweetAlert -->
    <script>
        function confirmDelete(postId) {
            Swal.fire({
                title: "Are You Sure?",
                text: "You won't be able to revert this!",
                icon: "warning", // Fixed typo here
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit the form to delete the post if confirmed
                    document.getElementById('deleteForm-' + postId).submit();
                }
            });
        }
    </script>
</body>
</html>
