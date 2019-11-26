<div class="post row mt-3">
        <h2>{{$post->titulo}}</h2>
    <div class="col-12">
        <div class="carousel">
             <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                 <div class="carousel-inner">
                    @foreach($post->images_url as $index => $post_image_url) <!-- Fazendo a iteração nas fotos e montando o carousel -->
                        @if($index == 0)
                          <img class="w-100 carousel-item active" class="item" src="{!! url($post_image_url->url) !!}" />
                         @else
                         <img class="w-100 carousel-item" class="item" src="{!! url($post_image_url->url) !!}" />
                        @endif
                    @endforeach
                </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                  
                </div>
            </div>
        </div>
    
    <div class="col-6 post__descriptions">
        <p style="display: inline-block; margin-right:20px;"><span style="font-weight:700;">Animal:</span>{{$post->animal}}</p>
        <p style="display: inline-block"><span style="font-weight:700;">Cidade:</span>{{$post->cidade}}</p>
        <p><span style="font-weight:700;">Descrição:</span>{{$post->descricao}}</p>
    </div>
</div>