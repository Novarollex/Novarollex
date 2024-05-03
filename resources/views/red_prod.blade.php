<x-layout>
    <x-slot name="sps">
        <form action="/red_prod_res" method="POST">
          @csrf
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Название продукта</label>
    <input type="text" class="form-control" id="exampleInputPassword1" value="{{$prods->name}}" name="name">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Масса упаковки</label>
    <input type="text" class="form-control" id="exampleInputPassword1" value="{{$prods->upak_mass}}" name="upak_mass">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Тип товара</label>
    <input type="text" class="form-control" id="exampleInputPassword1" value="{{$prods->type}}" name="type">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Картинка</label>
    <input type="text" class="form-control" id="exampleInputPassword1" value="{{$prods->img}}" name="img">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Описание</label>
    <input type="text" class="form-control" id="exampleInputPassword1" value="{{$prods->descr}}" name="descr">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Стоимость за упаковку</label>
    <input type="text" class="form-control" id="exampleInputPassword1" value="{{$prods->upak_price}}" name="upak_price">
  </div>
  <button type="submit" class="btn btn-dark">Отправить</button>
        </form>
    </x-slot>
</x-layout>