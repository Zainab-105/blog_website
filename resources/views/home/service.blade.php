<div class="services_section layout_padding">
   <div class="container">
      <h1 class="services_taital text-center mb-4">Welcome to Our Blog</h1>
      <p class="services_text text-center mb-5">Welcome to our blog, where we share the latest insights, tips, and trends in web development, design, and technology. Whether you're a beginner or a seasoned professional, you'll find valuable tutorials, industry updates, and expert opinions to help you grow. Explore our content and stay informed on the cutting edge of tech!</p>
      
      <div class="row">
         @foreach($blogs as $blog)
            <div class="col-md-4 mb-4">
               <div class="card h-100 shadow-sm">
                  <!-- Blog Image -->
                  <img src="{{asset('/storage/'.$blog->image)}}" alt="{{$blog->title}}" class="card-img-top" style="max-height: 200px; object-fit: cover;">
                  
                  <div class="card-body">
                     <!-- Blog Title -->
                     <h5 class="card-title">{{$blog->title}}</h5>
                     
                     <!-- Blog Excerpt (Optional, if needed) -->
                     <p class="card-text">{{ \Illuminate\Support\Str::limit($blog->description, 100) }}</p>

                     <!-- Read More Button -->
                     <div class="text-center">
                        <a href="{{ route('blog.detail', ['id' => $blog->id]) }}" class="btn btn-primary">Read More</a>
                     </div>
                  </div>
               </div>
            </div>
         @endforeach
      </div>
   </div>
</div>
