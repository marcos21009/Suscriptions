<div class="box-body">
    <div class='form-group{{ $errors->has("$lang.title") ? ' has-error' : '' }}'>
        @php $oldName = $product->translate($lang)->slug ?? ''@endphp
        {!! Form::label("{$lang}[name]", trans('suscriptions::products.form.name')) !!}
        {!! Form::text("{$lang}[name]", old("$lang.name",$oldName), ['class' => 'form-control', 'placeholder' => trans('suscriptions::products.form.name')]) !!}
        {!! $errors->first("$lang.title", '<span class="help-block">:message</span>') !!}
    </div>
    @php $oldDescription = $product->translate($lang)->description ?? ''@endphp
    @editor('description', trans('suscriptions::products.form.description'), old("{$lang}.description",$oldDescription), $lang)

    {{-- @if (config('asgard.blog.config.post.partials.translatable.create') !== [])
         @foreach (config('asgard.blog.config.post.partials.translatable.create') as $partial)
             @include($partial)
         @endforeach
     @endif--}}
    <div class='form-group{{ $errors->has("require_shipping_address") ? ' has-error' : '' }}'>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="1" {{$product->require_shipping_address ? ' checked="checked"':''}}
                       name="require_shipping_address" >
                {{trans('suscriptions::products.form.Require Shipping Address')}}
            </label>
        </div>


        {!! $errors->first("$lang.title", '<span class="help-block">:message</span>') !!}
    </div>
</div>
@push('crud_fields_scripts')
    <script>
        jQuery(document).ready(function($) {
            $('input[type="checkbox"].flat-blue, input[type="radio"]').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
        });
    </script>
@endpush
