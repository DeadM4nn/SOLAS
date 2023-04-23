
    @foreach($languages as $lang)
    <a class="badge solas-tag solas-bg-language text-wrap btn btn-light" style="font-size:0.7rem" href=" {{ url('language/search/'.$lang->language_id) }} ">
        {{$lang->name}}
    </a>
    @endforeach
