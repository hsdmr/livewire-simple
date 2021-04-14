<div class="main-div">
    <div class="max-330 row header">
        <div class="col-10 text-center btn">{{__('main.You can select a category or search.')}}</div>
        <div class="col-2 btn" wire:click="logout"><i class="fas fa-power-off"></i></div>
        <div class="col-6">
            <select wire:model="inputSelect" class="form-control">
                <option value="0">{{__('main.All')}}</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-6"><input type="text" wire:model="inputSearch" class="form-control" placeholder="{{__('main.Search')}}"></div>
    </div>
    <div class="accordion my-2" id="accordionPosts">
        @php
            $i=1;
        @endphp
        @foreach ($posts as $post)
        <div class="accordion-item">
          <h2 class="accordion-header" id="heading{{$i}}">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$i}}" aria-expanded="true" aria-controls="collapse{{$i}}">
                {{$post->title}}
            </button>
          </h2>
          <div id="collapse{{$i}}" class="accordion-collapse collapse" aria-labelledby="heading{{$i}}" data-bs-parent="#accordionPosts">
            <div class="accordion-body">
                {!!$post->content!!}
            </div>
          </div>
        </div>
        @php
            $i++;
        @endphp
        @endforeach
      </div>

    <div class="max-330 footer">
        <p class="my-2">© 2020 – 2021</p>
    </div>
</div>
