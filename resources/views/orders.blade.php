<x-layout>
    <x-slot name="sps">
        <div class="card_admin">
            @foreach($zaki as $item)
            <div class="card" style="width: 18rem;margin-left:5%;margin-top:2%;">
  <div class="card-body">
    <h5 class="card-title">{{$item->id_orig}}</h5>
    @php
            $or = explode(';',$item->zak);
            foreach($or as $print){
                $word = str_replace(',','',$print);

                $char = strpos($word,'Количество');
                $quan = substr($word,$char);

                $point = strpos($word,'.');
                $prod = substr($word,0,$point);
                echo '<p>'.$prod.'</br>'.$quan.'</p>';
            }
    @endphp
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><strong>Адрес доставки</strong>: {{$item->addr}} </li>
    <li class="list-group-item"><strong>Телефон клиента</strong>: {{$item->numbr}}</li>
    <li class="list-group-item"><strong>Стоимость</strong>: {{$item->summ}} руб.</li>
    <li class="list-group-item"><strong>Доставщик</strong>: {{$item->dlvr}}</li>
    <li class="list-group-item"><strong>Создан</strong>: {{$item->created_at}}</li>
  </ul>
    <div class="links">
      @if($item->status == 'Новый')
      <a href="/stat/{{$item->created_at}}" class="btn btn-dark">Подтвердить</a>
      @elseif($item->status == 'Подтвержден')
      <a href="/gets/{{$item->created_at}}" class="btn btn-dark">Доставлен</a>
      @elseif($item->status == 'Доставлен')
      @endif
      <a href="/del/{{$item->created_at}}" class="btn btn-dark">Удалить</a>
    </div>
</div>
            @endforeach
        </div>
    </x-slot>
</x-layout>