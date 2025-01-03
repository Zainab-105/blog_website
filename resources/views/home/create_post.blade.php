<!DOCTYPE html>
<html>
<head> 
   @include("home.homestyle")
   <!-- Include SweetAlert2 CDN -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
   @include('home.header')
   
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
            <div class="card mt-5">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Add New Post</h4>
                </div>
                <div class="card-body">
                    <form id="postForm" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
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
                            <button type="submit" class="btn btn-primary btn-block" id="submitBtn">Save Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('home.footer')

<!-- Script to trigger SweetAlert on button click -->
<script>
    document.getElementById("submitBtn").addEventListener("click", function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Show SweetAlert confirmation
        Swal.fire({
            title: 'Submit Post?',
            text: 'Are you sure you want to submit this post?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, submit it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the form if user confirms
                document.getElementById("postForm").submit();
               
            }
        });
    });
</script>

</body>
</html>
