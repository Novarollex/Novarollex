<x-layout>
    <x-slot name="sps">
        <form action="/confirm" method="POST">
            @csrf
            <div class="mb-3">
            <label for="name">Имя</label>
            <input type="text"  class="form-control" name="name" id="name" value="{{$user['name']}}" >
            </div>
            <div class="mb-3">
            <label for="surn">Фамилия</label>
            <input type="text"  class="form-control" name="surn" id="surn" value="{{$user['surn']}}" >
            </div>
            <div class="mb-3">
            <label for="patron">Отчество</label>
            <input type="text"  class="form-control" name="patron" id="patron" value="{{$user['patron']}}" >
            </div>
            <div class="mb-3">
            <label for="tel">Телефон</label>
            <input type="text"  class="form-control" name="tel" id="tel" value="{{$user['tel']}}" >
            </div>
            <div class="mb-3">
            <label for="email">Почта</label>
            <input type="text"  class="form-control" name="email" id="email" value="{{$user['email']}}" >
            </div>
            <div class="mb-3">
            <label for="login">Логин</label>
            <input type="text"  class="form-control" name="login" id="login" value="{{$user['login']}}" >
            </div>
            <div class="mb-3">
            <label for="pass">Пароль</label>
            <input type="text"  class="form-control" name="pass" id="pass" value="{{$user['pass']}}" >
            </div>
            <div class="mb-3">
            <label for="addr">Адрес</label>
            <input type="text"  class="form-control" name="addr" id="addr" value="{{$user['addr']}}" >
            </div>
            <button type="submit" class="btn btn-dark">Подтвердить</button>
        </form>
    </x-slot>
</x-layout>