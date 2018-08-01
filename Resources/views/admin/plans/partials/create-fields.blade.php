<div class="box-body">
    <div class='form-group{{ $errors->has("$lang.name") ? ' has-error' : '' }}'>
        {!! Form::label("{$lang}[name]", trans('suscriptions::features.form.name')) !!}
        {!! Form::text("{$lang}[name]", old("$lang.name"), ['class' => 'form-control', 'placeholder' => trans('suscriptions::features.form.name')]) !!}
        {!! $errors->first("$lang.name", '<span class="help-block">:message</span>') !!}
    </div>

    <div class='form-group{{ $errors->has("$lang.description") ? ' has-error' : '' }}'>
        {!! Form::label("{$lang}[description]", trans('suscriptions::features.form.description')) !!}
        {!! Form::textarea("{$lang}[description]", old("$lang.description"), ['class' => 'form-control',  'rows' => 3, 'placeholder' => trans('suscriptions::features.form.description')]) !!}
        {!! $errors->first("$lang.description", '<span class="help-block">:message</span>') !!}
    </div>



</div>
