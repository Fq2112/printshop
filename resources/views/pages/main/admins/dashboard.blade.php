@extends('layouts.mst_admin')
@section('title', __('admin.sidebar.head').': Dashboard | '.__('lang.title'))
@push('styles')
    <link rel="stylesheet" href="{{asset('admins/modules/bootstrap-datepicker/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('admins/modules/summernote/summernote-bs4.css')}}">
    <style>
        .bootstrap-select .dropdown-menu {
            min-width: 100% !important;
        }

        .form-control-feedback {
            position: absolute;
            top: 3em;
            right: 2em;
        }
    </style>
@endpush
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="javascript:void(0)" onclick="openDataUsers('#')">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>{{__('admin.dashboard.card-stats.customer')}}</h4>
                            </div>
                            <div class="card-body">
                                {{count($users)}}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="javascript:void(0)" onclick="openDataAdmins('#')">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-info">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>{{__('admin.dashboard.card-stats.admin')}}</h4>
                            </div>
                            <div class="card-body">
                                {{count($admins)}}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="javascript:void(0)" onclick="openDataOrders('#')">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-tools"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>{{__('admin.dashboard.card-stats.order')}}</h4>
                            </div>
                            <div class="card-body">
                                99
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="javascript:void(0)" onclick="openDataBlog('#')">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-blog"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Blog</h4>
                            </div>
                            <div class="card-body">
                                {{count($blog)}}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>{{__('admin.dashboard.card-traffic.head')}}</h4>
                        <div class="card-header-form" style="margin-left: auto;">
                            <form id="form-filter" action="{{route('admin.dashboard')}}">
                                <div class="row">
                                    <div class="col">
                                        <input id="period" type="text" class="form-control yearpicker" name="period"
                                               placeholder="{{__('admin.dashboard.card-traffic.period')}} (yyyy)"
                                               autocomplete="off" spellcheck="false" readonly>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="visitor_graph" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="{{$role->isRoot() && \App\Models\Kontak::count() > 0 ? 'col-8' : 'col'}}">
                <div class="card">
                    <div id="blog" class="card-header">
                        <h4>{{__('lang.blog.latest')}}</h4>
                        <div class="card-header-action">
                            <a href="{{route('table.blog.posts')}}" class="btn btn-primary text-uppercase">
                                <b><i class="fa fa-blog mr-1"></i>{{__('lang.blog.tabs')}}</b>
                            </a>
                            <button type="button" class="btn btn-outline-primary text-uppercase" style="display: none">
                                <b><i class="fa fa-undo mr-1"></i>{{__('lang.button.cancel')}}</b>
                            </button>
                        </div>
                    </div>
                    <div id="div-blog" class="card-body p-0">
                        <div id="content1" class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th width="45%">{{__('admin.dashboard.card-blog.title')}}</th>
                                    <th width="30%">Author</th>
                                    <th width="25%" align="center">{{__('admin.dashboard.card-blog.action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($latest as $row)
                                    @php
                                        $date = \Carbon\Carbon::parse($row->created_at);
                                        $url = route('detail.blog', ['author' => $row->getAdmin->username,
                                        'y' => $date->format('Y'), 'm' => $date->format('m'), 'd' => $date->format('d'),
                                        'title' => $row->permalink]);
                                    @endphp
                                    <tr>
                                        <td>
                                            {{$row->title}}
                                            <div class="table-links">
                                                {{$row->getBlogCategory->name}}
                                                <div class="bullet"></div>
                                                {{$date->formatLocalized('%b %d, %Y')}}
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{route('detail.blog', ['author' => $row->getAdmin->username])}}"
                                               class="font-weight-600">
                                                <img alt="avatar" width="30" class="rounded-circle mr-2" src="{{$row
                                                ->getAdmin->ava != "" ? asset('storage/admins/ava/'.$row->getAdmin->ava) :
                                                asset('admins/img/avatar/avatar-'.rand(1,5).'.png')}}">{{$row->getAdmin->name}}
                                            </a>
                                        </td>
                                        <td align="center">
                                            <a class="btn btn-info btn-action {{$role->isRoot() ||
                                            ($role->isAdmin() && $row->admin_id == $role->id) ? 'mr-1' : ''}}"
                                               href="{{$url}}" data-toggle="tooltip"
                                               title="{{ucfirst(strtolower(__('lang.button.detail')))}}">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            @if($role->isRoot() || ($role->isAdmin() && $row->admin_id == $role->id))
                                                <button class="btn btn-warning btn-action mr-1" data-toggle="tooltip"
                                                        title="{{ucfirst(strtolower(__('lang.button.edit')))}}"
                                                        type="button" onclick="editBlogPost('{{$row->id}}',
                                                    '{{route('edit.blog.posts', ['id' => $row->id])}}')">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </button>
                                                <a href="{{route('delete.blog.posts', ['id' => encrypt($row->id)])}}"
                                                   class="btn btn-danger delete-data" data-toggle="tooltip"
                                                   title="{{ucfirst(strtolower(__('lang.button.delete')))}}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div id="content2" style="display: none;">
                            <form id="form-blogPost" method="post" action="{{route('update.blog.posts')}}"
                                  enctype="multipart/form-data">
                                @csrf
                                {{method_field('PUT')}}
                                <input type="hidden" name="id">
                                <input type="hidden" name="admin_id">
                                <div class="row form-group">
                                    <div class="col fix-label-group">
                                        <label for="category_id">{{__('admin.dashboard.card-blog.category')}}</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text fix-label-item" style="height: 2.25rem">
                                                    <i class="fa fa-tag"></i></span>
                                            </div>
                                            <select id="category_id" class="form-control selectpicker"
                                                    title="{{__('lang.placeholder.choose')}}" name="category_id"
                                                    data-live-search="true" required>
                                                @foreach(\App\Models\BlogCategory::orderBy('name')->get() as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-8 has-feedback">
                                        <label for="title">{{__('admin.dashboard.card-blog.title')}}</label>
                                        <input id="title" type="text" maxlength="191" name="title" class="form-control"
                                               placeholder="{{__('admin.dashboard.card-blog.title-capt')}}" required>
                                        <span class="glyphicon glyphicon-text-width form-control-feedback"></span>
                                    </div>
                                </div>
                                <div class="row form-group has-feedback">
                                    <div class="col">
                                        <label for="_content">{{__('admin.dashboard.card-blog.content')}}</label>
                                        <textarea id="_content" type="text" name="_content"
                                                  class="summernote form-control"
                                                  placeholder="Write something about your post here&hellip;"></textarea>
                                        <span class="glyphicon glyphicon-text-height form-control-feedback"></span>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col">
                                        <label for="thumbnail">Thumbnail</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-images"></i></span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="thumbnail" class="custom-file-input"
                                                       id="thumbnail" accept="image/*" required>
                                                <label class="custom-file-label" id="txt_thumbnail">{{__('lang.placeholder.choose-file')}}</label>
                                            </div>
                                        </div>
                                        <div class="form-text text-muted">
                                            {{__('lang.tooltip.upload', ['ext' => 'jpg, jpeg, gif, png', 'size' => '< 5 MB'])}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary btn-block text-uppercase"
                                                style="font-weight: 900">Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @if($role->isRoot() && \App\Models\Kontak::count() > 0)
                <div class="col">
                    <div class="card card-hero">
                        <div class="card-header">
                            <div class="card-icon">
                                <i class="far fa-question-circle"></i>
                            </div>
                            <h4>{{\App\Models\Kontak::count()}}</h4>
                            <div class="card-description">{{__('admin.dashboard.card-contact.head')}}</div>
                        </div>
                        <div class="card-body p-0">
                            <div class="tickets-list">
                                @foreach(\App\Models\Kontak::orderByDesc('id')->take(3)->get() as $row)
                                    <a href="{{route('admin.inbox',['id' => $row->id])}}" class="ticket-item">
                                        <div class="ticket-title">
                                            <h4>{{$row->subject}}</h4>
                                        </div>
                                        <div class="ticket-info">
                                            <div>{{$row->name}}</div>
                                            <div class="bullet"></div>
                                            <div class="text-primary">
                                                {{\Carbon\Carbon::parse($row->created_at)->diffForHumans()}}</div>
                                        </div>
                                    </a>
                                @endforeach
                                <a href="{{route('admin.inbox')}}" class="ticket-item ticket-more">
                                    {{__('lang.blog.tabs')}} <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
@push('scripts')
    <script src="{{asset('admins/modules/chart.min.js')}}"></script>
    <script src="{{asset('admins/modules/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('admins/modules/summernote/summernote-bs4.js')}}"></script>
    <script>
        $(function () {
            $("#period").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years",
                todayBtn: false,
            });

            @if($period != "")
            $("#period").val('{{$period}}');
            @endif
        });

        var incomeGraph = document.getElementById("visitor_graph").getContext('2d');

        new Chart(incomeGraph, {
            type: 'line',
            data: {
                labels: [
                    @foreach(__('admin.months') as $month)
                    '{{$month}}',
                    @endforeach
                ],
                datasets: [{
                    label: 'Visits',
                    data: [
                        @php $total = 0; @endphp
                        @for($i=1;$i<=12;$i++)
                        @php
                            $total = 0;
                            $visitors = \App\Models\Visitor::when($period, function ($query) use ($period) {
                                $query->whereYear('date', $period);
                            })->whereMonth('date',$i)->get();
                            foreach ($visitors as $row){
                                $total += $row->hits;
                            }
                        @endphp
                        {{$total}},
                        @endfor
                    ],
                    borderWidth: 2,
                    backgroundColor: 'rgb(248,148,6)',
                    borderWidth: 0,
                    borderColor: 'transparent',
                    pointBorderWidth: 0,
                    pointRadius: 3.5,
                    pointBackgroundColor: 'transparent',
                    pointHoverBackgroundColor: 'rgba(248,148,6,0.8)',
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: true,
                            drawBorder: false,
                            color: '#f2f2f2',
                        },
                        ticks: {
                            beginAtZero: true,
                            stepSize: 100,
                            callback: function (value, index, values) {
                                return value;
                            }
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            display: false,
                            tickMarkLength: 15,
                        }
                    }]
                },
            }
        });

        $("#period").on('change', function () {
            $("#form-filter")[0].submit();
        });

        function openDataAdmins(href) {
            window.location.href = href;
        }

        function openDataGalleries(href) {
            @if($role->isOwner() || $role->isRoot())
                window.location.href = href;
            @else
            swal('{{__('lang.alert.warning')}}', '{{__('admin.alert.feature-fail', ['param' => 'ROOT / Owner'])}}', 'warning');
            @endif
        }

        function openDataInstallers(href) {
            @if($role->isOwner() || $role->isRoot())
                window.location.href = href;
            @else
            swal('{{__('lang.alert.warning')}}', '{{__('admin.alert.feature-fail', ['param' => 'ROOT / Owner'])}}', 'warning');
            @endif
        }

        function openDataBlog(href) {
            window.location.href = href;
        }

        function editBlogPost(id, url) {
            $("#div-blog").removeClass('p-0');
            $("#content1").toggle(300);
            $("#content2").toggle(300);
            $(".card-header-action a").toggle(300);
            $(".card-header-action button").toggle(300);
            $("#blog h4").text(function (i, v) {
                return v === '{{__('lang.blog.latest')}}' ? '{{__('admin.dashboard.card-blog.head')}}' : '{{__('lang.blog.latest')}}';
            });

            $(".fix-label-group .bootstrap-select").addClass('p-0');
            $(".fix-label-group .bootstrap-select button").css('border-color', '#e4e6fc');
            $("#form-blogPost input[name=id]").val(id);

            $.get(url, function (data) {
                $("#form-blogPost input[name=admin_id]").val(data.admin_id);
                $("#category_id").val(data.category_id).selectpicker('refresh');
                $("#title").val(data.title);
                $('#_content').summernote('code', data.content);
                $("#thumbnail").removeAttr('required', 'required');
                $("#txt_thumbnail").text(data.thumbnail.length > 60 ? data.thumbnail.slice(0, 60) + "..." : data.thumbnail);
            });
        }

        $(".card-header-action button").on('click', function () {
            $("#div-blog").addClass('p-0');
            $("#content1").toggle(300);
            $("#content2").toggle(300);
            $(".card-header-action a").toggle(300);
            $(".card-header-action button").toggle(300);
            $("#blog h4").text(function (i, v) {
                return v === '{{__('lang.blog.latest')}}' ? '{{__('admin.dashboard.card-blog.head')}}' : '{{__('lang.blog.latest')}}';
            });
        });

        $("#thumbnail").on('change', function () {
            var files = $(this).prop("files"), names = $.map(files, function (val) {
                return val.name;
            }), text = names[0];
            $("#txt_thumbnail").text(text.length > 60 ? text.slice(0, 60) + "..." : text);
        });

        $("#form-blogPost").on('submit', function (e) {
            e.preventDefault();
            if ($('#_content').summernote('isEmpty')) {
                swal('{{__('lang.alert.warning')}}', '{{__('admin.dashboard.card-blog.content-capt')}}', 'warning');

            } else {
                $(this)[0].submit();
            }
        });

        $(document).on('mouseover', '.use-nicescroll', function () {
            $(this).getNiceScroll().resize();
        });
    </script>
@endpush
