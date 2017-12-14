<div class="field is-grouped is-grouped-centered">
  @if ($po->status == 1)
    <p class="control">
      <a class="button is-success">
        <span class="icon is-small">
          <i class="fas fa-check"></i>
        </span>
        <span>Approve</span>
      </a>
    </p>
  @endif
  <p class="control">
    <a class="button is-info">
      <span class="icon is-small">
        <i class="fas fa-edit"></i>
      </span>
      <span>Edit</span>
    </a>
  </p>
  @if ($po->status != 0)
    {{ Form::open(['method' => 'DELETE','action' => ['PurchaseOrderController@destroy', $po->id]]) }}
    {{ Form::hidden('type', '1', ['class' => 'input']) }}
    <p class="control">
      {{ Form::button('<span class="icon is-small"><i class="fas fa-times"></i></span><span>Void</span>', ['type' => 'submit', 'class' => 'button is-dark']) }}
    </p>
    {{ Form::close() }}
  @endif
  @if ($po->status == 0)
    {{ Form::open(['method' => 'DELETE','action' => ['PurchaseOrderController@destroy', $po->id]]) }}
    {{ Form::hidden('type', '1', ['class' => 'input']) }}
    <p class="control">
      {{ Form::button('<span class="icon is-small"><i class="fas fa-times"></i></span><span>Delete</span>', ['type' => 'submit', 'class' => 'button is-danger']) }}
    </p>
    {{ Form::close() }}
  @endif
</div>
<div class="field is-grouped is-grouped-centered has-addons">
  <span class="is-size-7 has-text-grey-light ">Created: {{ $po->created_at->diffForHumans() }}</span>
</div>
