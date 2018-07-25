@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('suscriptions::products.title.products') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i
                        class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('suscriptions::products.title.products') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.suscriptions.product.create') }}" class="btn btn-primary btn-flat"
                       style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('suscriptions::products.button.create product') }}
                    </a>
                </div>
            </div>
            <div class="box box-primary">
                <!-- /.box-header -->
                <div class="box-body">

                    @if(count($products))
                        @foreach($products as $index =>$product)
                            <div class="col-xs-12 col-md-4">
                                <div class="box">
                                    <div class="box-header with-border hidden">
                                        <h3 class="box-title hidden"></h3>

                                        <div class="box-tools pull-right">

                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <div style="font-size: medium" class="">
                                            <div class="item-actions">
                                                <div class="btn-group pull-right">
                                                    <button type="button" class="btn btn-sm btn-default dropdown-toggle"
                                                            style="padding: 2px 8px 0 8px;" data-toggle="dropdown"
                                                            aria-expanded="false"><i class="fa fa-ellipsis-v"
                                                                                     style="font-size: 1.2em;"></i>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li>
                                                            <a target="_self"
                                                               href="{{ route('admin.suscriptions.product.edit', [$product->id]) }}"
                                                               class="">
                                                                <i class=""></i> <i
                                                                        class="fa fa-fw fa-pencil"></i> {{trans('suscription::common.button.edit')}}
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a target="_self"
                                                               href="{{ route('admin.suscriptions.product.destroy', [$product->id]) }}"
                                                               class=" ladda-button" data-action="delete"
                                                               data-page_action="site_reload" data-style="expand-right"><span
                                                                        class="ladda-label">
                            <i class=""></i> <i class="fa fa-fw fa-remove"></i> {{trans('suscription::common.button.delete')}}
                        </span><span class="ladda-spinner"></span></a>
                                                        </li>
                                                        <li>
                                                            <a target="_self"
                                                               href="{{ route('admin.suscriptions.feature.index', [$product->id]) }}"
                                                               class="">
                                                                <i class=""></i> <i
                                                                        class="fa fa-fw fa-star"></i> {{trans('suscription::features.plural')}}
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a target="_self"
                                                               href="{{ route('admin.suscriptions.plan.index', [$product->id]) }}"
                                                               class="">
                                                                <i class=""></i> <i
                                                                        class="fa fa-fw fa-puzzle-piece"></i> {{trans('suscription::plans.plural')}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <ul class="list-inline">
                                                <li style="padding-right:0;">
                                                    <a href="{{ route('admin.suscriptions.plan.index', [$product->id]) }}">
                                                        <span class="label label-info p-r-10 p-l-10 p-t-5 p-b-5"><i
                                                                    class="fa fa-fw fa-puzzle-piece"></i>  4 Plans </span></a>
                                                </li>
                                                <li style="padding-right:0;">
                                                    <a href="{{ route('admin.suscriptions.feature.index', [$product->id]) }}"><span
                                                                class="label label-primary p-r-10 p-l-10 p-t-5 p-b-5"><i
                                                                    class="fa fa-fw fa-star"></i>6 Features </span></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="m-b-20 text-center">
                                            <img class="img-responsive" style="display: inline;" width="150"
                                                 src="{{$product->thumbnail->path}}"
                                                 alt="Product Image">
                                        </div>

                                        <h3 class="text-center">{{$product->name}}</h3>
                                        <p>

                                            <small class="text-muted">Status:</small>
                                            <b><span class="label {{ $product->present()->statusLabelClass}}">
                                        {{ $product->present()->status}}
                                    </span></b>
                                        </p>

                                        <p>
                                            <small class="text-muted">Created at:</small>
                                            {{formatDate($product->created_at)}}
                                        </p>
                                        <p>
                                            <small class="text-muted">Updated at:</small>
                                            {{formatDate($product->updated_at)}}
                                        </p>
                                        <p>
                                            <small class="text-muted">Description:</small>
                                            <br>
                                            {!!$product->description!!}
                                        </p>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer hidden"></div>
                                    <!-- /.box-footer-->
                                </div>
                            </div>

                        @endforeach
                        <nav aria-label="Page navigation example">
                            {{$products->links()}}
                        </nav>
                    @else
                        <div class="alert alert-info" role="alert">
                            {{trans('suscriptions::products.no found')}}
                        </div>
                    @endif

                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
    @include('core::partials.delete-modal')
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('suscriptions::products.title.create product') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).keypressAction({
                actions: [
                    {key: 'c', route: "<?= route('admin.suscriptions.product.create') ?>"}
                ]
            });
        });
    </script>
    <?php $locale = locale(); ?>
    <script type="text/javascript">
        $(function () {
            $('.data-table').dataTable({
                "paginate": true,
                "lengthChange": true,
                "filter": true,
                "sort": true,
                "info": true,
                "autoWidth": true,
                "order": [[0, "desc"]],
                "language": {
                    "url": '<?php echo Module::asset("core:js/vendor/datatables/{$locale}.json") ?>'
                }
            });
        });
    </script>
@endpush
