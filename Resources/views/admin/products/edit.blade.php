@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('suscriptions::products.title.edit product') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.suscriptions.product.index') }}">{{ trans('suscriptions::products.title.products') }}</a></li>
        <li class="active">{{ trans('suscriptions::products.title.edit product') }}</li>
    </ol>
@stop

@section('content')
    {!! Form::open(['route' => ['admin.suscriptions.product.update', $product->id], 'method' => 'put']) !!}
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="nav-tabs-custom">
                                @include('partials.form-tab-headers', ['fields' => ['name']])
                                <div class="tab-content">
                                    @php $i = 0; @endphp
                                    @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                                        @php $i++; @endphp
                                        <div class="tab-pane {{ App::getLocale() == $locale ? 'active' : '' }}"
                                             id="tab_{{ $i }}">
                                            @include('suscriptions::admin.products.partials.edit-fields', ['lang' => $locale])
                                        </div>
                                    @endforeach
                                </div>
                            </div> {{-- end nav-tabs-custom --}}
                        </div>
                    </div>
                </div>
            </div>
          {{-- @if (config('suscriptions::config.products.partials.normal.create') !== [])
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Adicional</h3>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                class="fa fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="nav-tabs-custom">
                                    <div class="tab-content">
                                        @foreach (config('asgard.suscriptions.config.products.partials.normal.create') as $partial)
                                            @include($partial)
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif--}}
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">{{trans('suscriptions::products.form.publish')}}:</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="nav-tabs-custom">
                                <div class="tab-content">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                {!! Form::label("status", trans('suscriptions::products.form.Product Status:')) !!}
                                                <select name="status" id="status" class="form-control">
                                                    @foreach ($statuses as $id => $status)
                                                        <option value="{{ $id }}" {{ old('status', 0) == $id ? 'selected' : '' }}>{{ $status }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class='form-group{{ $errors->has("create_at") ? ' has-error' : '' }}'>
                                                {!! Form::label("{[create_at]", trans('suscriptions::products.form.create')) !!}
                                                <input type="datetime-local" name="create_at" id="create_at"
                                                       {{old("create_at")}}, class='form-control slug'/>
                                                {!! $errors->first("create_at", '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 text-right">
                                    <button type="submit"
                                            class="btn btn-primary btn-flat">{{ trans('suscriptions::products.button.edit product') }}</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">{{trans('suscriptions::products.form.Featured Image')}}</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="nav-tabs-custom">
                                <div class="tab-content">
                                    @mediaSingle('thumbnail',$product)
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">{{trans('suscriptions::products.form.autor')}}</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="nav-tabs-custom">
                                <div class="tab-content">
                                    <select name="user_id" id="user" class="form-control">
                                        @foreach ($users as $user)
                                            <option value="{{$user->id }}" {{$user->id == $currentUser->id ? 'selected' : ''}}>{{$user->present()->fullname()}}
                                                - ({{$user->email}})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
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
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'b', route: "<?= route('admin.suscriptions.product.index') ?>" }
                ]
            });
        });
    </script>
    <script>
        $( document ).ready(function() {
            $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
        });
    </script>
@endpush
