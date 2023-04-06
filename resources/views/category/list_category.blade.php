@extends('layout.blog_layout')
@section('content')
    <div class="hero-area height-600 bg-img background-overlay"
        style="background-image: url({{ url('/img/blog-img/bg1.jpg') }});">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="single-blog-title text-center">
                        <h3>All Blogs list</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ********** Hero Area End ********** -->

    <div class="main-content-wrapper section-padding-100">
        <div class="container">

            <table border="1">
                <thead>
                    <th>Author Name</th>
                    <th>Author_id</th>
                    <th>Slug</th>
                    <th>Summary</th>
                    <th>Status</th>
                    <th>Published Date</th>
                </thead>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->user->name }}</td>
                        <td>{{ $category->author_id }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ $category->summary }}</td>
                        <td>{{ $category->status }}</td>
                        <td>{{ $category->published_at }}</td>
                    </tr>
                @endforeach

            </table>

        </div>
    </div>
@endsection
