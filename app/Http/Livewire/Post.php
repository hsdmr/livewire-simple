<?php

namespace App\Http\Livewire;

use App\Models\CategoryPosts;
use App\Models\Category;
use App\Models\Post as ModelsPost;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Post extends Component
{
    public $posts;
    public $postId = 0;
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
            $post = ModelsPost::create([
                'title' => $this->postTitle,
                'content' => $this->postContent,
                'order' => $this->postOrder,
            ]);
            foreach($this->postCategories as $categoryId){
                $CategoryPosts = CategoryPosts::create([
                    'category_id' => $categoryId,
                    'post_id' => $post->id,
                ]);
            }
        }
        else{
            $post = ModelsPost::find($this->postId);
            $post->update([
                'title' => $this->postTitle,
                'content' => $this->postContent,
                'order' => $this->postOrder,
            ]);
            $categories = CategoryPosts::where('post_id','=',$post->id)->get();
            foreach($categories as $category){
                $category->delete();
            }
            foreach($this->postCategories as $categoryId){
                $CategoryPosts = CategoryPosts::create([
                    'category_id' => $categoryId,
                    'post_id' => $post->id,
                ]);
            }
        }
        $this->resetInputs();
    }

    public function edit($id){
        $post = ModelsPost::find($id);
        $this->postId = $id;
        $this->postTitle = $post->title;
        $this->postContent = $post->content;
        $this->postOrder = $post->order;
        $this->postCategories = [];
        foreach(CategoryPosts::where('post_id','=',$id)->get() as $postcategory){
            array_push($this->postCategories,$postcategory->category_id);
        }
    }

    public function delete($id){
        ModelsPost::find($id)->delete();
        $categories = CategoryPosts::where('post_id','=',$id)->get();
        foreach($categories as $category){
            $category->delete();
        }
    }

    public function render()
    {
        $this->categories = Category::all();
        $this->posts = ModelsPost::orderBy('order','asc')->get();
        return view('livewire.post');
    }
}
