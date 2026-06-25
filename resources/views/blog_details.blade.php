@extends('layouts.app')
@section('content')

<!-- CSS Styling -->
<style>
    .social-icon {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        color: white;
        text-decoration: none;
        font-size: 18px;
        transition: transform 0.3s, opacity 0.3s;
    }

    .social-icon:hover {
        transform: scale(1.1);
        opacity: 0.8;
    }
</style>
<!-- CSS for responsiveness -->
<style>
    @media (max-width: 768px) {
        #commentForm {
            flex-direction: column;
            gap: 10px;
            width: 300px;


        }

        #commentForm input {
            width: 100%;
            margin-left: 25px
        }
    }
</style>
<div class="page-wraper">
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
                    <li><a href="">Blogs Details</a></li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <div class="content-area">
            <div class="container">
                <div class="row">
                    <!-- Left part start -->
                    <div class="col-lg-8 col-md-7 col-sm-6">
                        @if (count((array)$blog_details))
                        @foreach ($blog_details as $key => $blog_detail)
                        <div class="blog-post blog-lg date-style-2" style="margin-top:20px">
                            <div class="dlab-post-media dlab-img-effect zoom-slow">
                                <a href=""><img src="{{ asset('web_images/background_img/blog.jpg') }}" alt="{{ $blog_detail->image_alt }}" title="{{ $blog_detail->image_title }}"></a>
                            </div>
                            <div class="dlab-post-info">
                                <div class="dlab-post-title ">
                                    <h3 class="post-title"><a href="#">{{ $blog_detail->blog_name }}</a></h3>
                                </div>
                                <div class="dlab-post-meta ">
                                    <ul>
                                        <li class="post-date"> <i class="ti-calendar"></i><strong> {{ $blog_detail->created_date}} </strong> </li>
                                        <li class="post-author"><i class="fa fa-user"></i>Post By <a href="#"> Vistacars </a> </li>
                                    </ul>
                                </div>
                                <div class="dlab-post-text">
                                    <p>{!! $blog_detail->blog_description !!}</p>
                                </div>
                            </div>
                        </div>
                        <h3 class="widget-title">Leave a comment</h3>
                        <form id="commentForm" style="display: flex; align-items: center; gap: 15px; flex-wrap: wrap;">
                            <input type="hidden" name="blog_id" value="{{ $blog_detail->blog_id }}">
                            <div class="row">
                                <div class="form-group">
                                    <div class="input-group" style="gap: 25px;">
                                        <input name="Name" id="Name" type="text" class="form-control" placeholder="Enter Name">
                                        <input name="comment" id="comment" type="text" class="form-control" placeholder="Enter Comment">
                                        <button type="submit" class="site-button" style="margin-left:20px;">
                                            <span>Submit</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @endforeach
                        @endif
                    </div>
                    <!-- Left part END -->
                    <!-- Side bar start -->
                    <div class="col-lg-4 col-md-5 col-sm-6">
                        <div class="p-a30 bg-gray clearfix m-t20">
                            <h3 class="widget-title text-uppercase">Get in touch</h3>
                            <form method="post" class="bookNowForm">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input name="name" type="text" class="form-control book_name" placeholder="Enter Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input name="email" type="email" class="form-control book_email" placeholder="Enter Email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input name="contact" type="tel" class="form-control book_contact" placeholder="Enter Contact No" maxlength="10" onkeypress="return isNumberKey(event)" onkeyup="return limitlength(this, 10)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="g-recaptcha" data-sitekey="{{ RECAPTCHA_SITE_KEY }}" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
                                                <input type="hidden" name="g-recaptcha-response" class="g-recaptcha-response">
                                            </div>
                                        </div>
                                    </div>
                                    <input type='hidden' name='enq' class='enq' value='Contact Us'>
                                    <div class="col-lg-12">
                                        <button name="submit" type="submit" value="Submit" class="site-button "> <span>Submit</span> </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="widget recent-posts-entry m-t40">
                            <h4 class="widget-title">Recent Posts</h4>
                            <div class="widget-post-bx">
                                @foreach ($recent_blogs as $recent)
                                <div class="widget-post clearfix">
                                    <div class="dlab-post-info">
                                        <div class="dlab-post-header">
                                            <h6 class="post-title"><a href="{{ url('/blog-details/' . $recent->blog_url) }}">{{ $recent->blog_name }}</a></h6>
                                        </div>
                                        <div class="dlab-post-meta">
                                            <ul>
                                                <li class="post-author">On <a href="#">{{ $recent->created_date}}</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="entry-footer" style="display: flex; align-items: center; gap: 15px; flex-wrap: wrap;">
                            <div class="entry-footer__group" style="display: flex; align-items: center; gap: 10px;">
                                <i class="icon fa fa-share-alt text-primary"></i>
                                <span class="entry-footer__title" style="font-weight: bold;">Share This Post:</span>
                            </div>

                            <!-- Social Media Icons -->
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ url('blog/' . $blog_detail->blog_url) }}" target="_blank" class="social-icon" style="background-color: #48649E;">
                                <i class="fa fa-facebook"></i>
                            </a>

                            <a href="https://twitter.com/home?status={{ url('blog/' . $blog_detail->blog_url) }}" target="_blank" class="social-icon" style="background-color: #55ACEE;">
                                <i class="fa fa-twitter"></i>
                            </a>

                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ url('blog/' . $blog_detail->blog_url) }}" target="_blank" class="social-icon" style="background-color: #0274BE;">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Side bar END -->
                </div>
            </div>
        </div>
    </div>
    <!-- Content END-->
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    $(document).ready(function() {
        $("#commentForm").on("submit", function(e) {
            e.preventDefault();

            let formData = {
                Name: $("#Name").val().trim(),
                comment: $("#comment").val().trim(),
                blog_id: $("input[name='blog_id']").val()
            };

            if (formData.Name === "") {
                toastr.error("Name is required!");
                return;
            }
            if (formData.comment === "") {
                toastr.error("Comment is required!");
                return;
            }

            $.ajax({
                url: "/store-comment",
                type: "POST",
                data: formData,
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.status === "success") {
                        toastr.success(response.message);
                        $("#commentForm")[0].reset();
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function(xhr) {
                    console.log(xhr.responseJSON);
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        $.each(xhr.responseJSON.errors, function(key, value) {
                            toastr.error(value[0]);
                        });
                    } else {
                        toastr.error("An error occurred. Please try again.");
                    }
                }
            });
        });
    });
</script>


@endsection