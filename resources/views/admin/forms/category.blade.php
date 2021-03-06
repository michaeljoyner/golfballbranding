{!! Form::model($category, ['url' => $formAction, 'class' => 'form-horizontal']) !!}
<div class="form-group">
    <label for="name">Category name: </label>
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    <label for="description">Description: </label>
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    <button class="btn gbb-btn" type="submit">{{ $submitText }}</button>
</div>
{!! Form::close() !!}