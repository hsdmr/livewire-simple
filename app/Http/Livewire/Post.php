<?php

namespace App\Http\Livewire;

use App\Models\CategoryPosts;
use App\Models\Category;
use App\Models\Posts as ModelsPosts;
use Livewire\Component;

class Post extends Component
{
    public $posts;
    public $postId;
    public $postTitle;
    public $postCategories = [];
    public $postContent;
    public $postOrder = 0;
    public $categories;

    public function resetInputs(){
        $this->postId = 0;
        $this->postTitle = '';
        $this->postCategories = [];
        $this->postContent = '';
        $this->postOrder = 0;
    }

    public function submit(){
        if($this->postId==0){
            $post = ModelsPosts::create([
                'title' => $this->postTitle,
                'content' => $this->postContent,
                'order' => $this->postOrder,
            ]);
            foreach($this->postCategories as $categoryId){
                $post->categories()->attach($categoryId);
            }
        }
        else{
            $post = ModelsPosts::find($this->postId);
            $post->update([
                'title' => $this->postTitle,
                'content' => $this->postContent,
                'order' => $this->postOrder,
            ]);
            $post->categories()->detach();
            foreach($this->postCategories as $categoryId){
                $post->categories()->attach($categoryId);
            }
        }
        $this->resetInputs();
    }

    public function edit($id){
        $post = ModelsPosts::find($id);
        $this->postId = $id;
        $this->postTitle = $post->title;
        $this->postContent = $post->content;
        $this->postOrder = $post->order;
        $this->postCategories = [];
        $postCategories = [];
        foreach($post->categories as $pc){
            array_push($postCategories,$pc->id);
        }
    }

    public function delete($id){
        $post = ModelsPosts::find($id);
        $post->categories()->detach();
        $post->delete();
    }

    public function render()
    {
        $this->categories = Category::all();
        $this->posts = ModelsPosts::orderBy('order','asc')->get();
        return view('livewire.post');
    }
}
