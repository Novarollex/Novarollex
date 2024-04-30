<x-layout>
    <x-slot name="sps">
        <div class="comp">
            <img src="/Images/logo.png" class="logotip" alt="" width="auto" height="200" >
            <p>Кулинарное путешествие прямо к вашему столу!</p>
        </div>



        <div id="carouselExampleCaptions" class="carousel carousel-dark slide">
  <div class="carousel-inner">
    <div class="carousel-item active">
    <img src="{{asset($comms[0]['img'])}}" width="350" height="250" alt="">
        <h5>{{$comms[0]['name']}}</h5>
        <p>Цена :{{$comms[0]['upak_price']}} руб.</p>
    </div>
    @for($i = 1; $i < count($comms); $i++)
      <div class="carousel-item">
    <img src="{{asset($comms[$i]['img'])}}" width="350" height="250" alt="">
                        <h5>{{$comms[$i]['name']}}</h5>
                        <p>Цена :{{$comms[$i]['upak_price']}} руб.</p>
      </div>
    @endfor
    </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
    </x-slot>
</x-layout>