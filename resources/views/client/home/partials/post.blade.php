@foreach ($posts as $post)
    <li>
        <a href="{{ route('client-post.show', $post->slug) }}" class="post-thumb">
            <img style="width:263px;height:176px" src="{{ asset('storage/photos/19/post/' . $post->image) }}"
                alt="" />
        </a>
        <div class="more-info">
            <a href="" class="post-title">{{ $post->title }}</a>
            <div class="post-published">
                <a href="" class="post-author">{{ $post->user->fullname }}</a>
                <span class="post-date">{{ $post->formatted_created_at }}</span>
            </div>
            <p class="post-excerpt">
                {{ strip_tags(html_entity_decode($post->content)) }}
            </p>
        </div>
    </li>
@endforeach
