<x-layout>
    <x-slot name="sps">
    <form action="/result" method="POST">
        @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Имя</label>
    <input type="text" class="form-control" id="name" name="name" required minlength="4" maxlength="25" pattern="^[A-Za-zА-Яа-яЁё]+$">
  </div>
  <div class="mb-3">
    <label for="surn" class="form-label">Фамилия</label>
    <input type="text" class="form-control" id="surn" name="surn" required minlength="4" maxlength="30" pattern="^[A-Za-zА-Яа-яЁё\S]+$">
  </div>
  <div class="mb-3">
    <label for="patr" class="form-label">Отчество</label>
    <input type="text" class="form-control" id="patr" name="patron" required minlength="4" maxlength="25" pattern="^[A-Za-zА-Яа-яЁё\S]+$">
  </div>
  <div class="mb-3">
    <label for="tel" class="form-label">Телефон</label>
    <input type="text" class="form-control" id="tel" name="tel" required pattern="8[0-9]{3}[0-9]{3}[0-9]{2}[0-9]{2}" placeholder="7 (950) (***) (**)">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Почта</label>
    <input type="email" class="form-control" id="email" name="email" required pattern="(\w+).?(\w+)@(\w+).[a-z]{1,5}">
  </div>
  <div class="mb-3">
    <label for="login" class="form-label">Логин</label>
    <input type="text" class="form-control" id="login" name="login" required minlength="4" maxlength="25" pattern="^[A-Za-zА-ЯЁа-я0-9\S]+$">
  </div>
  <div class="mb-3">
    <label for="adrs" class="form-label">Адрес</label>
    <input type="text" class="form-control" id="adrs" name="addr" required>
  </div>
  <div class="mb-3">
    <label for="pass" class="form-label">Пароль</label>
    <input type="password" class="form-control" id="pass" name="pass" required minlength="4" maxlength="25">
  </div>
  <div class="mb-3">
    <label for="re_pass" class="form-label">Пароль</label>
    <input type="password" class="form-control" id="re_pass" name="re_pass" required>
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
    <label class="form-check-label" for="exampleCheck1">Согласие с условиями обработки</label>
  </div>
  <a href="/shift" style="color:black;">Оставить заявку для вакансии "Доставщик"</a>
  <button type="submit" class="btn btn-dark">Отправить</button>
</form>
    </x-slot>
</x-layout>