<div class="tags has-addons">
    @isset($po->client)
        <span class="tag is-link has-text-weight-bold">{{ $po->id }}</span>
    @else
        <span class="tag is-warning has-text-weight-bold">{{ $po->id }}</span>
    @endisset
    @if ($po->status == 0)
        <span class="tag is-purple has-text-weight-bold">Voided</span>
    @elseif ($po->status == 1)
        <span class="tag is-info has-text-weight-bold">Awaiting</span>
    @elseif ($po->status == 2)
        <span class="tag is-success has-text-weight-bold">Open</span>
    @elseif ($po->status == 3)
        <span class="tag is-danger has-text-weight-bold">Closed</span>
    @endif
</div>