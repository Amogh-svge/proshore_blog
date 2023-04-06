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
        style="background-image: url({{ url('/storage/blog_images/' . $blog->image) }});">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="single-blog-title text-center">
                        <h3>{{ $blog->title }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ********** Hero Area End ********** -->

    <div class="main-content-wrapper section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <!-- ============= Post Content Area ============= -->
                <div class="col-12 col-lg-8">
                    <div class="single-blog-content mb-100">
                        <!-- Post Meta -->
                        <div class="post-meta">
                            {{-- <p><a href="#" class="post-author">{{ $blog->user->name }}</a> on <a href="#"
                                    class="post-date">Sep
                                    29, 2017 at 9:48 am</a></p> --}}

                            <p><a href="#" class="post-author">{{ $blog->user->name }}</a> on <a href="#"
                                    class="post-date">{{ $date->parse($blog->published_at)->isoFormat('lll') }}</a></p>
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                            <h6>{{ $blog->content }}</h6>

                            <blockquote class="mb-30">
                                <h6>Aliquam auctor lacus a dapibus pulvinar. Morbi in elit erat. Quisque et augue nec
                                    tortor blandit hendrerit eget sit amet sapien. Curabitur at tincidunt metus, quis
                                    porta ex. Duis lacinia metus vel eros cursus pretium eget.</h6>
                                <div class="post-author">
                                    <p>Robert Morgan</p>
                                </div>
                            </blockquote>
                            <h6>Donec orci dolor, pretium in luctus id, consequat vitae nibh. Quisque hendrerit, lorem
                                sit amet mollis malesuada, urna orci volutpat ex, sed scelerisque nunc velit et massa.
                                Sed maximus id erat vel feugiat. Phasellus bibendum nisi non urna bibendum elementum.
                                Aenean tincidunt nibh vitae ex facilisis ultrices. Integer ornare efficitur ultrices.
                                Integer neque lectus, venenatis at pulvinar quis, aliquet id neque. Mauris ultrices
                                consequat velit, sed dignissim elit posuere in. Cras vitae dictum dui.</h6>
                            <!-- Post Tags -->
                            <ul class="post-tags">
                                <li><a href="#">Manual</a></li>
                                <li><a href="#">Liberty</a></li>
                                <li><a href="#">Recommendations</a></li>
                                <li><a href="#">Interpritation</a></li>
                            </ul>
                            <!-- Post Meta -->
                            <div class="post-meta second-part">
                                <p><a href="#" class="post-author">Katy Liu</a> on <a href="#"
                                        class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ========== Sidebar Area ========== -->
                <div class="col-12 col-md-8 col-lg-4">
                    <div class="post-sidebar-area mb-100">
                        <!-- Widget Area -->
                        <div class="sidebar-widget-area">
                            <h5 class="title">About World</h5>
                            <div class="widget-content">
                                <p>The mango is perfect in that it is always yellow and if it’s not, I don’t want to
                                    hear about it. The mango’s only flaw, and it’s a minor one, is the effort it
                                    sometimes takes to undress the mango, carve it up in a way that makes sense, and
                                    find its way to the mouth.</p>
                            </div>
                        </div>
                        <!-- Widget Area -->
                        <div class="sidebar-widget-area">
                            <h5 class="title">Top Stories</h5>
                            <div class="widget-content">
                                <!-- Single Blog Post -->
                                <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                    <!-- Post Thumbnail -->
                                    <div class="post-thumbnail">
                                        <img src="/img/blog-img/b11.jpg" alt="">
                                    </div>
                                    <!-- Post Content -->
                                    <div class="post-content">
                                        <a href="#" class="headline">
                                            <h5 class="mb-0">How Did van Gogh’s Turbulent Mind Depict One of the Most
                                            </h5>
                                        </a>
                                    </div>
                                </div>
                                <!-- Single Blog Post -->
                                <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                    <!-- Post Thumbnail -->
                                    <div class="post-thumbnail">
                                        <img src="/img/blog-img/b13.jpg" alt="">
                                    </div>
                                    <!-- Post Content -->
                                    <div class="post-content">
                                        <a href="#" class="headline">
                                            <h5 class="mb-0">How Did van Gogh’s Turbulent Mind Depict One of the Most
                                            </h5>
                                        </a>
                                    </div>
                                </div>
                                <!-- Single Blog Post -->
                                <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                    <!-- Post Thumbnail -->
                                    <div class="post-thumbnail">
                                        <img src="/img/blog-img/b14.jpg" alt="">
                                    </div>
                                    <!-- Post Content -->
                                    <div class="post-content">
                                        <a href="#" class="headline">
                                            <h5 class="mb-0">How Did van Gogh’s Turbulent Mind Depict One of the Most
                                            </h5>
                                        </a>
                                    </div>
                                </div>
                                <!-- Single Blog Post -->
                                <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                    <!-- Post Thumbnail -->
                                    <div class="post-thumbnail">
                                        <img src="/img/blog-img/b10.jpg" alt="">
                                    </div>
                                    <!-- Post Content -->
                                    <div class="post-content">
                                        <a href="#" class="headline">
                                            <h5 class="mb-0">How Did van Gogh’s Turbulent Mind Depict One of the Most
                                            </h5>
                                        </a>
                                    </div>
                                </div>
                                <!-- Single Blog Post -->
                                <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                    <!-- Post Thumbnail -->
                                    <div class="post-thumbnail">
                                        <img src="/img/blog-img/b12.jpg" alt="">
                                    </div>
                                    <!-- Post Content -->
                                    <div class="post-content">
                                        <a href="#" class="headline">
                                            <h5 class="mb-0">How Did van Gogh’s Turbulent Mind Depict One of the Most
                                            </h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- ============== Related Post ============== -->
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
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
                            <a href="#" class="headline">
                                <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in
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

                <div class="col-12 col-md-6 col-lg-4">
                    <!-- Single Blog Post -->
                    <div class="single-blog-post">
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                            <img src="/img/blog-img/b2.jpg" alt="">
                            <!-- Catagory -->
                            <div class="post-cta"><a href="#">travel</a></div>
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                            <a href="#" class="headline">
                                <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in
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

                <div class="col-12 col-md-6 col-lg-4">
                    <!-- Single Blog Post -->
                    <div class="single-blog-post">
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                            <img src="/img/blog-img/b7.jpg" alt="">
                            <!-- Catagory -->
                            <div class="post-cta"><a href="#">travel</a></div>
                            <!-- Video Button -->
                            <a href="https://www.youtube.com/watch?v=IhnqEwFSJRg" class="video-btn"><i
                                    class="fa fa-play"></i></a>
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                            <a href="#" class="headline">
                                <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in
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
            </div>

            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="post-a-comment-area mt-70">
                        <h5>Get in Touch</h5>
                        <!-- Contact Form -->
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-12">
                                    <div class="group">
                                        <textarea name="message" id="message" required></textarea>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Enter your comment</label>

                                    </div>
                                </div>
                                <span class="col-12">
                                    <button type="submit" class="btn world-btn">Post comment</button>
                                </span>
                            </div>

                        </form>

                    </div>
                </div>

                <div class="col-12 col-lg-8">
                    <!-- Comment Area Start -->
                    <div class="comment_area clearfix mt-70">
                        <ol>
                            @foreach ($blog->comment as $comment)
                                <!-- Single Comment Area -->
                                {{-- @dd($comment->user) --}}
                                <li class="single_comment_area">
                                    <!-- Comment Content -->
                                    <div class="comment-content">
                                        <!-- Comment Meta -->
                                        <div class="comment-meta d-flex align-items-center justify-content-between">
                                            <p><a href="#" class="post-author">{{ $comment->user->name }}</a> on <a
                                                    href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                                            <a href="#" class="comment-reply btn world-btn">Reply</a>
                                        </div>
                                        <p>{{ $comment->comments }}</p>
                                    </div>
                                </li>
                            @endforeach

                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
