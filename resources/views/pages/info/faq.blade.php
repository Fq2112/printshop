@extends('layouts.mst')
@section('title',  __('lang.header.faq').' | '.__('lang.title'))
@push('styles')
    <style>

    </style>
@endpush
@section('content')
    <section id="page-title" class="page-title-parallax page-title-dark"
             data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;"
             style="background-image:url('{{asset('images/banner/faq.jpg')}}');background-size:cover;padding:120px 0;">
        <div class="parallax-overlay"></div>
        <div class="container clearfix">
            <h1>{{__('lang.header.faq')}}</h1>
            <span>{{__('lang.faq.capt')}}</span>
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="{{route('beranda')}}">{{__('lang.breadcrumb.home')}}</a></li>
                <li class="breadcrumb-item"><a href="{{URL::current()}}">Info</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{__('lang.header.faq')}}</li>
            </ol>
        </div>
    </section>

    <section id="content" style="background-color: #F9F9F9">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="col_half nobottommargin">
                    <h4>Marketplace <small>(4)</small></h4>
                    <div class="accordion accordion-border clearfix" data-state="closed">
                        <div class="acctitle"><i class="acc-closed icon-question-sign"></i><i
                                class="acc-open icon-question-sign"></i>How do I become an author?
                        </div>
                        <div class="acc_content clearfix">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Assumenda, dolorum, vero ipsum molestiae minima odio quo voluptate illum excepturi quam cum
                            voluptates doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque
                            explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe, aperiam, nam
                            unde quas beatae vero vitae nulla.
                        </div>
                        <div class="acctitle"><i class="acc-closed icon-comments-alt"></i><i
                                class="acc-open icon-comments-alt"></i>Helpful Resources for Authors
                        </div>
                        <div class="acc_content clearfix">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Explicabo, placeat, architecto rem dolorem dignissimos repellat veritatis in et eos
                            doloribus magnam aliquam ipsa alias assumenda officiis quasi sapiente suscipit veniam odio
                            voluptatum. Enim at asperiores quod velit minima officia accusamus cumque eligendi
                            consequuntur fuga? Maiores, quasi, voluptates, exercitationem fuga voluptatibus a
                            repudiandae expedita omnis molestiae alias repellat perferendis dolores dolor.
                        </div>
                        <div class="acctitle"><i class="acc-closed icon-lock3"></i><i class="acc-open icon-lock3"></i>How
                            much money can I make?
                        </div>
                        <div class="acc_content clearfix">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Possimus, fugiat iste nisi tempore nesciunt nemo fuga? Nesciunt, delectus laboriosam nisi
                            repudiandae nam fuga saepe animi recusandae. Asperiores, provident, esse, doloremque,
                            adipisci eaque alias dolore molestias assumenda quasi saepe nisi ab illo ex nesciunt nobis
                            laboriosam iusto quia nulla ad voluptatibus iste beatae voluptas corrupti facilis accusamus
                            recusandae sequi debitis reprehenderit quibusdam. Facilis eligendi a exercitationem nisi et
                            placeat excepturi velit!
                        </div>
                    </div>

                    <h4 class="topmargin">Authors <small>(5)</small></h4>
                    <div class="accordion accordion-border nobottommargin clearfix" data-state="closed">
                        <div class="acctitle"><i class="acc-closed icon-download-alt"></i><i
                                class="acc-open icon-download-alt"></i>Can I offer my items for free on a promotional
                            basis?
                        </div>
                        <div class="acc_content clearfix">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Assumenda, dolorum, vero ipsum molestiae minima odio quo voluptate illum excepturi quam cum
                            voluptates doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque
                            explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe, aperiam, nam
                            unde quas beatae vero vitae nulla.
                        </div>
                        <div class="acctitle"><i class="acc-closed icon-ok"></i><i class="acc-open icon-ok"></i>An
                            Introduction to the Marketplaces for Authors
                        </div>
                        <div class="acc_content clearfix">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Explicabo, placeat, architecto rem dolorem dignissimos repellat veritatis in et eos
                            doloribus magnam aliquam ipsa alias assumenda officiis quasi sapiente suscipit veniam odio
                            voluptatum. Enim at asperiores quod velit minima officia accusamus cumque eligendi
                            consequuntur fuga? Maiores, quasi, voluptates, exercitationem fuga voluptatibus a
                            repudiandae expedita omnis molestiae alias repellat perferendis dolores dolor.
                        </div>
                        <div class="acctitle"><i class="acc-closed icon-credit"></i><i class="acc-open icon-credit"></i>How
                            do I pay for items on the Marketplaces?
                        </div>
                        <div class="acc_content clearfix">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Possimus, fugiat iste nisi tempore nesciunt nemo fuga? Nesciunt, delectus laboriosam nisi
                            repudiandae nam fuga saepe animi recusandae. Asperiores, provident, esse, doloremque,
                            adipisci eaque alias dolore molestias assumenda quasi saepe nisi ab illo ex nesciunt nobis
                            laboriosam iusto quia nulla ad voluptatibus iste beatae voluptas corrupti facilis accusamus
                            recusandae sequi debitis reprehenderit quibusdam. Facilis eligendi a exercitationem nisi et
                            placeat excepturi velit!
                        </div>
                    </div>
                </div>

                <div class="col_half nobottommargin col_last">
                    <h4>Item Discussion <small>(9)</small></h4>
                    <div class="accordion accordion-border clearfix" data-state="closed">
                        <div class="acctitle"><i class="acc-closed icon-picture"></i><i
                                class="acc-open icon-picture"></i>What Images, Videos, Code Can I Use in my Items?
                        </div>
                        <div class="acc_content clearfix">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Assumenda, dolorum, vero ipsum molestiae minima odio quo voluptate illum excepturi quam cum
                            voluptates doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque
                            explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe, aperiam, nam
                            unde quas beatae vero vitae nulla.
                        </div>
                        <div class="acctitle"><i class="acc-closed icon-file3"></i><i class="acc-open icon-file3"></i>Can
                            I use trademarked names in my items?
                        </div>
                        <div class="acc_content clearfix">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Explicabo, placeat, architecto rem dolorem dignissimos repellat veritatis in et eos
                            doloribus magnam aliquam ipsa alias assumenda officiis quasi sapiente suscipit veniam odio
                            voluptatum. Enim at asperiores quod velit minima officia accusamus cumque eligendi
                            consequuntur fuga? Maiores, quasi, voluptates, exercitationem fuga voluptatibus a
                            repudiandae expedita omnis molestiae alias repellat perferendis dolores dolor.
                        </div>
                        <div class="acctitle"><i class="acc-closed icon-phone3"></i><i class="acc-open icon-phone3"></i>How
                            can I get support for an item?
                        </div>
                        <div class="acc_content clearfix">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Possimus, fugiat iste nisi tempore nesciunt nemo fuga? Nesciunt, delectus laboriosam nisi
                            repudiandae nam fuga saepe animi recusandae. Asperiores, provident, esse, doloremque,
                            adipisci eaque alias dolore molestias assumenda quasi saepe nisi ab illo ex nesciunt nobis
                            laboriosam iusto quia nulla ad voluptatibus iste beatae voluptas corrupti facilis accusamus
                            recusandae sequi debitis reprehenderit quibusdam. Facilis eligendi a exercitationem nisi et
                            placeat excepturi velit!
                        </div>
                    </div>
                    <h4 class="topmargin">Affiliates <small>(3)</small></h4>
                    <div class="accordion accordion-border nobottommargin clearfix" data-state="closed">
                        <div class="acctitle"><i class="acc-closed icon-money"></i><i class="acc-open icon-money"></i>How
                            does the Tuts+ Premium affiliate program work?
                        </div>
                        <div class="acc_content clearfix">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Assumenda, dolorum, vero ipsum molestiae minima odio quo voluptate illum excepturi quam cum
                            voluptates doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque
                            explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe, aperiam, nam
                            unde quas beatae vero vitae nulla.
                        </div>
                        <div class="acctitle"><i class="acc-closed icon-bar-chart"></i><i
                                class="acc-open icon-bar-chart"></i>Tips for Increasing Your Referral Income
                        </div>
                        <div class="acc_content clearfix">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Explicabo, placeat, architecto rem dolorem dignissimos repellat veritatis in et eos
                            doloribus magnam aliquam ipsa alias assumenda officiis quasi sapiente suscipit veniam odio
                            voluptatum. Enim at asperiores quod velit minima officia accusamus cumque eligendi
                            consequuntur fuga? Maiores, quasi, voluptates, exercitationem fuga voluptatibus a
                            repudiandae expedita omnis molestiae alias repellat perferendis dolores dolor.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
