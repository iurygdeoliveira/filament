<div class="container">
    <h2>Create stores</h2>
    <form action="{{ route('stores.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" class="form-control" name="name" value="{{old("name")}}">
            @error("name")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="logo" class="form-label">logo</label>
            <input type="text" class="form-control" name="logo" value="{{old("logo")}}">
            @error("logo")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="slug" class="form-label">slug</label>
            <input type="text" class="form-control" name="slug" value="{{old("slug")}}">
            @error("slug")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="about" class="form-label">about</label>
            <input type="text" class="form-control" name="about" value="{{old("about")}}">
            @error("about")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="phone" class="form-label">phone</label>
            <input type="text" class="form-control" name="phone" value="{{old("phone")}}">
            @error("phone")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>