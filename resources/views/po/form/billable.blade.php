<section class="section">
  <div class="container">
<h1 class="box-title">
  <span class="icon is-medium"><i class="far fa-money-bill fa-lg"></i></span>
  <span>Billable <span class="tag is-success has-text-weight-bold">New</span></span>
</h1>
{{ Form::open(['url' => '/po']) }}
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
  <div class="column is-one-quarter">
    {{ Form::label('user_id', 'Employee', ['class' => 'label']) }}
    {{ Form::select('user_id', $employees, '', ['placeholder' => 'Select Employee']) }}
  </div>
  <div class="column is-one-quarter">
    {{ Form::label('client_id', 'Client', ['class' => 'label']) }}
    {{ Form::select('client_id', $clients, '', ['placeholder' => 'Select Client']) }}
  </div>
  <div class="column is-one-quarter">
    {{ Form::label('begin_date', 'Begin Date', ['class' => 'label']) }}
    {{ Form::text('begin_date', '', ['placeholder' => 'Begin Date', 'class' => 'input']) }}
  </div>
  <div class="column is-one-quarter">
    {{ Form::label('end_date', 'End Date', ['class' => 'label']) }}
    {{ Form::text('end_date', '', ['placeholder' => 'End Date', 'class' => 'input']) }}
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
