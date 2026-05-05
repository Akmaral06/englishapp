<form action="{{ route('password.email') }}" method="POST">
    @csrf
    <input type="email" name="email" placeholder="Введите ваш Email" required>
    <button type="submit">Отправить ссылку для сброса</button>
</form>