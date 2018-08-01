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
    {!! Form::open(['route' => ['admin.suscriptions.plan.store', $product_id ], 'method'=> 'post']) !!}
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
                                    </div>
                                        <div class="box-body">
                                            <h3>{{trans('suscriptions::plans.form.count')}}</h3>
                                            <div class='form-group{{ $errors->has("price") ? ' has-error' : '' }}'>
                                                {!! Form::label("price", trans('suscriptions::plans.form.price')) !!}
                                                <div class="input-group">
                                                {!! Form::number("price", old("price"), ['class' => 'form-control', 'placeholder' => trans('suscriptions::plans.form.price')]) !!}
                                                    <div class="input-group-addon">$</div>
                                                </div>
                                                {!! $errors->first("price", '<span class="help-block">:message</span>') !!}
                                            </div>
                                           <div class="row">
                                               <div class="col-xs-12 col-md-6">
                                                   <div class='form-group{{ $errors->has("frequency") ? ' has-error' : '' }}'>
                                                       {!! Form::label("frequency", trans('suscriptions::plans.form.frequency')) !!}
                                                       {!! Form::number("frequency", old("frequency"), ['class' => 'form-control', 'placeholder' => trans('suscriptions::plans.form.frequency')]) !!}
                                                       {!! $errors->first("frequency", '<span class="help-block">:message</span>') !!}
                                                   </div>
                                                 </div>
                                               <div class="col-xs-12 col-md-6">
                                                   <div class='form-group{{ $errors->has("bill_cycle") ? ' has-error' : '' }}'>
                                                       {!! Form::label("bill_cycle", trans('suscriptions::features.form.bill_cycle.title')) !!}
                                                       <select class="form-control">
                                                           <option>{{trans('suscriptions::types.type selection')}}</option>
                                                           <option value="week">{{ trans('suscriptions::plans.form.bill_cycle.week')}}</option>
                                                           <option value="month">{{trans('suscriptions::plans.form.bill_cycle.month')}}</option>
                                                           <option value="year">{{trans('suscriptions::plans.form.bill_cycle.year')}}</option>
                                                       </select>
                                                       {!! $errors->first("bill_cycle", '<span class="help-block">:message</span>') !!}
                                                   </div>

                                               </div>
                                           </div>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <p>
                                                       {{trans('suscriptions::plans.form.Bill cycle will be every 2 Months')}}
                                                    </p>
                                                </div>


                                            </div>
                                            <div class='form-group{{ $errors->has("trial_period") ? ' has-error' : '' }}'>
                                                {!! Form::label("trial_period", trans('suscriptions::plans.form.trial_period')) !!}
                                                {!! Form::number("trial_period", old("trial_period"), ['class' => 'form-control', 'placeholder' => trans('suscriptions::plans.form.trial_period')]) !!}
                                                {!! $errors->first("trial_period", '<span class="help-block">:message</span>') !!}
                                                <div class="text-muted text-sm">
                                                    {{trans('suscriptions::plans.forms.help-trial-period')}}
                                                </div>
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
                                    <div class='form-group{{ $errors->has("display_order") ? ' has-error' : '' }}'>
                                        {!! Form::label("display_order", trans('suscriptions::plans.form.display_order')) !!}
                                        {!! Form::number("display_order", old("display_order"), ['class' => 'form-control', 'placeholder' => trans('suscriptions::plans.form.display_order')]) !!}
                                        {!! $errors->first("display_order", '<span class="help-block">:message</span>') !!}
                                    </div>
                                    <div class='form-group{{ $errors->has("recommendation") ? ' has-error' : '' }}'>
                                        <label class="checkbox-inline" for="{{trans('suscriptions::plans.forms.recommendation')}}">
                                            <input type="checkbox" id="recommendation" name="recommendation" value="true" >
                                            {{trans('suscriptions::plans.form.recommendation')}}
                                        </label>
                                    </div>
                                    <div class='form-group{{ $errors->has("free") ? ' has-error' : '' }}'>
                                        <label class="checkbox-inline" for="{{trans('suscriptions::plans.forms.free')}}">
                                            <input type="checkbox" id="free" name="free" value="true" >
                                            {{trans('suscriptions::plans.form.free')}}
                                        </label>
                                    </div>
                                    <div class='form-group{{ $errors->has("visible") ? ' has-error' : '' }}'>
                                        <label class="checkbox-inline" for="{{trans('suscriptions::plans.forms.visible')}}">
                                            <input type="checkbox" id="visible" name="visible" value="true" checked>
                                            {{trans('suscriptions::plans.form.visible')}}
                                        </label>
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
                                @include('partials.form-tab-headers')
                                <div class="tab-content">
                                    @include('suscriptions::admin.plans.partials.create-features-fields')
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
