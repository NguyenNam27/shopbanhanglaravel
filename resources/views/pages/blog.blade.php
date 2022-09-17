@extends('layout')
@section('content')
        <div class="blog-post-area">
            <h2 class="title text-center">Tin Tức Công Nghệ</h2>
            @foreach($blog as $blog1)
            <div class="single-blog-post">

               <a href=""><h2>{{$blog1->title}}</h2></a>
                <div class="post-meta">
                    <ul>
                        <li><i class="fa fa-user"></i> {{$blog1->created_at}}</li>

                    </ul>
{{--                    <span>--}}
{{--										<i class="fa fa-star"></i>--}}
{{--										<i class="fa fa-star"></i>--}}
{{--										<i class="fa fa-star"></i>--}}
{{--										<i class="fa fa-star"></i>--}}
{{--										<i class="fa fa-star-half-o"></i>--}}
{{--								</span>--}}
                </div>
                <a href="">
                    <img src="public/uploads/post/{{$blog1->image}}" alt="" width="50%">
                </a>
                <p>{!! $blog1->short_description !!}</p>
                <a  class="btn btn-primary" href="">Read More</a>
            </div>
            @endforeach
            <div class="pagination-area">
                <ul class="pagination">
                    {!! $blog->links() !!}

                </ul>
            </div>
        </div>
@endsection
