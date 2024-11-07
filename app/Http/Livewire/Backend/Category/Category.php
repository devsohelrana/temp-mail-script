<?php

namespace App\Http\Livewire\Backend\Category;

use App\Models\Menu;
use App\Models\Category as ModelsCategory;
use Livewire\Component;

class Category extends Component {

    public $categories, $category, $addCategory, $updateCategory;

    public function mount() {
        $this->updateCategory();
        $this->clearCategoryObject();
        $this->addCategory = false;
        $this->updateCategory = false;
    }

    public function updateCategory() {
        $this->categories = ModelsCategory::where('lang', null)->get();
    }


    public function clearAddUpdate() {
        if (isset($this->category['lang'])) {
            unset($this->category['lang']);
            $this->showUpdate(ModelsCategory::where('slug', $this->category['slug'])->where('lang', null)->first()->id);
        } else {
            $this->addCategory = false;
            $this->updateCategory = false;
            $this->clearCategoryObject();
        }
    }

    public function clearCategoryObject() {
        $this->category = [
            'title' => '',
            'content' => '',
            'slug' => '',
            'meta' => [],
            'header' => null
        ];
    }

    public function add() {
        $this->dispatchBrowserEvent('componentUpdated');
        $this->validate(
            [
                'category.title' => 'required',
                'category.content' => 'required',
                'category.slug' => 'required',
                'category.meta.*.name' => 'required',
                'category.meta.*.content' => 'required'
            ],
            [
                'category.title.required' => 'Category Title is Required',
                'category.content.required' => 'Please enter some Content for the Category',
                'category.slug.required' => 'Category Slug is Required',
                'category.meta.*.name.required' => 'Meta Tag Name is Required',
                'category.meta.*.content.required' => 'Meta Tag Content is Required'
            ]
        );
        $this->category['meta'] = serialize($this->category['meta']);
        //$this->createMenu();
        ModelsCategory::create($this->category);
        $this->emit('saved');
        $this->updateCategory();
        $this->clearAddUpdate();
    }

    public function showUpdate($category_id) {
        $this->updateCategory = true;
        $this->category = ModelsCategory::find($category_id)->toArray();
        $this->category['meta'] = $this->category['meta'] ? unserialize($this->category['meta']) : [];
    }

    public function update() {
        $this->dispatchBrowserEvent('componentUpdated');
        $this->validate(
            [
                'category.title' => 'required',
                'category.content' => 'required',
                'category.slug' => 'required',
                'category.meta.*.name' => 'required',
                'category.meta.*.content' => 'required'
            ],
            [
                'category.title.required' => 'Category Title is Required',
                'category.content.required' => 'Please enter some Content for the Category',
                'category.slug.required' => 'Category Slug is Required',
                'category.meta.*.name.required' => 'Meta Tag Name is Required',
                'category.meta.*.content.required' => 'Meta Tag Content is Required'
            ]
        );
        $category = ModelsCategory::findOrFail($this->category['id']);
        if (isset($this->category['lang'])) {
            $category = ModelsCategory::where('slug', $category->slug)->where('lang', $this->category['lang'])->first();
            if (!$category) {
                $category = new ModelsCategory;
            }
        }
        $temp = $this->category['meta'];
        $this->category['meta'] = serialize($this->category['meta']);
        $category->fill($this->category);
        $category->save();
        $this->category['meta'] = $temp;
        $this->emit('saved');
    }

    public function translate($locale) {
        $category = ModelsCategory::where('slug', $this->category['slug'])->where('lang', $locale)->first();
        if ($category) {
            $this->showUpdate($category->id);
        }
        $this->category['lang'] = $locale;
        $this->category['lang_text'] = config('app.locales_text')[array_search($locale, config('app.locales'))];
        $this->dispatchBrowserEvent('componentUpdated');
    }

    public function isTranslated($locale) {
        if (ModelsCategory::where('slug', $this->category['slug'])->where('lang', $locale)->count() > 0) {
            return true;
        }
        return false;
    }

    public function delete($category_id) {
        $category = ModelsCategory::findOrFail($category_id);
        ModelsCategory::where('slug', $category->slug)->delete();
        $category->delete();
        $this->updateCategory();
    }

    public function addMeta() {
        array_push($this->category['meta'], [
            'name' => '',
            'content' => ''
        ]);
        $this->dispatchBrowserEvent('componentUpdated');
    }

    public function deleteMeta($key) {
        unset($this->category['meta'][$key]);
        $this->dispatchBrowserEvent('componentUpdated');
    }

    public function render() {
        return view('backend.category.category');
    }

    /** Function to Create Menu Item for newly created Category */
    private function createMenu() {
        $menu = new Menu;
        $menu->name = $this->category['title'];
        $menu->link = env('APP_URL') . '/' . $this->category['slug'];
        $menu->parent_id = null;
        $order = Menu::select('order')->where('parent_id', null)->orderBy('order', 'desc')->first();
        $menu->order = (($order) ? $order->order : 0) + 1;
        $menu->target = '_self';
        $menu->status = true;
        $menu->save();
    }
}
