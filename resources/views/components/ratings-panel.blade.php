<div id="solas-ratings-panel" class="solas-alert-bg" >
    <div class="w3-display-container w3-display-middle">
        <div class="w3-card p-3 mb-3 solas-confirmation  bg-white">
            <div class="d-flex justify-content-between align-items-center">
                <div class="solas-title-3">
                    Rate Library
                </div>
                <div class="d-flex">
                    <button class="btn btn-light" onclick="hide_panel()">
                        <img src="{{ url('icons/x.png') }}" style="height:1rem" />
                    </button>
                </div>
            </div>

            <div class="mt-3 mb-1 d-flex justify-content-center">
                <!-- Star #1 -->
                <button class="btn btn-light" onclick="change_star(1)">
                    <img id="rating-star-1" src="{{ asset('icons/star.png') }}" style="height:2.5rem" />
                    <img id="rating-star-1-solid" src="{{ asset('icons/star_solid.png') }}" style="height:2.5rem" />
                </button>

                <!-- Star #2 -->
                <button class="btn btn-light" onclick="change_star(2)">
                    <img id="rating-star-2" src="{{ asset('icons/star.png') }}" style="height:2.5rem" />
                    <img id="rating-star-2-solid" src="{{ asset('icons/star_solid.png') }}" style="height:2.5rem" />
                </button>

                <!-- Star #3 -->
                <button class="btn btn-light" onclick="change_star(3)">
                    <img id="rating-star-3" src="{{ asset('icons/star.png') }}" style="height:2.5rem" />
                    <img id="rating-star-3-solid" src="{{ asset('icons/star_solid.png') }}" style="height:2.5rem" />
                </button>
            
                <!-- Star #4 -->
                <button class="btn btn-light" onclick="change_star(4)">
                    <img id="rating-star-4" src="{{ asset('icons/star.png') }}" style="height:2.5rem" />
                    <img id="rating-star-4-solid" src="{{ asset('icons/star_solid.png') }}" style="height:2.5rem" />
                </button>

                <!-- Star #5 -->
                <button class="btn btn-light" onclick="change_star(5)">
                    <img id="rating-star-5" src="{{ asset('icons/star.png') }}" style="height:2.5rem" />
                    <img id="rating-star-5-solid" src="{{ asset('icons/star_solid.png') }}" style="height:2.5rem" />
                </button>
            </div>

            <div class="text-center mb-4 fs-2 fw-light">
            (<div style="display:contents;" id="rate-value">?</div>/5)
            </div>

            <p class="card-text">
                <form method="POST" action="">
                    @csrf
                    <label for="comment" class="fs-5 fw-normal form-label">Comment (Optional)</label>
                    <textarea class="form-control mb-4" name="comment" id="comment" placeholder="e.g. This library is great!"></textarea>
                    <input type="hidden" name="library_id" value="">
                    <input type="hidden" id="rating" name="rating" value=0>
                    <input class="btn btn-primary " type="submit" value="Submit" style="width:100%">
                </form>
            </p>
        </div>
    </div>

    <script>
        window.assetUrl = '{{ asset('') }}';
    </script>
    <script src="{{ asset('js/ratings.js') }}"></script>
</div>
