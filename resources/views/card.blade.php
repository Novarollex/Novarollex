<x-layout>
    <x-slot name="sps">
    <div class="card_img">
            <img src="{{asset($prods->img)}}" alt="" height="300" width="450">
        </div>
        <div class="main">
            <p><strong>Название</strong>: {{$prods->name}}</p>
            <p><strong>Стоимость за порцию</strong>:{{$prods->upak_price}} руб.</p>
            <p><strong>Грамм за порцию</strong> {{$prods->upak_mass}} г.</p>
            <p>{{$prods->descr}}</p>
        </div>
            @php
                $pr = 0;
                $fs = 0;
                $cs = 0;
                $kl = 0;
                $mas = 0;
            @endphp

            @foreach($prods->components as $item)
                @php
                        $pr += $item->protein;
                        $fs += $item->fats;
                        $cs += $item->carbs;
                        $kl += $item->kkal;
                        $mas += $item->mass;
                @endphp
            @endforeach

                @php
                        $itog = round($prods->upak_mass * 100 / $mas,2);
                        $hundred = round(100 * 100 / $mas,2);

                        $pr_por = round($pr * $itog / 100,1);
                        $fs_por = round($fs * $itog / 100,1);
                        $cs_por = round($cs * $itog / 100,1);
                        $kl_por = round($kl * $itog / 100,1);

                        $pr_hun = round($pr * $hundred / 100,1);
                        $fs_hun = round($fs * $hundred / 100,1);
                        $cs_hun = round($cs * $hundred / 100,1);
                        $kl_hun = round($kl * $hundred / 100,1);
                @endphp

            <div class="pfck">
            <p style="width:280px;text-align:center;"><strong>За порцию</strong></p>
                        <p><strong>Белки</strong>: {{$pr_por}}</p>
                        <p><strong>Жиры</strong>: {{$fs_por}}</p>
                        <p><strong>Углеводы</strong>: {{$cs_por}}</p>
                        <p><strong>Ккал</strong>: {{$kl_por}}</p>
                        <p><strong>Затраченные граммы</strong>: {{$mas}} гр.</p>

            </div>

            <div class="pfck_hun">
            <p style="width:280px;text-align:center;"><strong>За 100 грамм порции</strong></p>
                        <p><strong>Белки</strong>: {{$pr_hun}}</p>
                        <p><strong>Жиры</strong>: {{$fs_hun}}</p>
                        <p><strong>Углеводы</strong>: {{$cs_hun}}</p>
                        <p><strong>Ккал</strong>: {{$kl_hun}}</p>

            </div>

                        <div class="mname">
                            <ul>
                            <p style="width:280px;text-align:center;"><strong>Ингредиенты</strong></p>
                                <ul>
                                    @foreach($prods->components as $item)
                                    <li><p>{{$item->name}} {{$item->mass}} г.</p></li>
                                    @endforeach
                                </ul>
                            </ul>
                        </div>
    </x-slot>
</x-layout>