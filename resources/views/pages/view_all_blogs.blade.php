@extends('layout.blog_layout')
@section('content')
    <!-- ********** Hero Area Start ********** -->

    <div class="hero-area height-600 bg-img background-overlay"
        style="background-image: url({{ url('/storage/blog_images/' . 'download.jpeg') }});">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="single-blog-title text-center">
                        <h3>All blogs</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ********** Hero Area End ********** -->

    <div class="main-content-wrapper section-padding-100">
        <div class="container">

            <!-- ============== All Category Related Post ============== -->
            <div class="row">
                @forelse ($blogs as $blog)
                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                        <!-- Single Blog Post -->
                        <div class="single-blog-post">
                            <!-- Post Thumbnail -->
                            <div class="post-thumbnail">
                                <img src="{{ url('/storage/blog_images/' . $blog->image) }}" alt="">
                                <!-- Catagory -->
                                <div class="post-cta"><a href="#">travel</a></div>
                            </div>
                            <!-- Post Content -->
                            <div class="post-content">
                                <a href="{{ route('view.blog', $blog->slug) }}" class="headline ">
                                    <h5 class="text-hover">{{ $blog->title }}</h5>
                                </a>
                                <p class="line-clamp">{{ $blog->content }}</p>
                                <!-- Post Meta -->
                                <div class="post-meta">
                                    <p><a href="#" class="post-author">{{ $blog->user->name }}</a> on <a
                                            href="#" class="post-date">{{ $blog->publishedAt() }}</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <img src="{{ url('/no-content.svg') }}" alt="">
                        <h5 class="text-center">Nothing Here</h5>
                    </div>
                @endforelse

            </div>

        @empty(!$blogs->toArray())
            <!-- Load More btn -->
            <div class="row">
                <div class="paginate col-12">
                    {{ $blogs->links() }}
                </div>
            </div>
        @endempty

    </div>
</div>
@endsection
