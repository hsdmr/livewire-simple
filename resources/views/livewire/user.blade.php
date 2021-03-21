<div class="main-div" style="margin-top: 80px">
    <form wire:submit.prevent="submit" class="mb-4">
        <input wire:model="userId" type="hidden" value="">
        <input wire:model="userName" type="text" class="form-control my-1" value="">
        <input wire:model="userPassword" type="passowrd" class="form-control my-1" value="">
        <label><input wire:model="userRole" type="radio" name="userRole" value="main"> Kullanıcı</label>
        <label><input wire:model="userRole" type="radio" name="userRole" value="admin"> Admin</label>
        <button class="btn btn-success w-100" type="submit">Kaydet</button>
    </form>

    @foreach ($users as $user)
        <div class="card my-1">
            <div class="row m-0">
                <div class="col-10 p-0">{{$user->username}}</div>
                <div class="col p-0 btn btn-info" wire:click="edit({{$user->id}})"><i class="fas fa-pencil-alt"></i></div>
                @if($user->role!='admin') <div class="col p-0 btn btn-danger" wire:click="delete({{$user->id}})">&times;</div> @endif
            </div>
        </div>
    @endforeach

</div>
