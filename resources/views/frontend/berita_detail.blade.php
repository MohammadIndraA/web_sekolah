@extends('frontend.layouts.main')
@section('title', 'About')
@section('content')
    <!-- Blog Start -->
    <div class="blog-details-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="blog-details">
                        <div class="blog-details-img" style="width: 100%; height: 50%; object-fit: cover; overflow: hidden;">
                            <img src="{{ $berita->image ? asset('storage/' . $berita->image) : asset('img/blog/blog-detail.jpg') }}"
                                alt="blog-details" style="width: 100%; height: 100%; object-fit: cover; overflow: hidden;">
                        </div>
                        <div class="blog-details-content">
                            <h2>{{ $berita->title }}</h2>
                            <h6> {{ $berita->user->name }} /
                                {{ \Carbon\Carbon::parse($berita->created_at)->format('F d, Y') }}</h6>
                            <p>{!! $berita->content !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog-sidebar right">
                        <div class="single-blog-widget mb-47">
                            <h3>search</h3>
                            <div class="blog-search">
                                <form id="search" action="">
                                    <input type="search" placeholder="Search..." name="search" />
                                    <button type="submit">
                                        <span><i class="fa fa-search"></i></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="single-blog-widget mb-47">
                            <form action="" method="get">
                                <h3><a href="{{ route('berita') }}">CATEGORIES</a></h3>
                                <ul>
                                    @foreach ($kategoris as $item)
                                        <li><a
                                                href="{{ route('berita') }}?kategori={{ $item->slug }}">{{ $item->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </form>
                        </div>
                        <div class="single-blog-widget">
                            <h3>tags</h3>
                            <div class="single-tag">
                                @foreach ($tags as $item)
                                    <a href="{{ route('berita') }}?tag={{ $item->slug }}">{{ $item->name }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->
@endsection
