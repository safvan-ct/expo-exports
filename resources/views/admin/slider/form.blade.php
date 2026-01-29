<input type="hidden" name="id" value="{{ $data->id ?? 0 }}">

<x-admin.input name="title" label="Title" value="{{ $data?->title ?? '' }}" />

<div class="form-floating col-12 col-md-12 mb-2">
    <textarea class="form-control" name="description" id="description" placeholder="Description" style="height: 80px">{{ old('description', $data['description'] ?? null) }}</textarea>
    <label for="description">Description</label>
</div>

<x-admin.input type="file" name="image" label="Image (1920*1080)" accept="image/*" />

<img id="imagePreview" src="{{ isset($data?->image_src) ? $data?->image_src : '' }}" class="img-thumbnail d-none"
    style="max-width: 120px;">
