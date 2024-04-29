<x-layout>
    <x-slot name="sps">
    <form action="/send" method="POST">
        @csrf
  <div class="mb-3">
    <label for="code" class="form-label">Введите код</label>
    <input type="text" class="form-control" id="code" name="code" required>
  </div>
  <input type="hidden" name="name" value="{{$name}}">
  <input type="hidden" name="surn" value="{{$surn}}">
  <input type="hidden" name="patron" value="{{$patron}}">
  <input type="hidden" name="tel" value="{{$tel}}">
  <input type="hidden" name="email" value="{{$email}}">
  <input type="hidden" name="login" value="{{$login}}">
  <input type="hidden" name="pass" value="{{$pass}}">
  <input type="hidden" name="addr" value="{{$addr}}">
  <input type="hidden" name="cod" value="{{$cod}}">

  <button type="submit" class="btn btn-dark">Отправить</button>
</form>
    </x-slot>
</x-layout>