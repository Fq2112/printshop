<div class="section-body">
    <div class="invoice">
        <div class="invoice-print">
            <div class="row">
                <div class="col-lg-12">
                    <div class="invoice-title">
                        <h2>Invoice</h2>
                        <div class="invoice-number">#{{$head->uni_code_payment}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <address>
                                <strong>Billed To:</strong><br>
                                {{$head->getUser->name}}<br>
                                <strong>Phone:</strong><br>
                                {{$head->getUser->getBio->phone ?? " - "}}<br>
                                <strong>Email:</strong><br>
                                {{$head->getUser->email}}
                            </address>
                        </div>
                        <div class="col-md-6 text-md-right">
                            <address>
                                <strong>Payment Method:</strong><br>
                                Visa ending **** 4242<br>
                                <strong>Order Date:</strong><br>
                                {{\Carbon\Carbon::parse($head->created_at)->format('d - F - Y')}}<br><br>
                            </address>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="section-title">Order Summary</div>
                    <p class="section-lead">All items here cannot be deleted.</p>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-md">
                            <tr>
                                <th>Item</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Shipping Cost</th>
                                <th class="text-right">Totals</th>
                            </tr>
                            <?php
                            $total = 0;
                            ?>
                            @foreach($data as $datum)
                                <tr>
                                    <td>
                                        @if(!empty($datum->getCart->subkategori_id))
                                            {{$datum->getCart->getSubKategori->name}}
                                        @elseif(!empty($datum->getCart->cluster_id))
                                            {{$datum->getCart->getCluster->name}}
                                        @endif

                                    </td>
                                    <td class="text-center">Rp. {{number_format($datum->getCart->price_pcs)}}</td>
                                    <td class="text-center">{{number_format($datum->getCart->qty)}}</td>
                                    <td class="text-center">Rp. {{number_format($datum->getCart->ongkir)}}</td>
                                    <td class="text-right">Rp. {{number_format($datum->price_total)}}</td>
                                    <?php
                                    $total = $total + $datum->price_total;
                                    ?>
                                </tr>
                                <tr>
                                    <td colspan="5">
                                        @if(!empty($datum->getCart->material_id))
                                            <strong>Material :</strong>  {{\App\Models\Material::find($datum->getCart->material_id)->name}} <br>
                                        @endif

                                        @if(!empty($datum->getCart->type_id))
                                            <strong>Type :</strong>  {{\App\Models\TypeProduct::find($datum->getCart->type_id)->name}} <br>
                                            @endif

                                        @if(!empty($datum->getCart->balance_id))
                                            <strong>Balance :</strong>  {{\App\Models\Balance::find($datum->getCart->balance_id)->name}} <br>
                                            @endif

                                        @if(!empty($datum->getCart->page_id))
                                            <strong>Page :</strong>  {{\App\Models\Pages::find($datum->getCart->page_id)->name}} <br>
                                            @endif

                                        @if(!empty($datum->getCart->size_id))
                                            <strong>Size :</strong>  {{\App\Models\Size::find($datum->getCart->size_id)->name}} <br>
                                            @endif

                                        @if(!empty($datum->getCart->lamination_id))
                                            <strong>Lamination :</strong>  {{\App\Models\Lamination::find($datum->getCart->lamination_id)->name}} <br>
                                            @endif

                                        @if(!empty($datum->getCart->side_id))
                                            <strong>Side :</strong>  {{\App\Models\Side::find($datum->getCart->side_id)->name}} <br>
                                            @endif

                                        @if(!empty($datum->getCart->edge_id))
                                            <strong>Edge type :</strong>  {{\App\Models\Edge::find($datum->getCart->edge_id)->name}} <br>
                                            @endif

                                        @if(!empty($datum->getCart->color_id))
                                            <strong>Color type :</strong>  {{\App\Models\Colors::find($datum->getCart->color_id)->name}} <br>
                                            @endif

                                        @if(!empty($datum->getCart->finishing_id))
                                            <strong>Finishing :</strong>  {{\App\Models\Finishing::find($datum->getCart->finishing_id)->name}} <br>
                                            @endif

                                        @if(!empty($datum->getCart->folding_id))
                                            <strong>Folding type :</strong>  {{\App\Models\Folding::find($datum->getCart->folding_id)->name}} <br>
                                            @endif

                                        @if(!empty($datum->getCart->front_side_id))
                                            <strong>Front Side :</strong>  {{\App\Models\Front::find($datum->getCart->front_side_id)->name}} <br>
                                            @endif

                                        @if(!empty($datum->getCart->right_side_id))
                                            <strong>Right Side :</strong>  {{\App\Models\RightLeftSide::find($datum->getCart->right_side_id)->name}} <br>
                                            @endif

                                        @if(!empty($datum->getCart->left_side_id))
                                            <strong>Left Side :</strong>  {{\App\Models\RightLeftSide::find($datum->getCart->right_side_id)->name}} <br>
                                            @endif

                                        @if(!empty($datum->getCart->back_side_id))
                                            <strong>Back Side :</strong>  {{\App\Models\BackSide::find($datum->getCart->back_side_id)->name}} <br>
                                            @endif

                                        @if(!empty($datum->getCart->front_cover_id))
                                            <strong>Front Cover :</strong>  {{\App\Models\Material::find($datum->getCart->front_cover_id)->name}} <br>
                                            @endif

                                        @if(!empty($datum->getCart->back_cover_id))
                                            <strong>Back Cover :</strong>  {{\App\Models\Material::find($datum->getCart->back_cover_id)->name}} <br>
                                            @endif

                                        @if(!empty($datum->getCart->binding_id))
                                            <strong>Binding type :</strong>  {{\App\Models\Finishing::find($datum->getCart->binding_id)->name}} <br>
                                            @endif

                                        @if(!empty($datum->getCart->print_method_id))
                                            <strong>Print Method :</strong>  {{\App\Models\PrintingMethods::find($datum->getCart->print_method_id)->name}} <br>
                                            @endif

                                        @if(!empty($datum->getCart->side_cover_id))
                                            <strong>Side Cover :</strong>  {{\App\Models\Side::find($datum->getCart->side_cover_id)->name}} <br>
                                            @endif

                                        @if(!empty($datum->getCart->cover_lamination_id))
                                            <strong>Cover Lamnination :</strong>  {{\App\Models\Lamination::find($datum->getCart->cover_lamination_id)->name}} <br>
                                            @endif

                                        @if(!empty($datum->getCart->lid_id))
                                            <strong>Lid Type :</strong>  {{\App\Models\Lid::find($datum->getCart->lid_id)->name}} <br>
                                            @endif

                                        @if(!empty($datum->getCart->material_cover_id))
                                            <strong>Material Cover :</strong>  {{\App\Models\Material::find($datum->getCart->material_cover_id)->name}} <br>
                                            @endif

                                        @if(!empty($datum->getCart->orientation_id))
                                            <strong>Orientation :</strong>  {{\App\Models\Finishing::find($datum->getCart->orientation_id)->name}} <br>
                                            @endif

                                        @if(!empty($datum->getCart->extra_id))
                                            <strong>Extra :</strong>  {{\App\Models\Finishing::find($datum->getCart->extra_id)->name}} <br>
                                            @endif

                                        @if(!empty($datum->getCart->holder_id))
                                            <strong>Holder type :</strong>  {{\App\Models\Finishing::find($datum->getCart->holder_id)->name}} <br>
                                            @endif

                                        @if(!empty($datum->getCart->material_color_id))
                                            <strong>Material Color :</strong>  {{\App\Models\Colors::find($datum->getCart->material_color_id)->name}} <br>
                                            @endif


                                    </td>
                                </tr>
                            @endforeach

                        </table>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-8">
                            <div class="section-title">Payment Method</div>
                            <p class="section-lead">The payment method that we provide is to make it easier for you to
                                pay invoices.</p>
                            <div class="d-flex">
                                <div class="mr-2 bg-visa" data-width="61" data-height="38"></div>
                                <div class="mr-2 bg-jcb" data-width="61" data-height="38"></div>
                                <div class="mr-2 bg-mastercard" data-width="61" data-height="38"></div>
                                <div class="bg-paypal" data-width="61" data-height="38"></div>
                            </div>
                        </div>
                        <div class="col-lg-4 text-right">
{{--                            <div class="invoice-detail-item">--}}
{{--                                <div class="invoice-detail-name">Subtotal</div>--}}
{{--                                <div class="invoice-detail-value">$670.99</div>--}}
{{--                            </div>--}}
{{--                            <div class="invoice-detail-item">--}}
{{--                                <div class="invoice-detail-name">Shipping</div>--}}
{{--                                <div class="invoice-detail-value">$15</div>--}}
{{--                            </div>--}}
                            <hr class="mt-2 mb-2">
                            <div class="invoice-detail-item">
                                <div class="invoice-detail-name">Total</div>
                                <div class="invoice-detail-value invoice-detail-value-lg">Rp. {{number_format($total)}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="text-md-right">
            <div class="float-lg-left mb-lg-0 mb-3">
                <button class="btn btn-primary btn-icon icon-left"><i class="fas fa-credit-card"></i> Process Payment
                </button>
                <button class="btn btn-danger btn-icon icon-left"><i class="fas fa-times"></i> Cancel</button>
            </div>
            <button class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button>
        </div>
    </div>
</div>
