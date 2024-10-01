<!DOCTYPE html>
<html>
  <head> 
   @include("admin.admincss")
  </head>
  <body>
   @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
         
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Edit Post</h4>
                </div>
                <div class="card-body">
                    <!-- Form to edit the post -->
                    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <!-- Post Title -->
                        <div class="form-group">
                            <label for="title">Post Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" placeholder="Enter post title" required>
                        </div>

                        <!-- Description -->
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter post description" required>{{ $post->description }}</textarea>
                        </div>

                        <!-- Current Image Display -->
                        <div class="form-group">
                            <label for="current_image">Current Image</label>
                            <div>
                                <img src="{{ asset('images/' . $post->image) }}" alt="Post Image" class="img-fluid" width="150">
                            </div>
                        </div>

                        <!-- Image Upload (Optional) -->
                        <div class="form-group">
                            <label for="image">Change Post Image (Optional)</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Update Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    </div>
    </div>
    @include('admin.footer')
  </body>
</html>
