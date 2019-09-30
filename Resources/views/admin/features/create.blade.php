@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('suscriptions::features.title.create feature') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i
                        class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li>
            <a href="{{ route('admin.suscriptions.feature.index',[$product_id]) }}">{{ trans('suscriptions::features.title.features') }}</a>
        </li>
        <li class="active">{{ trans('suscriptions::features.title.create feature') }}</li>
    </ol>
@stop

@section('content')
    <form method="post" action="{{route('admin.suscriptions.feature.store',[$product_id])}}">
        {{ csrf_field() }}
        <input type="hidden" name="product_id" value="{{$product_id}}">
    <div class="row">
        <div class="col-md-4">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="nav-tabs-custom">
                                @include('partials.form-tab-headers')
                                <div class="tab-content">
                                    <?php $i = 0; ?>
                                    @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                                        <?php $i++; ?>
                                        <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}"
                                             id="tab_{{ $i }}">
                                            @include('suscriptions::admin.features.partials.create-fields', ['lang' => $locale])
                                        </div>
                                    @endforeach
                                    <div class="box-body">

                                        <div class='form-group{{ $errors->has("status") ? ' has-error' : '' }}'>
                                            <div>
                                                <label>{{trans('suscriptions::status.title')}}</label>
                                            </div>
                                            <label class="radio-inline" for="{{trans('suscriptions::status.inactive')}}">
                                                <input type="radio" id="status" name="status" value="0" checked>
                                                {{trans('suscriptions::status.inactive')}}
                                            </label>
                                            <label class="radio-inline" for="{{trans('suscriptions::status.active')}}">
                                                <input type="radio" id="status" name="status" value="1">
                                                {{trans('suscriptions::status.active')}}
                                            </label>
                                        </div>

                                        <div class='form-group{{ $errors->has("type") ? ' has-error' : '' }}'>
                                            {!! Form::label("type", trans('suscriptions::features.form.type')) !!}
                                            <select class="form-control">
                                                <option>{{trans('suscriptions::types.type selection')}}</option>
                                                <option value="0">{{ trans('suscriptions::types.quantity')}}</option>
                                                <option value="1">{{trans('suscriptions::types.text')}}</option>
                                                <option value="2">{{trans('suscriptions::types.boolean')}}</option>
                                            </select>
                                            {!! $errors->first("type", '<span class="help-block">:message</span>') !!}
                                        </div>
                                        <div class='form-group{{ $errors->has("unit") ? ' has-error' : '' }}'>
                                            {!! Form::label("unit", trans('suscriptions::features.form.unit')) !!}
                                            {!! Form::text("unit", old("unit"), ['class' => 'form-control', 'placeholder' => trans('suscriptions::features.form.unit')]) !!}
                                            {!! $errors->first("unit", '<span class="help-block">:message</span>') !!}
                                        </div>

                                    </div>
                                </div>
                            </div> {{-- end nav-tabs-custom --}}
                        </div>
                        <div class="box-footer">
                            <button type="submit"
                                    class="btn btn-primary btn-flat">{{ trans('core::core.button.create') }}</button>
                            <a class="btn btn-danger pull-right btn-flat"
                               href="{{ route('admin.suscriptions.feature.index',[$product_id])}}"><i
                                        class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('core::core.back to index') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).keypressAction({
                actions: [
                    {key: 'b', route: "<?= route('admin.suscriptions.feature.index',[$product_id]) ?>"}
                ]
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
        });
    </script>
@endpush
