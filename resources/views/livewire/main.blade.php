<div class="main-div">
    <div class="max-330 row header">
        <div class="col-10 text-center btn">Kategori seçebilir veya arama yapabilirsiniz</div>
        <div class="col-2 btn" wire:click="logout"><i class="fas fa-power-off"></i></div>
        <div class="col-6">
            <select wire:model="inputSelect" class="form-control">
                <option value="0">Genel</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-6"><input type="text" wire:model="inputSearch" class="form-control" placeholder="Ara"></div>
    </div>

    @foreach ($posts as $post)
    <div class="card my-2">
        <div>{!!$post->content!!}</div>
        <b>{{$post->title}}</b>
    </div>
    @endforeach

    <div class="max-330 footer">
        <p class="my-2">© 2020 – 2021</p>
    </div>
</div>
