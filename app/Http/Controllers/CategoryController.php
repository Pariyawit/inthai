<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Item;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('sort')->get();
        foreach ($categories as $category) {
            $category["items"] = $category->items;
        }
        return $categories;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
          'title' => 'required',
          'description' => ''
        ]);
        $data['sort'] = Category::All()->count();
        $category = Category::create($data);
        return $category;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
          'title' => 'required',
          'description' => ''
        ]);
        if($category->update($data)){
          return 'success';
        }
        else{
          return 'error';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
      if($category->delete()){
        return 'success';
      }
      else{
        return 'fail';
      }
    }

    public function updateSort(Request $request)
    {
      
      try{
        $data = $request->validate([
          'categories' => 'required'
        ]);
        $categories = $data['categories'];
        // usort(
        //   $categories, 
        //   function($a, $b) {
        //     return $a['sort'] > $b['sort'];
        //   }
        // );

        foreach ($categories as $key => $value) {
          $category = $value;
          
          $cat = Category::find($category['id']);
          $cat->sort = $key;
          $cat->save();

          $items = $category['items'];
          // usort(
          //   $items, 
          //   function($a, $b) {
          //     return $a['sort'] > $b['sort'];
          //   }
          // );

          foreach($items as $key => $value){
            $item = $value;
            $it = Item::find($item['id']);
            $it->sort = $key;
            $it->category_id = $item['category_id'];
            $it->save();
          }

        }
        return 'success';
      }
      catch(Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
      }

    }
}
