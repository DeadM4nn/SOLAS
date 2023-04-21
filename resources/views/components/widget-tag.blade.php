    @foreach($tags as $tag)
    <div class="badge solas-tag solas-bg-category text-wrap" style="font-size:0.7rem">
        {{$tag->name}}
    </div>
    @endforeach
