<div class="p-2">
    @if (isset($deliveries) && count($deliveries) > 0)
        @foreach ($deliveries as $delivery)
            <a class="nav-link" href="{{ route('delivery.detail', ['id' => $delivery->id]) }}">
                <div class="p-1 mt-2 card">
                    <div class="d-flex">
                        <span class="fw-semibold me-2">Orden:</span>
                        <span>{{ $delivery->id }}</span>
                    </div>
                    <div class="d-flex">
                        <span class="fw-semibold me-2">Moneda:</span>
                        <span>{{ $delivery->currency->code }}</span>
                    </div>
                    <div class="d-flex">
                        <span class="fw-semibold me-2">Monto:</span>
                        <span>{{ number_format($delivery->amount, 2, ',', '.') }}</span>
                    </div>
                    <div class="mt-1 mb-1 progress" role="progressbar" aria-label=""
                        aria-valuenow="{{ $delivery->progress }}" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar" style="width: {{ $delivery->progress }}%"></div>
                    </div>
                </div>
            </a>
        @endforeach
    @endif
</div>
