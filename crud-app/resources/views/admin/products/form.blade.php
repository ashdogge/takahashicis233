<div class="form-group">
    <label for="name">Product Name</label>
    <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $product->name) }}">
</div>

<div class="form-group">
    <label for="price">Price</label>
    <input type="text" class="form-control" name="price" id="price" value="{{ old('price', $product->price) }}">
</div>

<div class="form-group">
    <label for="description">Description</label>
    <input type="text" class="form-control" name="description" id="description"
        value="{{ old('description', $product->description) }}">
</div>

<div class="form-group">
    <label for="item_number">Item Number</label>
    <input type="number" class="form-control" name="item_number" id="item_number"
        value="{{ old('item_number', $product->item_number) }}">
</div>

<div class="form-group">
    <label for="image">Image URL</label>
    <input type="text" class="form-control" name="image" id="image" value="{{ old('image', $product->image) }}">
</div>
