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
                    <h4 class="mb-0">Add New Post</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf <!-- Laravel CSRF protection -->
                        
                        <!-- Post Title -->
                        <div class="form-group">
                            <label for="title">Post Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter post title" required>
                        </div>

                        <!-- Description -->
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter post description" required></textarea>
                        </div>

                        <!-- Image Upload -->
                        <div class="form-group">
                            <label for="image">Post Image</label>
                            <input type="file" class="form-control-file" id="image" name="image" required>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Save Post</button>
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