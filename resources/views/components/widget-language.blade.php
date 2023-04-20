<div>
    @foreach($languages as $lang)
    <div class="badge solas-tag solas-bg-language text-wrap" style="font-size:0.7rem">
        {{$lang->name}}
    </div>
    @endforeach
</div>