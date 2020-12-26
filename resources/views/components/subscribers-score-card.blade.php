<x-score-card
    href="{{ route('subscribers.index') }}"
    bg="bg-red-100"
    fg="bg-red-700"
    score="{{ $count }}"
    caption="Subscribers"
    icon="heroicon-o-at-symbol"
/>
