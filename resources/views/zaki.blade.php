<x-layout>
    <x-slot name="sps">
        <div class="lk">
            <div class="order">
            @foreach($hist as $item)
                    <div class="dropdown drop_zaki">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Заказ
                        </button>
                        <ul class="dropdown-menu">
                            @foreach($item as $key => $value)
                            <p class="dropdown-item" href="#" width="10px;">
                                Id продукта: <a href="/card/{{$key}}">{{$key}}</a> Количество продукта: {{$value}} порция или порции.
                            </p>
                            @endforeach
                        </ul>
                    </div>
            @endforeach
            </div>

            <div class="infoks">
                @foreach($info as $key)
                    <div class="infa">
                    <p><strong>Создан</strong> :{{$key->created_at}}</p>
                    <p><strong>Статус</strong> :{{$key->status}}</p>
                    </div>
                    <hr style="width:430px;margin-left:-35%;">
                @endforeach
            </div>

            </div>
    </x-slot>
</x-layout>