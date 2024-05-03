<x-layout>
    <x-slot name="sps">
      <div class="filtrs">
        <a href="/k_h">Кофе и чай</a>
        <a href="/des">Десерт</a>
        <a href="/hot">Горячее</a>
        <a href="/sup">Суп</a>
        <a href="/fish">Рыба</a>
        <a href="/rolls">Роллы</a>
        <a href="/bread">Хлеб</a>
      </div>
        <div class="cards">
        @foreach($prods as $item)
    <div class="card" style="width: 18rem; margin-top:3%; margin-right:4%;">
  <img src="{{asset($item->img)}}" class="card-img-top" alt="..." height="200" width="auto">
  <div class="card-body bobo">
    <h5 class="card-title" style="height:60px;">{{$item->name}}</h5>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Масса упаковки: {{$item->upak_mass}} гр.</li>
    <li class="list-group-item">Стоимость за упаковку: {{$item->upak_price}} руб.</li>
  </ul>
  @if(session()->get('role') == 'Пользователь')
  <div class="card-body lks">
  <button class="card-link btn btn-dark add telega" value="{{$item->id}}">Добавить в корзину</button>
  <a class="card-link btn btn-dark bs" style="margin-left:15%;" href="/card/{{$item->id}}">Перейти в описание</a>
  </div>
  @elseif(session()->get('role') == 'Доставщик') 
  <div class="card-body lks">
  <button class="card-link btn btn-dark non-user">Добавить в корзину</button>
  <a class="card-link btn btn-dark bs" style="margin-left:15%;" href="/card/{{$item->id}}">Перейти в описание</a>
  </div>
  @elseif(session()->get('admin') == 'true')
  <div class="card-body lks">
  <a class="card-link btn btn-dark" href="/red_prod/{{$item->id}}">Редактировать</a>
  <a class="card-link btn btn-dark bs" style="margin-left:15%;" href="/rem_prod/{{$item->id}}">Удалить</a>
  </div>
  @else
  <div class="card-body lks">
  <button class="card-link btn btn-dark non-auth">Добавить в корзину</button>
  <a class="card-link btn btn-dark bs" style="margin-left:15%;" href="/card/{{$item->id}}">Перейти в описание</a>
  </div>
  @endif
</div>
@endforeach

<script>
  $(function(){
    $('.non-auth').click(function() {
      alert('Для добавления товара - авторизуйтесь!');
    });
  });

  $(function(){
    $('.non-user').click(function() {
      alert('Для добавления товара - авторизуйтесь под ролью "Пользователь"');
    });
  });
  
  $(function(){
    $('.add').click(function() {
      alert('Товар добавлен в корзину!');
    });
  });
</script>
</div>
    </x-slot>
</x-layout>