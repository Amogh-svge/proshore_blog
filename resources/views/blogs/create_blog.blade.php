<!DOCTYPE html>
<html lang="en">

@extends('layout.blog_layout')

@section('content')
    <!-- ********** Hero Area Start ********** -->
    <div class="hero-area height-400 bg-img background-overlay" style="background-image: url(/img/blog-img/bg3.jpg);">
        <div class="single-blog-title height-400 main_heading">
            <h3 class=" ">Create Blog</h3>
        </div>
    </div>
    <!-- ********** Hero Area End ********** -->
    <main class="main-content">
        <form action="{{ route('blogs.store') }}" class="blog_form" method="POST">
            @csrf
            <div class="form-group">
                <label for="" class="form-label">Blog Title</label>
                <input type="text" name="title" value="{{ old('title') }}" placeholder="Enter Your Title">
                @include('common.error', [($value = 'title')])
            </div>

            <div class="form-group">
                <label for="" class="form-label">Blog Summary</label>
                <input type="text" name="summary" value="{{ old('summary') }}" placeholder="Enter Short Summary">
                @include('common.error', [($value = 'summary')])
            </div>

            <div class="form-group">
                <label for="" class="form-label">Description</label>
                <textarea name="content" id="" cols="30" rows="5" placeholder="Enter your description"></textarea>
                @include('common.error', [($value = 'content')])
            </div>

            <div class="form-group">
                <label for="" class="form-label">Blog Image</label>
                <input type="file" name="blog_image">
                @include('common.error', [($value = 'blog_image')])
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
                <input type="submit" class="btn btn-dark" value="Create Blog">
            </div>
        </form>
    </main>
@endsection
