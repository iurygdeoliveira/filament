<div class="container">
<h2>products List</h2>
<a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Create products</a>
<table class="table">
    <thead>
        <tr><th>store_id</th><th>name</th></tr>
    </thead>
    <tbody>
        @foreach ($products as $item)
                <tr>
                    <td>{{$item->store_id}}</td>
<td>{{$item->name}}</td>
<td>
                        <a href="{{ route('products.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('products.destroy', $item->id) }}" method="POST" style="display:inline;">
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