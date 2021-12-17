<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class CategoryDropdown extends Component
{
    /**
     * Method to render category dropdown.
     */
    public function render()
    {
        return view('components.category-dropdown', [
      'categories' => Category::all(),
      'currentCategory' => Category::firstWhere('slug', request('category')),
    ]);
    }
}
