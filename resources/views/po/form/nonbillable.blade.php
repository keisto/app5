<section class="section">
  <div class="container">
    <h1 class="box-title">
      <span class="icon is-medium"><i class="far fa-shopping-basket fa-lg"></i></span>
      <span>Non-Billable <span class="tag is-success has-text-weight-bold">New</span></span>
    </h1>
{{ Form::open(['url' => '/po']) }}
{{ Form::hidden('type', '0', ['class' => 'input']) }}
{{-- Form::model($user, ['route' => ['user.update', $user->id]]) --}}
<div class="columns is-mobile">
  <div class="column is-one-quarter">
    {{ Form::label('vendor', 'Vendor', ['class' => 'label']) }}
    {{ Form::text('vendor', '', ['placeholder' => 'Vendor', 'class' => 'input']) }}
  </div>
  <div class="column is-three-quarters">
    {{ Form::label('description', 'Description', ['class' => 'label']) }}
    {{ Form::text('description', '', ['placeholder' => 'Description', 'class' => 'input']) }}
  </div>
</div>
<div class="columns is-mobile">
  <div class="column is-one-third">
    {{ Form::label('asset_id', 'Asset', ['class' => 'label']) }}
    {{ Form::select('asset_id', $assets, '', ['placeholder' => 'Select an Asset or Select Other']) }}
    {{-- {{ Form::text('asset_id', '', ['placeholder' => 'Asset', 'class' => 'input']) }} --}}
  </div>
  <div class="column is-one-third">
    {{ Form::label('other', 'Other', ['class' => 'label']) }}
    {{ Form::text('other', '', ['placeholder' => 'Other', 'disabled' => 'true', 'class' => 'input']) }}
  </div>
  <div class="column is-one-third">
    {{ Form::label('cost', 'Cost', ['class' => 'label']) }}
    {{ Form::text('cost', '', ['placeholder' => 'Cost', 'class' => 'input']) }}
  </div>
</div>
<nav class="level is-mobile">
  <div class="level-left">
    <div class="level-item">
       {{ Form::button('<span class="icon"><i class="fas fa-times"></i></span><span>Cancel</span>', ['class' => 'button is-light']) }}
    </div>
  </div>
  <div class="level-rigth">
    <div class="level-item">
      {{ Form::button('<span class="icon"><i class="fas fa-save"></i></span><span>Save</span>', ['type' => 'submit', 'class' => 'button is-primary is-pulled-right']) }}
    </div>
  </div>
</nav>
{{ Form::close() }}
  </div>
</section>