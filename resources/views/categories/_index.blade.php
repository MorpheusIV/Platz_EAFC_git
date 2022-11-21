

@foreach($categories as $category)

<a href="{{route('categories.show', ['category' => $category->id, 'slug' => Illuminate\Support\Str::slug($category->name)])}}">
  <div id="bouton-ai">
    <img src="{{ asset('storage/' . $category->icone) }}" alt="{{$category->name}}" title="{{$category->name}}" height="28" width="28">
  </div>
</a>

@endforeach