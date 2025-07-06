@foreach($media->galleries as $gal)
    <div class="masonry-item col-lg-4 col-6" style="position: absolute; left: 0%; top: 0px;">
        <a class="thumbnail thumbnail-hover" href="{{ @$gal->image->path ?? '' }}" target="_blank">
            <div class="thumbnail-inner">
                <img class="thumbnail-img" src="{{  @$gal->image->path ?? ''  }}" alt="">
            </div>
        </a>
    </div>
@endforeach
