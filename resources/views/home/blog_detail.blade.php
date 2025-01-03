<!DOCTYPE html>
<html>
  <head> 
   @include("home.homestyle")
   <style>
      .blog-detail-section {
     padding: 60px 0;
 }
 .blog-image{
  display: flex;
  justify-content: center;
 }
 .blog-image img {
     border-radius: 8px;
     object-fit: cover;
   
     width: 200px;
     object-fit: cover
 
 }
 
 .blog-title {
     font-size: 2.5rem;
     font-weight: 700;
     text-align: center;
     margin-bottom: 20px;
 }
 
 .blog-content {
     font-size: 1.1rem;
     line-height: 1.8;
     text-align: justify;
 }
 
 .blog-author {
     text-align: right;
     font-size: 1rem;
     font-style: italic;
 }
  </style> 
  </head>
  <body>
      <div class="blog-detail-section layout_padding mt-5">
         <div class="container">
             <!-- Blog Image -->
             <div class="blog-image">
                 <img src="{{ asset('/storage/'.$blog->image) }}" alt="{{ $blog->title }}" class="img-fluid w-100">
             </div>
     
             <!-- Blog Heading -->
             <div class="blog-heading mt-4">
                 <h1 class="blog-title">{{ $blog->title }}</h1>
             </div>
     
             <!-- Blog Content -->
             <div class="blog-content mt-3">
                 <p>{{ $blog->description }}</p>
             </div>
     
             <!-- Blog Author -->
             <div class="blog-author mt-5">
                 <p><strong>Posted by:</strong> {{ $blog->user_type }}</p>
             </div>
         </div>
     </div>
     
     @include('home.footer')
   </body>
 </html>