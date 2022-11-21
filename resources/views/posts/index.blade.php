@extends('template.index')

@section('title')
  Free Grid Wordpress Theme
@endsection

@section('content')
<section class="work">

@foreach($posts as $post)

<figure class="white">
	<a href="{{ route('posts.show', ['post' => $post->id]) }}">
		<img src="img/{{$post->image}}" alt=""/>
		<dl>
			<dt>{{ $post->title }}</dt>
			<dd>{{ \Illuminate\Support\Str::limit($post->content, 150, $end='...') }}</dd>
		</dl>
		</a>
        <div id="wrapper-part-info">
            <div class="part-info-image"><img src="{{ asset('storage/' . $post->categorie->icone) }}" alt="" width="28" height="28"/></div>
            <div id="part-info">{{ $post->categorie->name }}</div>
		</div>
</figure>

@endforeach
					</section>

 @endsection