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
            <h1>Welcome to Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-stats">
                        <div class="card-stats-title">Order Statistics -
                            <div class="dropdown d-inline">
                                <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#"
                                   id="orders-month">August</a>
                                <ul class="dropdown-menu dropdown-menu-sm">
                                    <li class="dropdown-title">Select Month</li>
                                    <li><a href="#" class="dropdown-item">January</a></li>
                                    <li><a href="#" class="dropdown-item">February</a></li>
                                    <li><a href="#" class="dropdown-item">March</a></li>
                                    <li><a href="#" class="dropdown-item">April</a></li>
                                    <li><a href="#" class="dropdown-item">May</a></li>
                                    <li><a href="#" class="dropdown-item">June</a></li>
                                    <li><a href="#" class="dropdown-item">July</a></li>
                                    <li><a href="#" class="dropdown-item active">August</a></li>
                                    <li><a href="#" class="dropdown-item">September</a></li>
                                    <li><a href="#" class="dropdown-item">October</a></li>
                                    <li><a href="#" class="dropdown-item">November</a></li>
                                    <li><a href="#" class="dropdown-item">December</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-stats-items">
                            <div class="card-stats-item">
                                <div class="card-stats-item-count">24</div>
                                <div class="card-stats-item-label">Pending</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count">12</div>
                                <div class="card-stats-item-label">Shipping</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count">23</div>
                                <div class="card-stats-item-label">Completed</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-archive"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Orders</h4>
                        </div>
                        <div class="card-body">
                            59
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-chart">
                        <canvas id="balance-chart" height="80"></canvas>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Balance</h4>
                        </div>
                        <div class="card-body">
                            $187,13
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-chart">
                        <canvas id="sales-chart" height="80"></canvas>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Sales</h4>
                        </div>
                        <div class="card-body">
                            4,732
                        </div>
                    </div>
                </div>
            </div>
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
            <div class="col-md-4">
                <div class="card card-hero">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="far fa-question-circle"></i>
                        </div>
                        <h4>14</h4>
                        <div class="card-description">Customers need help</div>
                    </div>
                    <div class="card-body p-0">
                        <div class="tickets-list">
                            <a href="#" class="ticket-item">
                                <div class="ticket-title">
                                    <h4>My order hasn't arrived yet</h4>
                                </div>
                                <div class="ticket-info">
                                    <div>Laila Tazkiah</div>
                                    <div class="bullet"></div>
                                    <div class="text-primary">1 min ago</div>
                                </div>
                            </a>
                            <a href="#" class="ticket-item">
                                <div class="ticket-title">
                                    <h4>Please cancel my order</h4>
                                </div>
                                <div class="ticket-info">
                                    <div>Rizal Fakhri</div>
                                    <div class="bullet"></div>
                                    <div>2 hours ago</div>
                                </div>
                            </a>
                            <a href="#" class="ticket-item">
                                <div class="ticket-title">
                                    <h4>Do you see my mother?</h4>
                                </div>
                                <div class="ticket-info">
                                    <div>Syahdan Ubaidillah</div>
                                    <div class="bullet"></div>
                                    <div>6 hours ago</div>
                                </div>
                            </a>
                            <a href="features-tickets.html" class="ticket-item ticket-more">
                                View All <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Invoices</h4>
                        <div class="card-header-action">
                            <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-invoice">
                            <table class="table table-striped">
                                <tr>
                                    <th>Invoice ID</th>
                                    <th>Customer</th>
                                    <th>Status</th>
                                    <th>Due Date</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <td><a href="#">INV-87239</a></td>
                                    <td class="font-weight-600">Kusnadi</td>
                                    <td>
                                        <div class="badge badge-warning">Unpaid</div>
                                    </td>
                                    <td>July 19, 2018</td>
                                    <td>
                                        <a href="#" class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#">INV-48574</a></td>
                                    <td class="font-weight-600">Hasan Basri</td>
                                    <td>
                                        <div class="badge badge-success">Paid</div>
                                    </td>
                                    <td>July 21, 2018</td>
                                    <td>
                                        <a href="#" class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#">INV-76824</a></td>
                                    <td class="font-weight-600">Muhamad Nuruzzaki</td>
                                    <td>
                                        <div class="badge badge-warning">Unpaid</div>
                                    </td>
                                    <td>July 22, 2018</td>
                                    <td>
                                        <a href="#" class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#">INV-84990</a></td>
                                    <td class="font-weight-600">Agung Ardiansyah</td>
                                    <td>
                                        <div class="badge badge-warning">Unpaid</div>
                                    </td>
                                    <td>July 22, 2018</td>
                                    <td>
                                        <a href="#" class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#">INV-87320</a></td>
                                    <td class="font-weight-600">Ardian Rahardiansyah</td>
                                    <td>
                                        <div class="badge badge-success">Paid</div>
                                    </td>
                                    <td>July 28, 2018</td>
                                    <td>
                                        <a href="#" class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
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
                                                <label class="custom-file-label"
                                                       id="txt_thumbnail">{{__('lang.placeholder.choose-file')}}</label>
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

        var balance_chart = document.getElementById("balance-chart").getContext('2d');

        var balance_chart_bg_color = balance_chart.createLinearGradient(0, 0, 0, 70);
        balance_chart_bg_color.addColorStop(0, 'rgba(63,82,227,.2)');
        balance_chart_bg_color.addColorStop(1, 'rgba(63,82,227,0)');

        var myChart = new Chart(balance_chart, {
            type: 'line',
            data: {
                labels: ['16-07-2018', '17-07-2018', '18-07-2018', '19-07-2018', '20-07-2018', '21-07-2018', '22-07-2018', '23-07-2018', '24-07-2018', '25-07-2018', '26-07-2018', '27-07-2018', '28-07-2018', '29-07-2018', '30-07-2018', '31-07-2018'],
                datasets: [{
                    label: 'Balance',
                    data: [50, 61, 80, 50, 72, 52, 60, 41, 30, 45, 70, 40, 93, 63, 50, 62],
                    backgroundColor: balance_chart_bg_color,
                    borderWidth: 3,
                    borderColor: 'rgb(248,148,6)',
                    pointBorderWidth: 0,
                    pointBorderColor: 'transparent',
                    pointRadius: 3,
                    pointBackgroundColor: 'transparent',
                    pointHoverBackgroundColor: 'rgba(63,82,227,1)',
                }]
            },
            options: {
                layout: {
                    padding: {
                        bottom: -1,
                        left: -1
                    }
                },
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: false,
                            drawBorder: false,
                        },
                        ticks: {
                            beginAtZero: true,
                            display: false
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            drawBorder: false,
                            display: false,
                        },
                        ticks: {
                            display: false
                        }
                    }]
                },
            }
        });

        var sales_chart = document.getElementById("sales-chart").getContext('2d');

        var sales_chart_bg_color = sales_chart.createLinearGradient(0, 0, 0, 80);
        balance_chart_bg_color.addColorStop(0, 'rgba(63,82,227,.2)');
        balance_chart_bg_color.addColorStop(1, 'rgba(63,82,227,0)');

        var myChart = new Chart(sales_chart, {
            type: 'line',
            data: {
                labels: ['16-07-2018', '17-07-2018', '18-07-2018', '19-07-2018', '20-07-2018', '21-07-2018', '22-07-2018', '23-07-2018', '24-07-2018', '25-07-2018', '26-07-2018', '27-07-2018', '28-07-2018', '29-07-2018', '30-07-2018', '31-07-2018'],
                datasets: [{
                    label: 'Sales',
                    data: [70, 62, 44, 40, 21, 63, 82, 52, 50, 31, 70, 50, 91, 63, 51, 60],
                    borderWidth: 2,
                    backgroundColor: balance_chart_bg_color,
                    borderWidth: 3,
                    borderColor: 'rgb(248,148,6)',
                    pointBorderWidth: 0,
                    pointBorderColor: 'transparent',
                    pointRadius: 3,
                    pointBackgroundColor: 'transparent',
                    pointHoverBackgroundColor: 'rgba(63,82,227,1)',
                }]
            },
            options: {
                layout: {
                    padding: {
                        bottom: -1,
                        left: -1
                    }
                },
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: false,
                            drawBorder: false,
                        },
                        ticks: {
                            beginAtZero: true,
                            display: false
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            drawBorder: false,
                            display: false,
                        },
                        ticks: {
                            display: false
                        }
                    }]
                },
            }
        });
    </script>
@endpush
