<form id="form-blogCategory" method="post" action="{{route('admin.shipper.create.order')}}">
    {{csrf_field()}}
    <div class="row">
        <div class="col">
            <div class="alert alert-warning d-flex flex-row">
                <i class="fas fa-fw fa-exclamation-circle mr-3 align-self-center"></i>
                <div>
                <strong> Pastikan produk telah dikemas, Shipper akan segera menghubungi Premier setelah data diproses </strong>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col">
            <label for="name">Payment Code <sup class="text-danger">*</sup></label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-tag"></i></span>
                </div>
                <input id="payment_code" type="text" maxlength="191" name="payment_code" class="form-control disabled"
                       readonly value="{{$code}}"
                       placeholder="Write its name here&hellip;" required>
                <input type="hidden" name="id"  value="{{$payment->id}}">
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <table class="table table-sm table-borderless table-hover ">
                <thead class="bg-warning">
                <tr>
                    <th scope="col" class="text-light">#</th>
                    <th scope="col" class="text-light">Product</th>
                    <th scope="col" class="text-light">Qty</th>
                    <th scope="col" class="text-light" align="center">Status</th>

                </tr>
                </thead>
                <tbody>
                @foreach($data as $item)
                    <?php
                        $cart = \App\Models\Cart::find($item->cart_id);
                    ?>
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>  @if(!empty($cart->subkategori_id))
                                {{$cart->getSubKategori->name}}
                            @elseif(!empty($cart->cluster_id))
                                {{$cart->getCluster->name}}
                            @endif
                        </td>
                        <td align="center"> {{$cart->qty}}</td>
                        <td align="center">
                            @if($item->progress_status == \App\Support\StatusProgress::NEW)
                                <span class="badge badge-info"><span
                                        class="fa fa-shopping-basket"></span> New</span>
                            @elseif($item->progress_status == \App\Support\StatusProgress::START_PRODUCTION || $item->progress_status == \App\Support\StatusProgress::FINISH_PRODUCTION)
                                <span class="badge badge-warning"><span class="fa fa-cogs"></span> On Produce</span>
                            @elseif($item->progress_status == \App\Support\StatusProgress::SHIPPING)
                                <span class="badge badge-info"><span
                                        class="fa fa-shipping-fast"></span>  Shipping</span>
                            @elseif($item->progress_status == \App\Support\StatusProgress::RECEIVED)
                                <span class="badge badge-success"><span
                                        class="fa fa-clipboard-check"></span>  Received</span>
                            @endif
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>