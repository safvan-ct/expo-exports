<div class="row g-3 align-items-center">
    <input type="hidden" name="id" value="{{ $data->id ?? 0 }}">

    <div class="col-5 form-floating mb-2">
        <select class="form-select" name="category_id" id="category_id">
            <option value="">Select Category</option>
            @foreach ($categories as $item)
                <option value="{{ $item->id }}" {{ $data?->category_id == $item->id ? 'selected' : '' }}>
                    {{ $item->name }}</option>
            @endforeach
        </select>
        <label for="category_id">Category</label>
    </div>

    <div class="col-7">
        <x-admin.input name="name" label="Product Name" value="{{ $data?->name ?? '' }}" />
    </div>

    <div class="col-12 form-floating mb-2">
        <textarea class="form-control" name="description" id="description" placeholder="Description" rows="10"
            style="min-height: 130px">{{ $data?->description ?? '' }}</textarea>
        <label for="description">Description</label>
    </div>
    <hr>

    <div class="col-12">
        <x-admin.input type="file" name="image" label="Image (320x200)" accept="image/*" />

        <img id="imagePreview" src="{{ isset($data?->image_src) ? $data?->image_src : '' }}"
            class="img-thumbnail d-none" style="max-width: 120px;">
    </div>
</div>
