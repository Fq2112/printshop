@extends('layouts.mst')
@section('title',  __('lang.blog.title').': '.$admin->username.' | '.__('lang.title'))
@push('styles')
    <link rel="stylesheet" href="{{asset('css/blog-grid-list.css')}}">
    <link rel="stylesheet" href="{{asset('css/blog-accordion.css')}}">
    <style>
        #tabs .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
            color: #f89406 !important;
            background-color: #F9F9F9 !important;
            border-color: transparent transparent #f3f3f3;
            border-bottom: 4px solid #f89406 !important;
        }

        #tabs .nav-tabs .nav-link {
            text-transform: uppercase;
            border: 1px solid transparent;
            border-top-left-radius: .25rem;
            border-top-right-radius: .25rem;
        }

        #tabs .nav-tabs .nav-link span.badge-primary {
            color: #fff;
            background-color: #f89406;
        }

        #tabs .nav-tabs .nav-link span.badge-primary:hover, #tabs .nav-tabs .nav-link span.badge-primary:focus {
            color: #fff;
            background-color: #cd7c06;
        }

        #tabs .nav-tabs .nav-link span.badge-primary:focus, #tabs .nav-tabs .nav-link span.badge-primary.focus {
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(248, 148, 6, 0.5);
        }
    </style>
@endpush
@section('content')
    <section id="page-title" class="page-title-parallax page-title-dark"
             data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;"
             style="background-image:url('{{asset('images/banner/blog.jpg')}}');background-size:cover;padding:120px 0;">
        <div class="parallax-overlay"></div>
        <div class="container clearfix">
            <h1>{{__('lang.blog.head')}}</h1>
            <span>{{__('lang.blog.capt')}}</span>
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item">
                    <a href="{{route('beranda')}}">{{__('lang.breadcrumb.home')}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('blog')}}">Blog</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{__('lang.breadcrumb.author')}}</li>
            </ol>
        </div>
    </section>

    <section id="content" style="background-color: #F9F9F9">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="row clearfix">
                    <div class="col-md-9">
                        <img
                            src="{{$admin->ava != "" ? asset('storage/admins/ava/'.$admin->ava) : asset('images/avatar.png')}}"
                            class="alignleft img-circle img-thumbnail notopmargin nobottommargin"
                            alt="Avatar" style="max-width: 84px;">
                        <div class="heading-block noborder">
                            <h3>{{$admin->name}}</h3>
                            <ul class="entry-meta clearfix">
                                <li><a href="{{\Illuminate\Support\Facades\URL::current()}}">
                                        <i class="icon-user"></i> {{$admin->username}}</a></li>
                                <li><i class="icon-blogger-b"></i>
                                    {{$admin->getBlog->count() > 1 ? $admin->getBlog->count().' '.__('lang.blog.posts')
                                    : $admin->getBlog->count().' '.__('lang.blog.post')}}
                                </li>
                            </ul>
                        </div>

                        <div class="clear"></div>

                        <div class="row clearfix">
                            <div class="col-lg-12">
                                <nav id="tabs">
                                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link show active" style="color: #495057" id="tabList-lp"
                                           data-toggle="tab" href="#tabContent-lp" role="tab"
                                           aria-controls="nav-lp" aria-selected="true">
                                            <i class="icon-history"></i>&ensp;{{__('lang.blog.latest')}}</a>
                                        <a class="nav-item nav-link" style="color: #495057" id="tabList-ap"
                                           data-toggle="tab" href="#tabContent-ap" role="tab"
                                           aria-controls="nav-ap" aria-selected="true">
                                            <i class="icon-archive"></i>&ensp;{{__('lang.blog.archive')}}</a>
                                    </div>
                                </nav>
                                <div id="nav-tabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade show active" id="tabContent-lp"
                                         aria-labelledby="nav-lp-tab" style="border: none">
                                        <div class="row mt-2">
                                            @foreach($latest as $row)
                                                @php
                                                    $date = \Carbon\Carbon::parse($row->created_at);
                                                    $url = route('detail.blog', ['author' => $row->getAdmin->username,
                                                    'y' => $date->format('Y'), 'm' => $date->format('m'),
                                                    'd' => $date->format('d'), 'title' => $row->permalink]);
                                                @endphp
                                                <div class="blog-item">
                                                    <a href="{{$url}}">
                                                        <div class="icon">
                                                            <img
                                                                src="{{asset('storage/blog/thumbnail/'.$row->thumbnail)}}"
                                                                alt="Thumbnail">
                                                        </div>
                                                        <div class="blog-content">
                                                            <p class="blog-category">{{$row->getBlogCategory->name}}
                                                                <span class="blog-date">
                                                                    <i class="icon-calendar3 ml-2 mr-2"></i>{{$date
                                                                    ->formatLocalized('%d %B %Y')}}</span><br>
                                                                <sub class="blog-author">{{__('lang.blog.by')}}
                                                                    <span>{{$admin->username}}</span></sub>
                                                            </p>
                                                            <div class="title">{{$row->title}}</div>
                                                            <div class="rounded"></div>
                                                            {!!\Illuminate\Support\Str::words($row->content, 20, '...').'</p>'!!}
                                                        </div>
                                                        <div class="item-arrow">
                                                            <i class="icon-long-arrow-alt-right" aria-hidden="true"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tabContent-ap"
                                         aria-labelledby="nav-ap-tab" style="border: none">
                                        <ul id="accordion" class="static-menu">
                                            @php $blog = $archive; @endphp
                                            @foreach($blog as $monthYear => $archive)
                                                <li>
                                                    <div class="link">
                                                        <i class="icon-chevron-right"></i>{{$monthYear}}&ensp;<span
                                                            class="badge badge-secondary">{{count($archive)}}</span>
                                                    </div>
                                                    <ul class="sub-menu">
                                                        @foreach($archive as $data)
                                                            @php
                                                                $date = \Carbon\Carbon::parse($data->created_at);
                                                                $url = route('detail.blog', ['author' => $data->getAdmin->username,
                                                                'y' => $date->format('Y'), 'm' => $date->format('m'),
                                                                'd' => $date->format('d'), 'title' => $data->permalink]);
                                                            @endphp
                                                            <li>
                                                                <a class="pt-3" href="{{$url}}">
                                                                    <p align="justify" class="blog-category mb-0">
                                                                        {{$data->getBlogCategory->name}}
                                                                        <i class="icon-calendar3"></i>{{$date
                                                                        ->formatLocalized('%d %b %Y')}}</p>
                                                                    <h4 class="mb-0">{{$data->title}}</h4>
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-100 line d-block d-md-none"></div>

                    <div class="col-md-3 clearfix">
                        <div class="fancy-title topmargin title-border">
                            <h4 style="background-color: #F9F9F9">{{__('lang.blog.about')}}</h4>
                        </div>
                        @if($admin->about != "")
                            <p align="justify">{{$admin->about}}</p>
                        @else
                            <p align="justify"><em>{{__('lang.blog.author-bio')}}</em></p>
                        @endif

                        <div class="fancy-title topmargin title-border">
                            <h4 style="background-color: #F9F9F9">{{__('lang.blog.follow')}}</h4>
                        </div>
                        <a class="social-icon si-call si-small si-rounded si-light" title="Facebook"
                           href="mailto:{{$admin->email}}">
                            <i class="icon-envelope-alt"></i>
                            <i class="icon-envelope-alt"></i>
                        </a>
                        <a class="social-icon si-facebook si-small si-rounded si-light" title="Facebook" target="_blank"
                           href="{{$admin->facebook != "" ? 'https://fb.com/'.$admin->facebook : '#'}}">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>
                        <a class="social-icon si-twitter si-small si-rounded si-light" title="Twitter" target="_blank"
                           href="{{$admin->twitter != "" ? 'https://twitter.com/'.$admin->twitter : '#'}}">
                            <i class="icon-twitter"></i>
                            <i class="icon-twitter"></i>
                        </a>
                        <a class="social-icon si-instagram si-small si-rounded si-light" title="Facebook"
                           target="_blank"
                           href="{{$admin->instagram != "" ? 'https://instagram.com/'.$admin->instagram : '#'}}">
                            <i class="icon-instagram"></i>
                            <i class="icon-instagram"></i>
                        </a>
                        <a class="social-icon si-whatsapp si-small si-rounded si-light" title="Twitter" target="_blank"
                           href="{{$admin->whatsapp != "" ? 'https://web.whatsapp.com/send?text=Halo, '.
                           $admin->name.'!&phone='.$admin->whatsapp.'&abid='.$admin->whatsapp : '#'}}">
                            <i class="icon-whatsapp"></i>
                            <i class="icon-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $(function () {
            var Accordion = function (el, multiple) {
                this.el = el || {};
                this.multiple = multiple || false;

                var links = this.el.find('.link');
                links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown);
            };

            Accordion.prototype.dropdown = function (e) {
                var $el = e.data.el;
                $this = $(this);
                $next = $this.next();

                $next.slideToggle();
                $this.parent().toggleClass('open');

                if (!e.data.multiple) {
                    $el.find('.sub-menu').not($next).slideUp().parent().removeClass('open');
                }
            };

            var accordion = new Accordion($('#accordion'), false);
        });
    </script>
@endpush
