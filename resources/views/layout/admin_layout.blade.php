@php
    use App\Models\Category;
    $categories = Category::all();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>World - Blog &amp; Magazine Template</title>

    <!-- Favicon  -->
    <link rel="icon" href="/img/core-img/favicon.ico">

    {{-- datatables css --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

    {{-- ionicons --}}
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

    <!-- Style CSS -->
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="/custom_styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader">
        <div class="preload-content">
            <div id="world-load"></div>
        </div>
    </div>
    <!-- Preloader End -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area mt-0 ">
        <div class="container">
            <div class="row">
                <div class="col-12 ">
                    <nav class="navbar navbar-expand-lg">
                        <!-- Logo -->
                        <a class="navbar-brand" style="color:white" href="/"><b>BlogWorld</b></a>
                        <!-- Navbar Toggler -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#worldNav"
                            aria-controls="worldNav" aria-expanded="false" aria-label="Toggle navigation"><span
                                class="navbar-toggler-icon"></span></button>
                        <!-- Navbar -->
                        <div class="collapse navbar-collapse" id="worldNav">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('view.home') }}">Home <span
                                            class="sr-only">(current)</span></a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                        role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">Category</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @forelse ($categories as $category)
                                            <a class="dropdown-item"
                                                href="{{ route('view.category', $category->slug) }}">{{ $category->title }}</a>
                                        @empty
                                            <p class="m-0 text-dark text-center"><small>No Categories</small></p>
                                        @endforelse
                                    </div>
                                </li>

                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ route('profile.edit') }}">Profile </a>
                                </li>

                                <li class="nav-item">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="nav-link" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                        this.closest('form').submit();">{{ __('Log Out') }}</a>
                                    </form>
                                </li>
                            </ul>
                            <!-- Search Form  -->
                            <div id="search-wrapper">
                                <form action="#">
                                    <input type="text" id="search" placeholder="Search something...">
                                    <div id="close-icon"></div>
                                    <input class="d-none" type="submit" value="">
                                </form>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <div class="hero-area height-400 bg-img background-overlay" style="background-image: url(/img/blog-img/bg3.jpg);">
        <div class="single-blog-title height-400 main_heading">
            <h3 class=" ">Manage All the blog activities through this Admin Panel</h3>
        </div>
    </div>

    <section class="contact-area">
        <div class="container-fluid">
            <div class="row">
                <!-- Contact Form Area -->
                <div class="col-lg-2 col-md-3" style="background-color: #d0e5e1;">
                    <div class="sidebar">
                        <div class="sidebar-extended">

                            <div class="accordion">
                                <div class="bg-dark accordion_title ">
                                    <div class="accordion_item p-0">
                                        <a class="" href="{{ route('dashboard') }}">Dashboard</a>
                                    </div>
                                </div>

                            </div>

                            <div class=" accordion">
                                <div class="bg-dark accordion_title">
                                    Blogs <i class="fa-solid fa-caret-down"></i>
                                </div>

                                <ul class="bg-dark accordion_items">
                                    <li class="accordion_item">
                                        <a href="{{ route('blogs.create') }}">Create Blog</a>
                                    </li>
                                    <li class="accordion_item">
                                        <a href="{{ route('blogs.index') }}">List Blog</a>
                                    </li>
                                </ul>
                            </div>

                            <div class=" accordion">
                                <div class="bg-dark accordion_title">
                                    Category <i class="fa-solid fa-caret-down"></i>
                                </div>

                                <ul class="bg-dark accordion_items">
                                    <li class="accordion_item">
                                        <a href="{{ route('category.create') }}">Create Category
                                    </li>

                                    <li class="accordion_item">
                                        <a href="{{ route('category.index') }}">List
                                            Category</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-10 col-md-9">
                    @yield('content')
                </div>
            </div>
        </div>
    </section>



    <!-- ***** Footer Area Start ***** -->
    <footer class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="footer-single-widget">
                        <a class="footer-logo" style="color: white;" href="{{ route('view.home') }}">
                            BlogWorld</a>
                        <div class="copywrite-text mt-30">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> | Made with <i class="fa fa-heart-o" aria-hidden="true"></i>
                                by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <p>Proudly distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                            </p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="footer-single-widget">
                        <ul class="footer-menu d-flex justify-content-between">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Fashion</a></li>
                            <li><a href="#">Lifestyle</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Gadgets</a></li>
                            <li><a href="#">Video</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="footer-single-widget">
                        <h5>Subscribe</h5>
                        <form action="#" method="post">
                            <input type="email" name="email" id="email" placeholder="Enter your mail">
                            <button type="button"><i class="fa fa-arrow-right"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ***** Footer Area End ***** -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="/js/jquery/jquery-2.2.4.min.js"></script>

    {{-- datatables  --}}
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
    {{-- iconicons --}}
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>
    <!-- Popper js -->
    <script src="/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="/js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="/js/plugins.js"></script>
    <!-- Active js -->
    <script src="/js/active.js"></script>

    {{-- iconicons --}}

    <script>
        const confirmDelete = (info) => {
            event.preventDefault();
            console.log("clicked");

            //parent class of current node taken 
            var parentNode_class = info.parentNode.className;
            var element = document.querySelectorAll('.' + parentNode_class);
            let data_id = (info.parentNode.dataset.id);
            element.forEach(item => {
                //if the items id matches the info's id
                if (item.dataset.id.match(data_id)) {
                    //submit the element if delete is true
                    this.confirm('Do you want to delete?') === true && item.submit();
                }
            });
        }


        // Dropdown
        var dropdown = document.getElementsByClassName("accordion_title");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }
        // Dropdown Ends
    </script>

</body>

</html>
