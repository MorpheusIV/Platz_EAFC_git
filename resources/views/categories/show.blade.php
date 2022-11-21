@extends('template.index')

@section('content')

<section class="work" id="list">

@foreach($category->posts as $post)

<figure class="white">
	<a href="{{ route('post.show', ['post'=>$post->id, 'slug' => \Illuminate\Support\Str::slug($post->title)]) }}">
		<img src="{{ asset('storage/' . $post->image) }}" alt=""/>
		<dl>
			<dt>{{ $post->title }}</dt>
			<dd>{!! $post->description !!}</dd>
		</dl>
		</a>
        <div id="wrapper-part-info">
            <div class="part-info-image"><img src="{{ asset('storage/' . $post->categories->icone) }}" alt="" width="28" height="28"/></div>
            <div id="part-info">{{ $post->categories->name }}</div>
		</div>
</figure>

@endforeach

</section>

@endsection