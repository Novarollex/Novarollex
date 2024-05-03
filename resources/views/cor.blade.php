<x-layout>
    <x-slot name="sps">
        @if(!empty(session()->get('mass')))
                <div class="corzina" id="cor">
                    @foreach($all as $key => $value)
                    <li id="{{$key}}" style="display:flex;">
                        <p style="padding:10px;width:200px;">Название: {{$key}}</p>
                        <img src="{{asset($img[$key])}}" alt="" style="margin-top:3px;width:260px;height:120px;">
                        <p style="padding:10px;width:170px;margin-top:20px;">Количество: <span class="{{$key}}" value="{{$value}}">{{$value}}</span></p>
                        <p style="padding:10px;width:230px;margin-top:20px;">Стоимость: <span id="sp">{{$stoim["$key"] * $value}}</span> руб.</p>
                        <button id='{{$stoim["$key"] * $value}}' value="{{$key}}" class="link-dark delete" style="margin-top:30px;padding:none;background:none;height:20px;weight:20px;border:none;">✕</button>
                    </li>

                        <hr class="{{$key}}" style="max-width:840px;">


                    @endforeach
                <p><strong>Итоговая стоимость:</strong> <span id="stoim">{{$itog}}</span> руб.</p>
                <p><strong>Всего позиций:</strong> <span id="count">{{$count}}</span> </p>
            <a href="/clean" class="link-dark">Очистить корзину</a>
            <a href="/check" class="link-dark" >Оформить корзину</a>
            </div>
            @else

            <div class="corzina">
                <p style="text-align:center;">Ваша корзина пока пуста</p>
            </div>
    @endif

    <script>
        $( function() {
            $('.delete').click(function(){
                var val = $(this).val();

                let ml = document.getElementsByClassName(val)[0].innerText;

                //Удаление лишних элементов разметки
                var parent = document.getElementById('cor');

                let def = document.getElementsByClassName(val)[1];
                parent.removeChild(def);

                //минусовка общей стоимости
                var id = this.id;
                let st = document.getElementById('stoim').innerText;
                let quan = document.getElementById('count').innerText;
                document.getElementById('stoim').textContent = st - id;
                document.getElementById('count').textContent = quan - ml;

                //удаление li тега
                var child = document.getElementById(val);
                parent.removeChild(child);

                let itog = document.getElementById('stoim').innerText;
                if(itog == 0 ){
                    document.getElementById('cor').innerHTML = "<p style='text-align:center;'>Ваша корзина пока пуста</p>";
                }


                $.ajax({
                        url: '/del_mass/' + val,
                        method: "GET",
                        dataType: "text",
                        success: function(){
                        },
                        error: function(){
                        }

                    });
                $val = null;
            });
        });
    </script>

    </x-slot>
</x-layout>