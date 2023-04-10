@extends('layout.blog_layout')
@section('content')
    <div class="hero-area height-600 bg-img background-overlay"
        style="background-image: url({{ url('/img/blog-img/bg1.jpg') }});">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="single-blog-title text-center">
                        <h3>All Category list</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ********** Hero Area End ********** -->

    <div class="main-content-wrapper section-padding-100">
        <div class="container">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @elseif($message = Session::get('failed'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <table class="table table-striped" width="100%" cellspacing="0" id="table_id">
                <thead>
                    <th>S.N.</th>
                    <th>Category Name</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th class="text-center">Manage Status</th>
                </thead>
                @foreach ($categories as $key => $category)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $category->title }}</td>
                        <td>{{ $category->status }}</td>
                        <td>
                            <a class="btn" href="{{ route('category.edit', $category->id) }}">
                                <ion-icon size="small" name="create"></ion-icon>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('category.destroy', $category->id) }}" data-id="{{ $category->id }}"
                                method="post" class="category_form_delete">
                                @method('DELETE') @csrf
                                <button class="btn text-secondary" onclick="confirmDelete(this)" type="submit">
                                    <ion-icon size="small" name="trash"></ion-icon>
                                </button>
                            </form>
                        </td>
                        <td class="text-center"><a href="#">Activate</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
