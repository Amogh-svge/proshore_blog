<!DOCTYPE html>
<html lang="en">

@extends('layout.blog_layout')

@section('content')
    <!-- ********** Hero Area Start ********** -->
    <div class="hero-area height-400 bg-img background-overlay" style="background-image: url(/img/blog-img/bg3.jpg);">
        <div class="single-blog-title height-400 main_heading">
            <h3 class=" ">Edit Blog</h3>
        </div>
    </div>
    <!-- ********** Hero Area End ********** -->
    <main class="main-content">
        <form action="{{ route('blogs.update', $blog->id) }}" class="blog_form" method="POST" enctype="multipart/form-data">
            @method('PUT') @csrf

            <div class="form-group">
                <label for="" class="form-label">Blog Title</label>
                <input type="text" name="title" value="{{ $blog->title }}" placeholder="Enter Your Title">
                @include('common.error', [($value = 'title')])
            </div>

            <div class="form-group">
                <label for="" class="form-label">Blog Summary</label>
                <input type="text" name="summary" value="{{ $blog->summary }}" placeholder="Enter Short Summary">
                @include('common.error', [($value = 'summary')])
            </div>

            <div class="form-group">
                <label for="" class="form-label">Description</label>
                <textarea name="content" id="" cols="30" rows="5" placeholder="Enter your description">{{ $blog->content }}</textarea>
                @include('common.error', [($value = 'content')])
            </div>

            <div class="form-group">
                <label for="" class="form-label">Blog Image</label>
                <input type="file" name="image">
                @include('common.error', [($value = 'image')])
            </div>

            <div class="form-group">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status">
                    <option value="active" {{ $blog->status == 'active' ? 'checked' : '' }}>Active</option>
                    <option value="passive" {{ $blog->status == 'passive' ? 'checked' : '' }}>Passive</option>
                </select>
                @include('common.error', [($value = 'status')])
            </div>


            <div>
                <input type="submit" class="btn btn-dark" value="Update Blog">
            </div>
        </form>
    </main>
@endsection