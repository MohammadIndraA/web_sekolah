@extends('frontend.layouts.main')
@section('title', 'Berita')
@section('content')
    <!-- Banner Area Start -->
    <div class="banner-area-wrapper">
        <div class="banner-area text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="banner-content-wrapper">
                            <div class="banner-content">
                                {{-- <h2>blog / left side bar</h2> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Area End -->
    <!-- Blog Start -->
    <div class="blog-area pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="blog-sidebar left">
                        <div class="single-blog-widget mb-50">
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
                        <div class="single-blog-widget mb-50">
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
                <div class="col-md-8">
                    <div class="row">
                        @if ($beritas->count() > 0)
                            @foreach ($beritas as $item)
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="single-blog mb-60">
                                        <div class="blog-img" style="width: 365px; height: 246px; overflow: hidden;">
                                            <a href="{{ route('berita.detail', $item->slug) }}"><img
                                                    src="{{ asset('uploads/' . $item->image) }}"
                                                    style="width: 100%; height: 100%; object-fit: cover;"
                                                    alt="blog"></a>
                                            <div class="blog-hover">
                                                <i class="fa fa-link"></i>
                                            </div>
                                        </div>
                                        <div class="blog-content">
                                            <div class="blog-top">
                                                <p>{{ $item->user->name }} /
                                                    {{ \Carbon\Carbon::parse($item->created_at)->format('F d, Y') }}
                                                </p>
                                            </div>
                                            <div class="blog-bottom">
                                                <h2><a href="{{ route('berita.detail', $item->slug) }}">{{ $item->title }}
                                                    </a></h2>
                                                <a href="{{ route('berita.detail', $item->slug) }}">read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <h3 class="text-center">Tidak Ada Berita</h3>
                        @endif
                        <style>
                            @media (max-width: 600px) {
                                .blog-img {
                                    width: 100% !important;
                                    height: auto !important;
                                }

                                .blog-img img {
                                    width: 100% !important;
                                    height: auto !important;
                                }
                            }
                        </style>
                        <div class="col-md-12">
                            <div class="pagination">
                                {{ $beritas->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->
@endsection
