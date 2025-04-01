<div class="container">
    <h2>Edit product</h2>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="store_id" class="form-label">store_id</label>
            <input type="text" class="form-control" name="store_id" value="{{old("store_id", $product["store_id"])}}">
            @error("store_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" class="form-control" name="name" value="{{old("name", $product["name"])}}">
            @error("name")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>