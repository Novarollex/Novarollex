<x-layout>
    <x-slot name="sps">

        <img src="/Images/user-logo.png" alt="" width="auto" height="200" style="margin-left:44%;margin-top:2%">
        <div class="container text-center">
        <div class="row">
        @foreach($user as $item)
            <div class="row row_f">
                <div class="col-3"><p><strong>Имя</strong>: {{$item->name}}</p></div>
                <div class="col-3"><p><strong>Отчество</strong>: {{$item->patron}}</p></div>
                <div class="col-3"><p><strong>Фамилия</strong>: {{$item->surn}}</p></div>
                <div class="col-3"><p><strong>Адрес</strong>: {{$item->addr}}</p></div>
            </div>

            <div class="row">
                <div class="col-3"><p><strong>Почта</strong>: {{$item->email}}</p></div>
                <div class="col-3"><p><strong>Телефон</strong>: {{$item->tel}}</p></div>
                <div class="col-3"><p><strong>Логин</strong>: {{$item->login}}</p></div>
                <div class="col-3"><p><strong>Аккаут создан</strong>: {{$item->created_at}}</p></div>
            </div>
        @endforeach
        </div>
        </div>
        <a href="/red_lk/{{session()->get('user')}}" class="btn btn-dark redaction">Редактировать профиль</a>
    </x-slot>
</x-layout>