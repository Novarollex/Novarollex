<x-layout>
    <x-slot name="sps">
        <form action="/recovery_obr" method="POST">
          @csrf
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Введите логин</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="name" autocomplete="off">
  </div>
  <button class="btn btn-dark" type="submit">Отправить</button>
        </form>
    </x-slot>
</x-layout>