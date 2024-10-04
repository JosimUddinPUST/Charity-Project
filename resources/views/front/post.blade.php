@extends('front.layouts.app')

@section('main_content')
<div class="page-top" style="background-image: url('{{ asset('uploads/banner.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $post->title }}</h2>
                <div class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('blog') }}">Blog</a></li>
                        <li class="breadcrumb-item active">{{ $post->title }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="post pt_50 pb_50">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-md-12">
                <div class="left-item">

                    <div class="main-photo">
                        <img src="{{ asset('uploads/'.$post->photo) }}" alt="">
                    </div>
                    <div class="sub">
                        <ul>
                            <li><i class="fas fa-calendar-alt"></i> On: {{ $post_date }}</li>
                            <li><i class="fas fa-th-large"></i> Category: <a href="">{{  $post->post_categories->name }}</a></li>
                        </ul>
                    </div>
                    <div class="description">
                        <p>{!! $post->description !!}</p>
                    </div>
                    <div class="comment">

                        <h2>6 Comments</h2>

                        <div class="comment-section">

                            <div class="comment-box d-flex justify-content-start">
                                <div class="left">
                                    <img src="uploads/team-1.jpg" alt="">
                                </div>
                                <div class="right">
                                    <div class="name">Patrick Smith</div>
                                    <div class="date">September 25, 2022</div>
                                    <div class="text">
                                        Qui ea oporteat democritum, ad sed minimum offendit expetendis. Idque volumus platonem eos ut, in est verear delectus. Vel ut option adipisci consequuntur. Mei et solum malis detracto, has iuvaret invenire inciderint no. Id est dico nostrud invenire.
                                    </div>
                                    <div class="reply">
                                        <a href=""><i class="fas fa-reply"></i> Reply</a>
                                    </div>
                                </div>
                            </div>

                            <div class="comment-box reply-box d-flex justify-content-start">
                                <div class="left">
                                    <img src="uploads/team-2.jpg" alt="">
                                </div>
                                <div class="right">
                                    <div class="name">John Doe</div>
                                    <div class="date">September 25, 2022</div>
                                    <div class="text">
                                        Qui ea oporteat democritum, ad sed minimum offendit expetendis. Idque volumus platonem eos ut, in est verear delectus. Vel ut option adipisci consequuntur. Mei et solum malis detracto, has iuvaret invenire inciderint no. Id est dico nostrud invenire.
                                    </div>
                                    <div class="reply">
                                        <a href=""><i class="fas fa-reply"></i> Reply</a>
                                    </div>
                                </div>
                            </div>

                            <div class="comment-box reply-box d-flex justify-content-start">
                                <div class="left">
                                    <img src="uploads/team-3.jpg" alt="">
                                </div>
                                <div class="right">
                                    <div class="name">Brent Smith</div>
                                    <div class="date">September 25, 2022</div>
                                    <div class="text">
                                        Qui ea oporteat democritum, ad sed minimum offendit expetendis. Idque volumus platonem eos ut, in est verear delectus. Vel ut option adipisci consequuntur. Mei et solum malis detracto, has iuvaret invenire inciderint no. Id est dico nostrud invenire.
                                    </div>
                                    <div class="reply">
                                        <a href=""><i class="fas fa-reply"></i> Reply</a>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="comment-section">
                            <div class="comment-box d-flex justify-content-start">
                                <div class="left">
                                    <img src="uploads/team-2.jpg" alt="">
                                </div>
                                <div class="right">
                                    <div class="name">John Doe</div>
                                    <div class="date">September 25, 2022</div>
                                    <div class="text">
                                        Qui ea oporteat democritum, ad sed minimum offendit expetendis. Idque volumus platonem eos ut, in est verear delectus. Vel ut option adipisci consequuntur. Mei et solum malis detracto, has iuvaret invenire inciderint no. Id est dico nostrud invenire.
                                    </div>
                                    <div class="reply">
                                        <a href=""><i class="fas fa-reply"></i> Reply</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="comment-section">
                            <div class="comment-box d-flex justify-content-start">
                                <div class="left">
                                    <img src="uploads/team-1.jpg" alt="">
                                </div>
                                <div class="right">
                                    <div class="name">John Doe</div>
                                    <div class="date">September 25, 2022</div>
                                    <div class="text">
                                        Qui ea oporteat democritum, ad sed minimum offendit expetendis. Idque volumus platonem eos ut, in est verear delectus. Vel ut option adipisci consequuntur. Mei et solum malis detracto, has iuvaret invenire inciderint no. Id est dico nostrud invenire.
                                    </div>
                                    <div class="reply">
                                        <a href=""><i class="fas fa-reply"></i> Reply</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="mt_40"></div>

                        <h2>Leave Your Comment</h2>
                        <form method="POST" action="{{ route('comment_submit') }}">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <input type="text" name="name" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <input type="text" name="email" class="form-control" placeholder="Email Address">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" rows="3" name="comment" placeholder="Comment"></textarea>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Submit <i class="fas fa-long-arrow-alt-right"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-12">
                <div class="right-item">
                    <h2>Latest Posts</h2>
                    <ul>
                        @foreach ($latest_posts as $latest_post)
                        <li><a href="{{ route('post',$latest_post->slug) }}"><i class="fas fa-angle-right"></i> {{ $latest_post->title }}</a></li>
                        @endforeach
                    </ul>

                    <h2 class="mt_40">Categories</h2>
                    <ul>
                        @foreach($latest_post_categories as $latest_post_category)
                        <li><a href="category.html"><i class="fas fa-angle-right"></i>{{ $latest_post_category->name }}</a></li>
                        @endforeach
                    </ul>

                    <h2 class="mt_40">Tags</h2>
                    <ul class="tag">
                        @foreach($tags as $tag)
                        <li><a href="tag.html">{{ $tag }}</a></li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection