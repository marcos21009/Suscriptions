@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('suscriptions::plans.title.create plan') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i
                        class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li>
            <a href="{{ route('admin.suscriptions.plan.index',[$product_id]) }}">{{ trans('suscriptions::plans.title.plans') }}</a>
        </li>
        <li class="active">{{ trans('suscriptions::plans.title.create plan') }}</li>
    </ol>
@stop

@section('content')
    {!! Form::open(['route' => ['admin.suscriptions.plan.store',$product_id], 'method'=> 'post']) !!}
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
                                            @include('suscriptions::admin.plans.partials.create-fields', ['lang' => $locale])
                                        </div>
                                    @endforeach
                                    <div class="box-body">
                                        <div class='form-group{{ $errors->has("code") ? ' has-error' : '' }}'>
                                            {!! Form::label("code", trans('suscriptions::plans.form.code')) !!}
                                            {!! Form::text("code", old("code"), ['class' => 'form-control', 'placeholder' => trans('suscriptions::plans.form.code')]) !!}
                                            {!! $errors->first("code", '<span class="help-block">:message</span>') !!}
                                        </div>
                                        <div class='form-group{{ $errors->has("code") ? ' has-error' : '' }}'>
                                            <div>
                                                <label></label>
                                            </div>
                                            <label class="checkbox-inline" for="{{trans('suscriptions::plans.forms.Create this plan on gateway')}}">
                                                <input type="checkbox" id="status" name="status" value="0" checked>
                                                {{trans('suscriptions::plans.form.code')}}
                                            </label>
                                         </div>
                                    </div>

                                </div>
                            </div> {{-- end nav-tabs-custom --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="nav-tabs-custom">
                                <div class="tab-content">
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
                                    <?php $i = 0; ?>
                                    @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                                        <?php $i++; ?>
                                        <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}"
                                             id="tab_{{ $i }}">
                                            @include('suscriptions::admin.plans.partials.create-fields', ['lang' => $locale])
                                        </div>
                                    @endforeach
                                </div>
                            </div> {{-- end nav-tabs-custom --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                                            @include('suscriptions::admin.plans.partials.create-fields', ['lang' => $locale])
                                        </div>
                                    @endforeach
                                </div>
                            </div> {{-- end nav-tabs-custom --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box-footer">
                <button type="submit"
                        class="btn btn-primary btn-flat">{{ trans('core::core.button.create') }}</button>
                <a class="btn btn-danger pull-right btn-flat"
                   href="{{ route('admin.suscriptions.feature.index',[$product_id])}}"><i
                            class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
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
                    {key: 'b', route: "<?= route('admin.suscriptions.plan.index', [$product_id]) ?>"}
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
