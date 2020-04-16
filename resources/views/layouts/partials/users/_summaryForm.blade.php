<tbody class="font-weight-bold">
@if($specs->is_type == true)
    <tr>
        <td>{{__('lang.product.form.summary.type')}}</td>
        <td>:&nbsp;</td>
        <td class="show-type"></td>
    </tr>
@endif
@if($specs->is_material == true)
    <tr>
        <td>{{__('lang.product.form.summary.materials')}}</td>
        <td>:&nbsp;</td>
        <td class="show-materials"></td>
    </tr>
@endif
@if($specs->is_color == true)
    <tr>
        <td>{{__('lang.product.form.summary.color')}}</td>
        <td>:&nbsp;</td>
        <td class="show-color"></td>
    </tr>
@endif
@if($specs->is_print_method == true)
    <tr>
        <td>{{__('lang.product.form.summary.print_method')}}</td>
        <td>:&nbsp;</td>
        <td class="show-print_method"></td>
    </tr>
@endif
@if($specs->is_size == true)
    <tr>
        <td>{{__('lang.product.form.summary.size')}}</td>
        <td>:&nbsp;</td>
        <td class="show-size"></td>
    </tr>
@endif
@if($specs->is_side == true)
    <tr>
        <td>{{__('lang.product.form.summary.side')}}</td>
        <td>:&nbsp;</td>
        <td class="show-side"></td>
    </tr>
@endif
@if($specs->is_edge == true)
    <tr>
        <td>{{__('lang.product.form.summary.corner')}}</td>
        <td>:&nbsp;</td>
        <td class="show-corner"></td>
    </tr>
@endif
@if($specs->is_front_side == true)
    <tr>
        <td>{{__('lang.product.form.summary.front_side')}}</td>
        <td>:&nbsp;</td>
        <td class="show-front_side"></td>
    </tr>
@endif
@if($specs->is_back_side == true)
    <tr>
        <td>{{__('lang.product.form.summary.back_side')}}</td>
        <td>:&nbsp;</td>
        <td class="show-back_side"></td>
    </tr>
@endif
@if($specs->is_right_side == true)
    <tr>
        <td>{{__('lang.product.form.summary.right_side')}}</td>
        <td>:&nbsp;</td>
        <td class="show-right_side"></td>
    </tr>
@endif
@if($specs->is_left_side == true)
    <tr>
        <td>{{__('lang.product.form.summary.left_side')}}</td>
        <td>:&nbsp;</td>
        <td class="show-left_side"></td>
    </tr>
@endif
@if($specs->is_balance == true)
    <tr>
        <td>{{__('lang.product.form.summary.balance')}}</td>
        <td>:&nbsp;</td>
        <td class="show-balance"></td>
    </tr>
@endif
@if($specs->is_copies == true)
    <tr>
        <td>{{__('lang.product.form.summary.copies')}}</td>
        <td>:&nbsp;</td>
        <td class="show-copies"></td>
    </tr>
@endif
@if($specs->is_page == true)
    <tr>
        <td>{{__('lang.product.form.summary.page')}}</td>
        <td>:&nbsp;</td>
        <td class="show-page"></td>
    </tr>
@endif
@if($specs->is_front_cover == true)
    <tr>
        <td>{{__('lang.product.form.summary.front_cover')}}</td>
        <td>:&nbsp;</td>
        <td class="show-front_cover"></td>
    </tr>
@endif
@if($specs->is_back_cover == true)
    <tr>
        <td>{{__('lang.product.form.summary.back_cover')}}</td>
        <td>:&nbsp;</td>
        <td class="show-back_cover"></td>
    </tr>
@endif
@if($specs->is_binding == true)
    <tr>
        <td>{{__('lang.product.form.summary.binding')}}</td>
        <td>:&nbsp;</td>
        <td class="show-binding"></td>
    </tr>
@endif
@if($specs->is_lamination == true)
    <tr>
        <td>{{__('lang.product.form.summary.lamination')}}</td>
        <td>:&nbsp;</td>
        <td class="show-lamination"></td>
    </tr>
@endif
</tbody>
