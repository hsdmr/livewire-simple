<?php

namespace App\Http\Livewire;

use App\Models\CategoryPosts;
use App\Models\Category;
use App\Models\Posts as ModelsPosts;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Post extends Component
{
    public $posts;
    public $postId;
    public $postTitle;
    public $postCategories = [];
    public $postContent;
    public $postOrder;
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
                $CategoryPosts = CategoryPosts::create([
                    'category_id' => $categoryId,
                    'posts_id' => $post->id,
                ]);
            }
        }
        else{
            $post = ModelsPosts::find($this->postId);
            $post->update([
                'title' => $this->postTitle,
                'content' => $this->postContent,
                'order' => $this->postOrder,
            ]);
            $categories = CategoryPosts::where('posts_id','=',$post->id)->get();
            foreach($categories as $category){
                $category->delete();
            }
            foreach($this->postCategories as $categoryId){
                $CategoryPosts = CategoryPosts::create([
                    'category_id' => $categoryId,
                    'posts_id' => $post->id,
                ]);
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
        foreach(CategoryPosts::where('posts_id','=',$id)->get() as $postcategory){
            array_push($this->postCategories,$postcategory->category_id);
        }
    }

    public function delete($id){
        ModelsPosts::find($id)->delete();
        $categories = CategoryPosts::where('posts_id','=',$id)->get();
        foreach($categories as $category){
            $category->delete();
        }
    }

    public function render()
    {
        $this->categories = Category::all();
        $this->posts = ModelsPosts::orderBy('order','asc')->get();
        return view('livewire.post');
    }
}
