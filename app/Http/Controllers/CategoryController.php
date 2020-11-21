<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;


class CategoryController extends Controller
{
    //redirect to transactions categories ...........
    public function showCategories() 
    { 
        return view('pages.tresorerie.categorisation')->with('category_name', 'tresorerie')->with('page_name', 'categorisation')->with('page_title', 'Catégorisation')->with('has_scrollspy', 0)->with('scrollspy_offset', '');
    }  

    //redirect to other categories ...........
    public function Categories() 
    { 
        return view('pages.commercial.ventes.categories')->with('category_name', 'ventes')->with('page_name', 'categories_cl_prod')->with('page_title', 'Catégories')->with('has_scrollspy', 0)->with('scrollspy_offset', '');
    }  

    public function listCategories($type)
    {
        $categories = DB::table('categories')
                    ->select('id', 'designation', 'category_type')
                    ->where([
                        ['data_type', $type],
                        ['corp_id', 1],
                        ['parent', null]
                    ])
                    ->orwhere([
                        ['data_type', $type],
                        ['category_type', 'default'],
                        ['parent', null]
                    ])
                    ->orderBy('designation')
                    ->get(); 

        $allCategories = '';  
        foreach($categories as $category)
        { 
            $sub_categories = DB::table('categories')
                            ->select('id', 'designation', 'category_type', 'parent')
                            ->where('parent', $category->id)
                            ->orderBy('designation')
                            ->get();
            $count = $sub_categories->count();
            
            $allCategories .= '<div class="pt-3 border-bottom pb-1 pr-2 category-div" id="'.$category->id.'" dataType="'.$type.'"><h6 id="content-category-'.$category->id.'">'.(($count == 0)? '': '<a style="cursor:pointer;" class="btn-wind" type="'.$type.'" parent="'.$category->id.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></a>').' <span class="'.(($count == 0)? 'ml-27': '').'" id="text-category-'.$category->id.'">'.$category->designation.'</span> <span id="btn-sub-cat'.$category->id.'"></span> <a title="Supprimer" style="cursor:pointer" class="float-right btn-delete-category '.(($category->category_type == 'default')? 'd-none': '').'" id="'.$category->id.'" dataType="'.$type.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a> <a title="Renommer" style="cursor:pointer;" class="mr-2 float-right btn-edit-category '.(($category->category_type == 'default')? 'd-none': '').'" dataType="'.$type.'" id="'.$category->id.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></h6></div><div class="pl-4" id="sub-'.$category->id.'">';

            foreach($sub_categories as $sub_category)
            {
                $allCategories .= '<div class="pt-3 border-bottom pb-1 pl-2 pr-2 category-div" id="'.$sub_category->id.'" dataType="'.$type.'"><h6 id="content-category-'.$sub_category->id.'"> <span id="text-category-'.$sub_category->id.'">'.$sub_category->designation.'</span> <a style="cursor:pointer" class="float-right btn-delete-category '.(($sub_category->category_type == 'default')? 'd-none': '').'" id="'.$sub_category->id.'" dataType="'.$type.'" title="Supprimer"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a> <a style="cursor:pointer" title="Renommer" class="mr-2 float-right btn-edit-category '.(($sub_category->category_type == 'default')? 'd-none': '').'" dataType="'.$type.'" id="'.$sub_category->id.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></h6></div>';
            }

            $allCategories .= '</div>';
        }
        return response($allCategories)->header('Content-Type', 'text/html'); 
    }

    public function addCategory(Request $request)
    { 
        $category = new Category();
        $category->designation = $request->designation;
        $category->data_type = $request->data_type;
        $category->category_type = 'custom';
        $category->parent = (is_numeric($request->parent))? $request->parent: null;
        $category->corp_id = 1;
        $category->user_id = 1;
        $category->save();

        return 'Nouvelle catégorie créée !';
    }

    public function editCategory(Request $request)
    {
        $category = Category::find($request->id);
        $category->designation = $request->designation;
        $category->save();

        return 'Catégorie modifiée !';
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $sub_categories = DB::table('categories')->where('parent', $id)->delete();
        $category->delete();
        return 'Catégorie supprimée !';
    }

    public function ruleCategories($type)
    {   
        $categories = DB::table('categories')
                    ->select('id', 'designation')
                    ->where([
                        ['data_type', $type],
                        ['corp_id', 1]
                    ])
                    ->orwhere([
                        ['data_type', $type],
                        ['category_type', 'default']
                    ])
                    ->orderBy('designation')
                    ->get();
        return response()->json($categories);
    }

    public function getCategoriesByType($type)
    {   
        $categories = DB::table('categories')
        ->select('id', 'designation', 'category_type')
        ->where([
            ['data_type', $type],
            ['corp_id', 1]
        ])
        ->orwhere([
            ['data_type', $type],
            ['category_type', 'default']
        ])
        ->orderBy('designation')
        ->get(); 

        $fcategories = [];

        foreach($categories as $category)
        {
            $sub = DB::table('categories')->where('parent', $category->id)->doesntExist();
            if($sub)
            {
                $fcategories[] = ['id' => $category->id, 'designation' => $category->designation, 'category_type' => $category->category_type];
            }
        }

        return response()->json($fcategories);
    }

    public function getSubCategories($parent, $type)
    {
        $allCategories = '';
        $categories = DB::table('categories')
                    ->select('id', 'designation', 'category_type', 'parent')
                    ->where('parent', $parent)
                    ->orderBy('designation')
                    ->get();
        foreach($categories as $category)
        {
            $allCategories .= '<div class="pt-3 border-bottom pb-1 pl-2 pr-2 category-div" id="'.$category->id.'" dataType="'.$type.'"><h6 id="content-category-'.$category->id.'"> <span id="text-category-'.$category->id.'">'.$category->designation.'</span> <a class="float-right btn-delete-category '.(($category->category_type == 'default')? 'd-none': '').'" id="'.$category->id.'" dataType="'.$type.'" title="Supprimer"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a> <a title="Renommer" class="mr-2 float-right btn-edit-category '.(($category->category_type == 'default')? 'd-none': '').'" dataType="'.$type.'" id="'.$category->id.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></h6></div>';
        }
        return $allCategories;
    }

    public function getCategoryById($id)
    {
        $category = Category::find($id);
        return response()->json($category);
    }

}
