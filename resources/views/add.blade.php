<x-layout>
    <x-slot name="sps">
    <form action="/main_inf" method="POST">
      @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Название</label>
    <input type="text" class="form-control" id="name" required name="name">
  </div>
  <div class="mb-3">
    <label for="upak_mass" class="form-label">Масса упаковки</label>
    <input type="text" class="form-control" id="upak_mass" required name="upak_mass">
  </div>
  <div class="mb-3">
    <label for="upak_price" class="form-label">Стоимость упаковки</label>
    <input type="text" class="form-control" id="upak_price" required name="upak_price">
  </div>
  <div class="mb-3">
    <label for="sps">Тип блюда</label>
    <select id="sps" class="form-select" required name="type">
    <option value="Кофе и чай">Кофе и чай</option>
    <option value="Десерт">Десерт</option>
    <option value="Горячее">Горячее</option>
    <option value="Суп">Суп</option>
    <option value="Рыба">Рыба</option>
    <option value="Роллы">Роллы</option>
    <option value="Хлеб">Хлеб</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="photo" class="form-label">Фото</label>
    <input type="file" class="form-control" id="photo" required name="img">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Описание</label>
    <textarea rows="3" class="form-control" id="exampleInputPassword1" cols="45" required name="descr"></textarea>
  </div>
  <div class="mb-3">
    <label for="member" class="form-label">Количество ингридиентов</label>
    <input type="text" class="form-control" name="quan" id="member" required>
	<a class="btn btn-dark"onclick = "myFunc()" style="margin-top:7%;">Вывод</a>
    <div id="container"></div>
  </div>
  <button type="submit" class="btn btn-dark">Отправить</button>
</form>
    </x-slot>
</x-layout>