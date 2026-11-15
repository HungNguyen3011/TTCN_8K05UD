<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index(Request $request)
   {
       $filters = $request->validate([
           'q' => ['nullable', 'string', 'max:200'],
           'category' => ['nullable', 'integer', 'min:1', 'exists:danhmuc,MADANHMUC'],
           'max_time' => ['nullable', 'integer', 'min:1'],
           'difficulty' => ['nullable', 'string', 'max:20'],
       ]);

       $recipes = Recipe::query()
       ->with('category')
       ->where('TRANGTHAI', Recipe::STATUS_APPROVED)
       ->when($filters['q'] ?? null, function ($query, $term)
       {
           $query->where('TENCONGTHUC', 'like', '%'.$term. '%');
       })
       ->when($filters['category'] ?? null, function ($query, $categoryId)
       {
                $query->where('MADANHMUC', $categoryId);
       })
       ->when($filters['max_time'] ?? null, function ($query, $minutes)
            {
                $query->where('THOIGIANNAU', '<=', $minutes);
            })
       ->when($filters['difficulty'] ?? null, function ($query, $difficulty)
       {
            $query->where('DOKHO', $difficulty);
       })
       ->orderByDesc('NGAYTAO')
       ->paginate(9)
       ->withQueryString();

       $categories = Category::query()
            ->orderBy('TENDANHMUC')
            ->get(['MADANHMUC', 'TENDANHMUC']);

        return view('welcome', [
            'recipes' => $recipes,
            'categories' => $categories,
            'filters' => $filters,
        ]);
   }
}
