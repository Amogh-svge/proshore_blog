<!DOCTYPE html>
<html lang="en">

@extends('layout.blog_layout')

@section('content')
    <!-- ********** Hero Area Start ********** -->
    <div class="hero-area height-400 bg-img background-overlay" style="background-image: url(/img/blog-img/bg3.jpg);">
        <div class="single-blog-title height-400 main_heading">
            <h3 class=" ">Create Category</h3>
        </div>
    </div>
    <!-- ********** Hero Area End ********** -->
    <main class="main-content">
        <form action="{{ route('category.store') }}" class="blog_form" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="" class="form-label">*Category Title</label>
                <input type="text" name="title" value="{{ old('title') }}" placeholder="Enter Your Title">
                @include('common.error', [($value = 'title')])
            </div>

            <div class="form-group">
                <label for="" class="form-label">*Category Content</label>
                <textarea name="content" id="" cols="30" rows="5" placeholder="Enter your content"></textarea>
                @include('common.error', [($value = 'content')])
            </div>

            <div class="form-group">
                <label for="" class="form-label">*Category Image</label>
                <input type="file" name="image">
                @include('common.error', [($value = 'image')])
            </div>

            <div class="form-group">
                <label for="status" class="form-label">Status</label>
                <select name="status" value="{{ old('status') }}" id="status">
                    <option value="active">Active</option>
                    <option value="passive" selected>Passive</option>
                </select>
                @include('common.error', [($value = 'status')])
            </div>

            <div>
                <input type="submit" class="btn btn-dark" value="Add Category">
            </div>
        </form>
    </main>
@endsection
