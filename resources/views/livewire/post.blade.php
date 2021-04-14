<div class="main-div" style="margin-top: 80px">
    <form wire:submit.prevent="submit" class="mb-4">
        <input wire:model.lazy="postId" type="hidden">
        <div class="row mx-0">
            <div class="col-10 px-0">
                <input wire:model.lazy="postTitle" type="text" class="form-control my-1" placeholder="{{__('main.Title')}}">
            </div>
            <div class="col-2 px-0">
                <input wire:model.lazy="postOrder" type="number" class="form-control my-1" placeholder="{{__('main.Order')}}" value="{{$postOrder}}">
            </div>
        </div>
        <div style="max-height: 100px; overflow: auto; text-align:left">
            @foreach ($categories as $category)
            <label class="w-100"><input type="checkbox" wire:model="postCategories" value="{{$category->id}}"> {{$category->title}}</label>
            @endforeach
        </div>
        <textarea wire:model.lazy="postContent" cols="30" rows="5" class="form-control my-1" placeholder="{{__('main.Content')}}"></textarea>
        <button class="btn btn-success w-100" type="submit">{{__('main.Save')}}</button>
    </form>

    @foreach ($posts as $post)
        <div class="card my-1">
            <div class="row m-0">
                <div class="col-10 p-0">{{$post->title}}</div>
                <div class="col p-0 btn btn-info" wire:click="edit({{$post->id}})"><i class="fas fa-pencil-alt"></i></div>
                <div class="col p-0 btn btn-danger" wire:click="delete({{$post->id}})">&times;</div>
            </div>
        </div>
    @endforeach
</div>
