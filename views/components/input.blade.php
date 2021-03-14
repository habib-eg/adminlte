<div class="form-group">
    @if (!$attributes->get('nolable'))
        <label for=""></label>
    @endif

    <input {{ $attributes }} />

</div>
