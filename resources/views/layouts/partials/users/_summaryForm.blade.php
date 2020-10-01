<tbody class="font-weight-bold">
@if($specs->is_type == true && count(\App\Models\TypeProduct::whereIn('id', $specs->type_ids)->where('isActive', true)->get()) > 0)
    <tr>
        <td>{{__('lang.product.form.summary.type')}}</td>
        <td>:&nbsp;</td>
        <td class="show-type"></td>
    </tr>
@endif
@if($specs->is_material_cover == true && count(\App\Models\Material::whereIn('id', $specs->material_cover_ids)->where('isActive', true)->get()) > 0)
    <tr>
        <td>{{__('lang.product.form.summary.cover_material')}}</td>
        <td>:&nbsp;</td>
        <td class="show-cover_material"></td>
    </tr>
@endif
@if($specs->is_side_cover == true && count(\App\Models\Side::whereIn('id', $specs->side_cover_ids)->where('isActive', true)->get()) > 0)
    <tr>
        <td>{{__('lang.product.form.summary.cover_side')}}</td>
        <td>:&nbsp;</td>
        <td class="show-cover_side"></td>
    </tr>
@endif
@if($specs->is_cover_lamination == true && count(\App\Models\Lamination::whereIn('id', $specs->cover_lamination_ids)->where('isActive', true)->get()) > 0)
    <tr>
        <td>{{__('lang.product.form.summary.cover_lamination')}}</td>
        <td>:&nbsp;</td>
        <td class="show-cover_lamination"></td>
    </tr>
@endif
@if($specs->is_material == true && count(\App\Models\Material::whereIn('id', $specs->material_ids)->where('isActive', true)->get()) > 0)
    <tr>
        <td>{{__('lang.product.form.summary.materials')}}</td>
        <td>:&nbsp;</td>
        <td class="show-materials"></td>
    </tr>
@endif
@if($specs->is_material_color == true && count(\App\Models\Colors::whereIn('id', $specs->material_color_ids)->where('isActive', true)->get()) > 0)
    <tr>
        <td>{{__('lang.product.form.summary.material_color')}}</td>
        <td>:&nbsp;</td>
        <td class="show-material_color"></td>
    </tr>
@endif
@if($specs->is_color == true && count(\App\Models\Colors::whereIn('id', $specs->color_ids)->where('isActive', true)->get()) > 0)
    <tr>
        <td>{{__('lang.product.form.summary.color')}}</td>
        <td>:&nbsp;</td>
        <td class="show-color"></td>
    </tr>
@endif
@if($specs->is_print_method == true && count(\App\Models\PrintingMethods::whereIn('id', $specs->print_method_ids)->where('isActive', true)->get()) > 0)
    <tr>
        <td>{{__('lang.product.form.summary.print_method')}}</td>
        <td>:&nbsp;</td>
        <td class="show-print_method"></td>
    </tr>
@endif
@if($specs->is_size == true && count(\App\Models\Size::whereIn('id', $specs->size_ids)->where('isActive', true)->get()) > 0)
    <tr>
        <td>{{__('lang.product.form.summary.size')}}</td>
        <td>:&nbsp;</td>
        <td class="show-size"></td>
    </tr>
@endif
@if($specs->is_side == true && count(\App\Models\Side::whereIn('id', $specs->side_ids)->where('isActive', true)->get()) > 0)
    <tr>
        <td>{{__('lang.product.form.summary.side')}}</td>
        <td>:&nbsp;</td>
        <td class="show-side"></td>
    </tr>
@endif
@if($specs->is_holder == true && count(\App\Models\Finishing::whereIn('id', $specs->holder_ids)->where('isActive', true)->get()) > 0)
    <tr>
        <td>{{__('lang.product.form.summary.holder')}}</td>
        <td>:&nbsp;</td>
        <td class="show-holder"></td>
    </tr>
@endif
@if($specs->is_lid == true && count(\App\Models\Lid::whereIn('id', $specs->lid_ids)->where('isActive', true)->get()) > 0)
    <tr>
        <td>{{__('lang.product.form.summary.lid')}}</td>
        <td>:&nbsp;</td>
        <td class="show-lid"></td>
    </tr>
@endif
@if($specs->is_edge == true && count(\App\Models\Edge::whereIn('id', $specs->edge_ids)->where('isActive', true)->get()) > 0)
    <tr>
        <td>{{__('lang.product.form.summary.corner')}}</td>
        <td>:&nbsp;</td>
        <td class="show-corner"></td>
    </tr>
@endif
@if($specs->is_folding == true && count(\App\Models\Folding::whereIn('id', $specs->folding_ids)->where('isActive', true)->get()) > 0)
    <tr>
        <td>{{__('lang.product.form.summary.folding')}}</td>
        <td>:&nbsp;</td>
        <td class="show-folding"></td>
    </tr>
@endif
@if($specs->is_front_side == true && count(\App\Models\Front::whereIn('id', $specs->front_side_ids)->where('isActive', true)->get()) > 0)
    <tr>
        <td>{{__('lang.product.form.summary.front_side')}}</td>
        <td>:&nbsp;</td>
        <td class="show-front_side"></td>
    </tr>
@endif
@if($specs->is_back_side == true && count(\App\Models\BackSide::whereIn('id', $specs->back_side_ids)->where('isActive', true)->get()) > 0)
    <tr>
        <td>{{__('lang.product.form.summary.back_side')}}</td>
        <td>:&nbsp;</td>
        <td class="show-back_side"></td>
    </tr>
@endif
@if($specs->is_right_side == true && count(\App\Models\RightLeftSide::whereIn('id', $specs->right_side_ids)->where('isActive', true)->get()) > 0)
    <tr>
        <td>{{__('lang.product.form.summary.right_side')}}</td>
        <td>:&nbsp;</td>
        <td class="show-right_side"></td>
    </tr>
@endif
@if($specs->is_left_side == true && count(\App\Models\RightLeftSide::whereIn('id', $specs->left_side_ids)->where('isActive', true)->get()) > 0)
    <tr>
        <td>{{__('lang.product.form.summary.left_side')}}</td>
        <td>:&nbsp;</td>
        <td class="show-left_side"></td>
    </tr>
@endif
@if($specs->is_balance == true && count(\App\Models\Balance::whereIn('id', $specs->balance_ids)->where('isActive', true)->get()) > 0)
    <tr>
        <td>{{__('lang.product.form.summary.balance')}}</td>
        <td>:&nbsp;</td>
        <td class="show-balance"></td>
    </tr>
@endif
@if($specs->is_copies == true && count(\App\Models\Copies::whereIn('id', $specs->copies_ids)->where('isActive', true)->get()) > 0)
    <tr>
        <td>{{__('lang.product.form.summary.copies')}}</td>
        <td>:&nbsp;</td>
        <td class="show-copies"></td>
    </tr>
@endif
@if($specs->is_page == true && count(\App\Models\Pages::whereIn('id', $specs->page_ids)->where('isActive', true)->get()) > 0)
    <tr>
        <td>{{__('lang.product.form.summary.page')}}</td>
        <td>:&nbsp;</td>
        <td class="show-page"></td>
    </tr>
@endif
@if($specs->is_front_cover == true && count(\App\Models\Material::whereIn('id', $specs->front_cover_ids)->where('isActive', true)->get()) > 0)
    <tr>
        <td>{{__('lang.product.form.summary.front_cover')}}</td>
        <td>:&nbsp;</td>
        <td class="show-front_cover"></td>
    </tr>
@endif
@if($specs->is_back_cover == true && count(\App\Models\Material::whereIn('id', $specs->back_cover_ids)->where('isActive', true)->get()) > 0)
    <tr>
        <td>{{__('lang.product.form.summary.back_cover')}}</td>
        <td>:&nbsp;</td>
        <td class="show-back_cover"></td>
    </tr>
@endif
@if($specs->is_orientation == true && count(\App\Models\Finishing::whereIn('id', $specs->orientation_ids)->where('isActive', true)->get()) > 0)
    <tr>
        <td>{{__('lang.product.form.summary.orientation')}}</td>
        <td>:&nbsp;</td>
        <td class="show-orientation"></td>
    </tr>
@endif
@if($specs->is_binding == true && count(\App\Models\Finishing::whereIn('id', $specs->binding_ids)->where('isActive', true)->get()) > 0)
    <tr>
        <td>{{__('lang.product.form.summary.binding')}}</td>
        <td>:&nbsp;</td>
        <td class="show-binding"></td>
    </tr>
@endif
@if($specs->is_lamination == true && count(\App\Models\Lamination::whereIn('id', $specs->lamination_ids)->where('isActive', true)->get()) > 0)
    <tr>
        <td>{{__('lang.product.form.summary.lamination')}}</td>
        <td>:&nbsp;</td>
        <td class="show-lamination"></td>
    </tr>
@endif
@if($specs->is_finishing == true && count(\App\Models\Finishing::whereIn('id', $specs->finishing_ids)->where('isActive', true)->get()) > 0)
    <tr>
        <td>Finishing</td>
        <td>:&nbsp;</td>
        <td class="show-finishing"></td>
    </tr>
@endif
@if($specs->is_extra == true && count(\App\Models\Finishing::whereIn('id', $specs->extra_ids)->where('isActive', true)->get()) > 0)
    <tr>
        <td>{{__('lang.product.form.summary.extra')}}</td>
        <td>:&nbsp;</td>
        <td class="show-extra"></td>
    </tr>
@endif
</tbody>
