<form method="POST" action="{{ url('user/compare/add') }}">
    @csrf
    <input type="hidden" name="library_id" value="{{ $library_id }}">
    @if($is_exist)
        <button type="submit" class="btn btn-outline-dark text-nowrap" disabled>Added</button>
    @else
        <button type="submit" class="btn btn-outline-dark text-nowrap" onclick="compare_toggle(this)">Compare +</button>
    @endif
</form>
