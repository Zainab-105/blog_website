<!DOCTYPE html>
<html>
<head>
    @include("admin.admincss")
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

                <table class="table table-bordered" >
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
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
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
</body>
</html>
