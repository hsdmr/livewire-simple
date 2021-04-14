<?php

namespace App\Http\Livewire;

use App\Models\Category as ModelsCategory;
use Livewire\Component;

class Category extends Component
{
    public $categoryId = 0;
    public $categoryTitle;
    public $categories;

    public function resetInputs(){
        $this->categoryId = 0;
        $this->categoryTitle = '';
    }

    public function submit(){
        if($this->categoryId==0){
            $category = ModelsCategory::create([
                'title' => $this->categoryTitle,
            ]);
        }
        else{
            $category = ModelsCategory::find($this->categoryId);
            $category->update([
                'title' => $this->categoryTitle,
            ]);
        }
        $this->resetInputs();
    }

    public function edit($id){
        $this->categoryTitle = ModelsCategory::find($id)->title;
        $this->categoryId = $id;
    }

    public function delete($id){
        ModelsCategory::find($id)->delete();
    }

    public function render()
    {
        $this->categories = ModelsCategory::all();
        return view('livewire.category');
    }
}
