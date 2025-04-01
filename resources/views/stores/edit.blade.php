<div class="container">
    <h2>Edit store</h2>
    <form action="{{ route('stores.update', $store->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" class="form-control" name="name" value="{{old("name", $store["name"])}}">
            @error("name")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="logo" class="form-label">logo</label>
            <input type="text" class="form-control" name="logo" value="{{old("logo", $store["logo"])}}">
            @error("logo")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="slug" class="form-label">slug</label>
            <input type="text" class="form-control" name="slug" value="{{old("slug", $store["slug"])}}">
            @error("slug")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="about" class="form-label">about</label>
            <input type="text" class="form-control" name="about" value="{{old("about", $store["about"])}}">
            @error("about")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="phone" class="form-label">phone</label>
            <input type="text" class="form-control" name="phone" value="{{old("phone", $store["phone"])}}">
            @error("phone")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>