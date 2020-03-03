<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContentPage;
use App\ContentTag;
use App\ContentCategory;
class PostsController extends Controller
{
  
  public function index(Request $request)
    {
        
        $posts = ContentPage::with(['categories'])->OrderBy('published_at', 'asc')->paginate(5);
                    

        return view('post.index', compact('posts'));
    }

     public function show(ContentPage $post){
     
        
         $relates = ContentPage::with(['categories'])->OrderBy('published_at', 'asc')->get();
        return view('post.blog', compact('post','relates'));
        

     }

    //    public function sidebar(ContentPage $post){

    //     dd($post);
     
    //      $relates = ContentPage::with(['categories'])->OrderBy('published_at', 'asc')->get();

    //     return view('post.sidebar', compact('relates'));

    //  }



}
