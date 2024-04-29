<x-layout>
    <x-slot name="sps">
    <form action="/inpt" method="POST">
        @csrf
  <div class="mb-3">
    <label for="login" class="form-label">Логин</label>
    <input type="text" class="form-control" id="login" name="login" required>
  </div>
  <div class="mb-3">
    <label for="pass" class="form-label">Пароль</label>
    <input type="password" class="form-control" id="pass" name="pass" required>
  </div>
  <button type="submit" class="btn btn-dark">Отправить</button>
</form>
    </x-slot>
</x-layout>