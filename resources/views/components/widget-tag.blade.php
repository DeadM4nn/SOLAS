    @foreach($tags as $tag)
    <a class="badge solas-tag solas-bg-category text-wrap btn btn-light" style="font-size:0.7rem" href=" {{ url('tag/search/'.$tag->tag_id) }} ">
        {{$tag->name}}
    </a>
    @endforeach
