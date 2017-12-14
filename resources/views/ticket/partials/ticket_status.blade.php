<div class="tags has-addons">
    <span class="tag is-link has-text-weight-bold">{{ $data->id }}</span>
    @if ($data->status == 0)
        <span class="tag is-danger has-text-weight-bold">Incomplete</span>
    @elseif ($data->status == 1)
        <span class="tag is-warning has-text-weight-bold">Awaiting</span>
    @elseif ($data->status == 2)
        <span class="tag is-info has-text-weight-bold">Approved</span>
    @elseif ($data->status == 3)
        <span class="tag is-success has-text-weight-bold">Invoiced</span>
    @elseif ($data->status == 5)
        <span class="tag is-purple has-text-weight-bold">Deleted</span>
    @endif
</div>