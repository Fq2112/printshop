<form id="form-blogCategory" method="post" action="{{route('update.order.status')}}">
    {{csrf_field()}}
    <div class="row">
        <input type="hidden" name="id" id="" value="{{$order}}">
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-sm table-borderless table-hover ">
                <thead class="bg-warning">
                <tr>
                    <th scope="col" class="text-light">#</th>
                    <th scope="col" class="text-light">Product</th>
                    <th scope="col" class="text-light" align="center">Detail</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <td></td>
                    <td>

                        @if(!empty($cart->subkategori_id))
                            {{$cart->getSubKategori->name}}
                        @elseif(!empty($cart->cluster_id))
                            {{$cart->getCluster->name}}
                        @endif
                    </td>
                    <td>
                        @if(!empty($cart->material_id))
                            <strong>Material
                                :</strong>  {{\App\Models\Material::find($cart->material_id)->name}}
                            <br>
                        @endif

                        @if(!empty($cart->type_id))
                            <strong>Type
                                :</strong>  {{\App\Models\TypeProduct::find($cart->type_id)->name}}
                            <br>
                        @endif

                        @if(!empty($cart->balance_id))
                            <strong>Balance
                                :</strong>  {{\App\Models\Balance::find($cart->balance_id)->name}}
                            <br>
                        @endif

                        @if(!empty($cart->page_id))
                            <strong>Page
                                :</strong>  {{\App\Models\Pages::find($cart->page_id)->name}}
                            <br>
                        @endif

                        @if(!empty($cart->size_id))
                            <strong>Size
                                :</strong>  {{\App\Models\Size::find($cart->size_id)->name}}
                            <br>
                        @endif

                        @if(!empty($cart->lamination_id))
                            <strong>Lamination
                                :</strong>  {{\App\Models\Lamination::find($cart->lamination_id)->name}}
                            <br>
                        @endif

                        @if(!empty($cart->side_id))
                            <strong>Side
                                :</strong>  {{\App\Models\Side::find($cart->side_id)->name}}
                            <br>
                        @endif

                        @if(!empty($cart->edge_id))
                            <strong>Edge type
                                :</strong>  {{\App\Models\Edge::find($cart->edge_id)->name}}
                            <br>
                        @endif

                        @if(!empty($cart->color_id))
                            <strong>Color type
                                :</strong>  {{\App\Models\Colors::find($cart->color_id)->name}}
                            <br>
                        @endif

                        @if(!empty($cart->finishing_id))
                            <strong>Finishing
                                :</strong>  {{\App\Models\Finishing::find($cart->finishing_id)->name}}
                            <br>
                        @endif

                        @if(!empty($cart->folding_id))
                            <strong>Folding type
                                :</strong>  {{\App\Models\Folding::find($cart->folding_id)->name}}
                            <br>
                        @endif

                        @if(!empty($cart->front_side_id))
                            <strong>Front Side
                                :</strong>  {{\App\Models\Front::find($cart->front_side_id)->name}}
                            <br>
                        @endif

                        @if(!empty($cart->right_side_id))
                            <strong>Right Side
                                :</strong>  {{\App\Models\RightLeftSide::find($cart->right_side_id)->name}}
                            <br>
                        @endif

                        @if(!empty($cart->left_side_id))
                            <strong>Left Side
                                :</strong>  {{\App\Models\RightLeftSide::find($cart->right_side_id)->name}}
                            <br>
                        @endif

                        @if(!empty($cart->back_side_id))
                            <strong>Back Side
                                :</strong>  {{\App\Models\BackSide::find($cart->back_side_id)->name}}
                            <br>
                        @endif

                        @if(!empty($cart->front_cover_id))
                            <strong>Front Cover
                                :</strong>  {{\App\Models\Material::find($cart->front_cover_id)->name}}
                            <br>
                        @endif

                        @if(!empty($cart->back_cover_id))
                            <strong>Back Cover
                                :</strong>  {{\App\Models\Material::find($cart->back_cover_id)->name}}
                            <br>
                        @endif

                        @if(!empty($cart->binding_id))
                            <strong>Binding type
                                :</strong>  {{\App\Models\Finishing::find($cart->binding_id)->name}}
                            <br>
                        @endif

                        @if(!empty($cart->print_method_id))
                            <strong>Print Method
                                :</strong>  {{\App\Models\PrintingMethods::find($cart->print_method_id)->name}}
                            <br>
                        @endif

                        @if(!empty($cart->side_cover_id))
                            <strong>Side Cover
                                :</strong>  {{\App\Models\Side::find($cart->side_cover_id)->name}}
                            <br>
                        @endif

                        @if(!empty($cart->cover_lamination_id))
                            <strong>Cover Lamnination
                                :</strong>  {{\App\Models\Lamination::find($cart->cover_lamination_id)->name}}
                            <br>
                        @endif

                        @if(!empty($cart->lid_id))
                            <strong>Lid Type
                                :</strong>  {{\App\Models\Lid::find($cart->lid_id)->name}}
                            <br>
                        @endif

                        @if(!empty($cart->material_cover_id))
                            <strong>Material Cover
                                :</strong>  {{\App\Models\Material::find($cart->material_cover_id)->name}}
                            <br>
                        @endif

                        @if(!empty($cart->orientation_id))
                            <strong>Orientation
                                :</strong>  {{\App\Models\Finishing::find($cart->orientation_id)->name}}
                            <br>
                        @endif

                        @if(!empty($cart->extra_id))
                            <strong>Extra
                                :</strong>  {{\App\Models\Finishing::find($cart->extra_id)->name}}
                            <br>
                        @endif

                        @if(!empty($cart->holder_id))
                            <strong>Holder type
                                :</strong>  {{\App\Models\Finishing::find($cart->holder_id)->name}}
                            <br>
                        @endif

                        @if(!empty($cart->material_color_id))
                            <strong>Material Color
                                :</strong>  {{\App\Models\Colors::find($cart->material_color_id)->name}}
                            <br>
                        @endif
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" >Proceed </button>
    </div>
</form>
