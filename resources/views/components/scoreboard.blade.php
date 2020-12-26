<div class="p-4 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
    @can('view subscribers') <x-subscribers-score-card /> @endcan
    @can('view users') <x-users-score-card /> @endcan
    @can('view visitors') <x-visitors-score-card /> @endcan
</div>
