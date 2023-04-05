@extends('layout.blog_layout')
@section('content')
    <main class="main-content">
        <table border="1">
            <thead>
                <th>Author Name</th>
                <th>Author_id</th>
                <th>Slug</th>
                <th>Summary</th>
                <th>Status</th>
                <th>Published Date</th>
            </thead>
            @foreach ($blogs as $blog)
                <tr>
                    <td>{{ $blog->user->name }}</td>
                    <td>{{ $blog->author_id }}</td>
                    <td>{{ $blog->slug }}</td>
                    <td>{{ $blog->summary }}</td>
                    <td>{{ $blog->status }}</td>
                    <td>{{ $blog->published_at }}</td>
                </tr>
            @endforeach

        </table>
    </main>
@endsection
