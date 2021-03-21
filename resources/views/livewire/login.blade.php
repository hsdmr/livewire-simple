<div class="w-100 text-center">
    <div class="form-signin">
        @if (isset($message))
        <div class="alert alert-danger">{{$message}}</div>
        @endif
        <form wire:submit.prevent="login">
          <h1 class="h3 mb-3 fw-normal">Giriş Yapınız</h1>
          <label for="inputUsername" class="visually-hidden">Kullanıcı Adı</label>
          <input wire:model="inputUsername" type="text" id="inputUsername" class="form-control" placeholder="Kullanıcı Adı" required="" autofocus="">
          <label for="inputPassword" class="visually-hidden">Şifre</label>
          <input wire:model="inputPassword" type="password" id="inputPassword" class="form-control" placeholder="Şifre" required="">
          <button class="w-100 btn btn-lg btn-primary" type="submit">Giriş</button>
          <p class="mt-5 mb-3 text-muted">© 2020–2021</p>
        </form>
      </div>
</div>
