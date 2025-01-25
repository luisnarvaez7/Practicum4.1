<div class="mt-4">
    @if ($items instanceof \Illuminate\Pagination\LengthAwarePaginator || $items instanceof \Illuminate\Pagination\Paginator)
        {{ $items->links() }}
    @endif
</div>
