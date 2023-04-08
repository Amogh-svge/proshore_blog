@extends('layout.blog_layout')

@section('php')
    @php
        use Carbon\Carbon;
        $date = Carbon::now();
    @endphp
@endsection

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
                @for ($i = 0; $i < 20; $i++)
                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                        <!-- Single Blog Post -->
                        <div class="single-blog-post">
                            <!-- Post Thumbnail -->
                            <div class="post-thumbnail">
                                <img src="/img/blog-img/b1.jpg" alt="">
                                <!-- Catagory -->
                                <div class="post-cta"><a href="#">travel</a></div>
                            </div>
                            <!-- Post Content -->
                            <div class="post-content">
                                <a href="#" class="headline ">
                                    <h5 class="text-hover">How Did van Gogh’s Turbulent Mind Depict One of the Most Complex
                                        Concepts in
                                        Physics?</h5>
                                </a>
                                <p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p>
                                <!-- Post Meta -->
                                <div class="post-meta">
                                    <p><a href="#" class="post-author">Katy Liu</a> on <a href="#"
                                            class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
                <!-- Load More btn -->
                <div class="col-12">
                    <div class="load-more-btn mt-50 text-center">
                        <a href="#" class="btn world-btn">Load More</a>
                    </div>
                </div>
                <!-- Load More btn -->
            </div>

        </div>
    </div>
@endsection
