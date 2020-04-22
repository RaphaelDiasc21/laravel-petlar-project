<div class="post row mt-3 ml-0">
        <h2>{{$post->titulo}}</h2>
    <div class="col-12">
        <div class="carousel">
        <div id="carousel-{{$post->id}}" class="carousel slide" data-ride="carousel" data-interval="false">
                 <div class="carousel-inner">
                    @foreach($post->images as $index=>$post_image_url) <!-- Fazendo a iteração nas fotos e montando o carousel -->
                        @if($index == 0)
                          <img class="w-100 carousel-item active" class="item" src="https://res.cloudinary.com/dmkphpnmg/image/upload/w_400,h_400,c_scale{{$post_image_url}}" />
                         @else
                         <img class="w-100 carousel-item" class="item" src="https://res.cloudinary.com/dmkphpnmg/image/upload/w_400,h_400,c_scale{{$post_image_url}}" />
                        @endif
                    @endforeach
                </div>
                    <a class="carousel-control-prev" href="#carousel-{{$post->id}}" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#carousel-{{$post->id}}" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                  
                </div>
            </div>
        </div>
    
    <div class="col-12 post__descriptions">
    <div class="row">
            <div class="col-6 d-flex">
                <span class="mr-2" style="font-weight:700;">
                    <span class="material-icons">
                        pets
                    </span>
                </span>
                <span>{{$post->animal}}</span>
            </div>
            <div class="col-6 d-flex">
                <span class="mr-2" style="font-weight:700;">
                    <span class="material-icons">
                        location_on
                    </span>
                 </span>
                <span>{{$post->cidade}}</span>
            </div>
            <div class="col-12">
                <span style="font-weight:700;"></span>{{$post->descricao}}
            </div>
    </div>
    </div>
</div>