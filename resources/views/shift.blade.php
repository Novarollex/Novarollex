<x-layout>
    <x-slot name="sps">
            <form action="/shift_obr" method="POST" style="border:none;margin-left:32%;margin-top:2%;">
                @csrf
            <div class="container deliv">
                <div class="row row-cols-2">
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
                        <label for="birth" class="form-label">Дата рождения</label>
                        <input type="date" class="form-control" id="birth" name="birth" required>
                    </div>
                    <div class="mb-3">
                        <label for="exp" class="form-label">Опыт работы</label>
                        <input type="text" class="form-control" id="exp" name="exp" required minlength="4" maxlength="100">
                    </div>
                    <div class="mb-3">
                        <label for="adrs" class="form-label">Адрес</label>
                        <input type="text" class="form-control" id="addr" name="addr" required>
                    </div>
                    <div class="mb-3">
                        <label for="zp" class="form-label">Желаемая заработная плата</label>
                        <input type="number" class="form-control" id="zp" name="zp" required>
                    </div>
                    <button type="submit" class="btn btn-dark" style="width:223px;margin-left:2.5%;">Отправить</button>
                </div>
            </div>
        </form>
    </x-slot>
</x-layout>