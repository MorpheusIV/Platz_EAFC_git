
        <div class="image-morefrom">
          <!-- php count permet de compter le nombre d'image dans echo jusqu'a 4 -->
<?php $count = 0; ?>

@foreach($post as $post)  
      <?php $count++; ?>

        <a href="{{ route('posts.show', ['post' => $post->id, 'slug' => Illuminate\Support\Str::slug($post->title)])}}">

          <?php echo "<div class='image-morefrom-$count'>" ?>
            <img src="{{ asset('img/' . $post->image) }}" alt="" width="430" height="330">  
          </div>

        </a>

   @endforeach

</div>