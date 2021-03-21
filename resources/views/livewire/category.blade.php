<div class="main-div" style="margin-top: 80px">
    <form wire:submit.prevent="submit" class="mb-4">
        <input wire:model.lazy="categoryId" type="hidden" value="">
        <input wire:model.lazy="categoryTitle" type="text" class="form-control my-1" value="">
        <button class="btn btn-success w-100" type="submit">Kaydet</button>
    </form>

    @foreach ($categories as $category)
        <div class="card my-1">
            <div class="row m-0">
                <div class="col-10 p-0">{{$category->title}}</div>
                <div class="col p-0 btn btn-info" wire:click="edit({{$category->id}})"><i class="fas fa-pencil-alt"></i></div>
                <div class="col p-0 btn btn-danger" wire:click="delete({{$category->id}})">&times;</div>
            </div>
        </div>
    @endforeach

</div>
