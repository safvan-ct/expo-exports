<input type="hidden" name="id" value="{{ $data->id ?? 0 }}">

<x-admin.input name="name" label="Client Name" value="{{ $data?->name ?? '' }}" />

<div class="form-floating col-12 mb-2">
    <textarea class="form-control" name="comment" id="comment" placeholder="About us" rows="15">{{ old('comment', $data['comment'] ?? null) }}</textarea>
    <label for="comment">Comment</label>
</div>

<x-admin.input name="rating" label="Rating" value="{{ $data?->rating ?? '' }}" type="number" min="1"
    max="5" />
