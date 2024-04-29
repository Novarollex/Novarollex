<x-layout>
    <x-slot name="sps">
    <div class="shifts">
            @foreach($all as $item)
                
                    <div class="card" style="width: 18rem; margin-top:3%; margin-right:4%;margin-left:2%;">
                        <div class="card-body">
                            <h5 class="card-title">{{$item->surn}}  {{$item->name}} {{$item->patron}}</h5>
                        </div>
                        <p class="card-text"> {{$item->exp}}</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Номер телефона</strong>: {{$item->tel}}</li>
                            <li class="list-group-item"><strong>Електронная почта</strong>: {{$item->email}}</li>
                            <li class="list-group-item"><strong>День рождения</strong>: {{$item->birth}}</li>
                            <li class="list-group-item"><strong>Ожидаемая ЗП</strong>: {{$item->zp}} руб.</li>
                        </ul>
                        <div class="card-body">
                            <a href="/Appr_pers/{{$item->id}}" class="btn btn-dark">Утвердить</a>
                            <a href="/Deny_pers/{{$item->id}}" class="btn btn-dark">Отказать</a>
                        </div>
                </div>
            
            @endforeach
            </div>
    </x-slot>
</x-layout>