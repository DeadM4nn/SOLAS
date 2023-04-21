<div>
    <div>
        @for($x = 0; $x < $rating; $x++)
        <img src="{{ asset('icons/star_solid.png') }}" style="height:1.2rem" />
        @endfor
        @for($x = $rating; $x < 5; $x++)
        <img src="{{ asset('icons/star.png') }}" style="height:1.2rem" />
        @endfor
    </div>
    <div class="fs-5 fw-light text-end">
        ({{ $rating }}/5)
    </div>
</div>