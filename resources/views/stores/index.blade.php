<div class="container">
<h2>stores List</h2>
<a href="{{ route('stores.create') }}" class="btn btn-primary mb-3">Create stores</a>
<table class="table">
    <thead>
        <tr><th>name</th><th>logo</th><th>slug</th><th>about</th><th>phone</th></tr>
    </thead>
    <tbody>
        @foreach ($stores as $item)
                <tr>
                    <td>{{$item->name}}</td>
<td>{{$item->logo}}</td>
<td>{{$item->slug}}</td>
<td>{{$item->about}}</td>
<td>{{$item->phone}}</td>
<td>
                        <a href="{{ route('stores.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('stores.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>