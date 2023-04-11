@extends('layout.admin_layout')

@section('content')
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
                    <th>Author Name</th>
                    <th>title</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    {{-- <th>Details</th> --}}
                    <th>Published</th>
                </thead>
                @foreach ($blogs as $key => $blog)
                    <tr>
                        <td class="text-center">{{ $key + 1 }}</td>
                        <td>{{ $blog->user->name }}</td>
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->status }}</td>
                        <td class="text-center">
                            <a class="btn" href="{{ route('blogs.edit', $blog->id) }}">
                                <ion-icon size="small" name="create"></ion-icon>
                            </a>
                        </td>
                        <td class="text-center">
                            <form action="{{ route('blogs.destroy', $blog->id) }}" data-id="{{ $blog->id }}"
                                method="post" class="blog_form_delete">
                                @method('DELETE') @csrf
                                <button class="btn text-secondary" onclick="confirmDelete(this)" type="submit">
                                    <ion-icon size="small" name="trash"></ion-icon>
                                </button>
                            </form>
                        </td>
                        {{-- <td class="text-center">
                            <a class="btn" href="#">
                                <ion-icon size="small" name="information-circle-outline"></ion-icon>
                            </a>
                        </td> --}}
                        <td>{{ date('F j, Y, ', (int) $blog->published_at) }}</td>
                    </tr>
                @endforeach

            </table>

        </div>
    </div>
@endsection

@section('script')
@endsection
