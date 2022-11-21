@extends('template.index_post')

@section('title')

  {{ $post->title }}
  
@endsection

@section('content')
<!-- PORTFOLIO -->

<div id="main-container-image">

<div class="title-item">
	<div class="title-icon"></div>
	<div class="title-text">{{ $post->title }} </div>
	<div class="title-text-2">{{ $post->created_at->format('M d, Y') }} by {{ $post->author->first_name }}</div>
</div>


<div class="work">
	<figure class="white">
			 <img src="{{ asset('img/' . $post->image) }}" alt="" />

						</figure>

<div class="wrapper-text-description">


	<div class="wrapper-file">
		<div class="icon-file"><img src="{{ asset('storage/' . $post->categorie->icone) }}" alt="" width="21" height="21"/></div>
		<div class="text-file">{{ $post->categorie->name }}</div>
	</div>

	<div class="wrapper-weight">
		<div class="icon-weight"><img src="{{ asset('img/icon-weight.svg') }}" alt="" width="20" height="23"/></div>
		<div class="text-weight">{{ $post->size }} Mo</div>
	</div>

	<div class="wrapper-desc">
		<div class="icon-desc"><img src="{{ asset('img/icon-desc.svg') }}" alt="" width="24" height="24"/></div>
		<div class="text-desc">{{ $post->content }} </div>
	</div>

	<div class="wrapper-download">
		<div class="icon-download"><img src="{{ asset('img/icon-download.svg') }}" alt="" width="19" height="26"/></div>
		<div class="text-download"><a href="{{ asset('doc/doc_tech.pdf') }}"><b>Download</b></a></div>
	</div>

	<div class="wrapper-morefrom">
		<div class="text-morefrom">More from {{ $post->categorie->name }}</div>
		
		<!-- Affiche 4 post aleatoire et n'affiche pas le post sur lequel on se trouve -->
		<?php $recent_post = $post->categorie_id; ?>
            <?php $ressource_recent = $post->id; ?>
                @include('posts._recent', 
				['post' => \App\Models\Post::where(function ($query) use ($recent_post, $ressource_recent) 
				{
                $query->where('categorie_id', '=', $recent_post)->where('id', '!=', $ressource_recent);
                })->orderBy(DB::raw('RAND()'))->take(4)->get()
                ])
                    
	</div>
	

</div>

		<div class="post-reply">
			<div id="title-post-send">
				<hr/><h2>Your comments</h2>
			</div>


	</div>

	<div class="post-reply">
	@foreach($post -> commentaires as $commentaire)
		<div class="image-reply-post"></div>
		
		<div class="name-reply-post">{{ $commentaire->pseudo}}</div>
		<div class="text-reply-post">{{ $commentaire->content}}</div>
		@endforeach
	</div>



	<div class="post-send">
		<div id="main-post-send">
			<div id="title-post-send">Add your comment</div>
			<form id="contact" method="post" action="/onclickprod/formsubmit_op.asp">
				<fieldset>
					<p><textarea id="message" name="message" maxlength="500" placeholder="Votre Message" tabindex="5" cols="30" rows="4"></textarea></p>
				</fieldset>
				<div style="text-align:center;"><input type="submit" name="envoi" value="Envoyer" /></div>
			  </form>
		</div>
	</div>
</div>
</div>
</div>
@endsection