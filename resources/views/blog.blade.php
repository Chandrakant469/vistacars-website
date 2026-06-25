@extends('layouts.app')
@section('content')

<style>
    .content-area {
        padding-top: 60px;
    }
</style>
<!-- Content -->
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr overlay-black-middle section-title-page">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <h1 class="text-white">BLOG DETAILS</h1>
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('blog') }}">Blogs</a></li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb row END -->
    <div class="content-area">
        <div class="container">
            <div class="clearfix">
                <!-- blog grid -->
                <div id="masonry" class="row dlab-blog-grid-2">
                    @if ($blogs->isNotEmpty())
                    @foreach ($blogs as $key => $blog)
                    <div class="post card-container col-lg-6 col-md-6 col-sm-6">
                        <div class="blog-post blog-grid date-style-2">
                            <div class="dlab-post-media dlab-img-effect zoom-slow">
                                <a href=""><img src="{{ asset('web_images/background_img/blog.jpg') }}" alt="{{ $blog->image_alt }}" title="{{ $blog->image_title }}"></a>
                            </div>
                            <div class="dlab-post-info">
                                <div class="dlab-post-title ">
                                    <h3 class="post-title"><a href="{{ url('/blog-details/' . $blog->blog_url) }}">{{ $blog->blog_name }}</a></h3>
                                </div>
                                <div class="dlab-post-text">
                                    <p> {{ $blog->description }}</p>
                                </div>
                                <div class="dlab-post-readmore">
                                    <a href="{{ url('/blog-details/' . $blog->blog_url) }}"title="READ MORE" rel="bookmark" class="site-button-link">
                                        READ MORE<i class="fa fa-angle-double-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
                <!-- blog grid END -->
            </div>
        </div>
    </div>
</div>
<!-- Content END-->
</div>
@endsection