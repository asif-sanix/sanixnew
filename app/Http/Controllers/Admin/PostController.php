<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Post\PostCollection;
use App\Model\Category;
use App\Model\Post;
use App\Model\CategoryPost;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function index(Request $request)
    {
       if ($request->ajax()) {
            if ($request->type === 'category') {
                $categories = Category::orderBy('position','asc')->get();
                $cat = array();
                foreach ($categories as $cat2) {
                    $cat[]=['id'=>$cat2->id,'text'=>$cat2->name,'a_attr'=>['href'=>adminRoute('index','category='.$cat2->id)],'parent'=>($cat2->parent)?$cat2->parent:'#'];
                }
                return response()->json($cat);
            }

            $datas = Post::orderBy('created_at','desc')->select(['id','title','slug','status','image','created_at']);
            $search = $request->search['value'];

            if ($search) {
                $datas->where('name', 'like', '%'.$search.'%');
                $datas->orWhere('slug', 'like', '%'.$search.'%');
              
            }
            $request->request->add(['page'=>(($request->start+$request->length)/$request->length )]);
            $datas = $datas->paginate($request->length);
            return response()->json(new PostCollection($datas));
        }
        return view('admin.post.list');
    }

   
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $this->validate($request,[
            'title' => 'required',
            'subtitle' => 'required',
            'body' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:4000',
        ]);

        //return $request->all();
        $post = new Post;
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->body = $request->body;
        $post->status = $request->status??0;
        //return $request->all();
        if($request->hasFile('image')){
            $image = $request->file('image')->store('posts/');
            $post->image =bucketUrl($image);
        }  

        if($post->save()){ 
            
            foreach(explode(',',$request->category) as $key => $value){
                $postCategory = CategoryPost::firstOrNew(['post_id'=>$post->id,'category_id'=>$value]);
                $postCategory          ->save();
            }

            return redirect()->route('admin.post.index')->with(['class'=>'success','message'=>'Post Created successfully.']);
        }

        return redirect()->back()->with(['class'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
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
        $post = Post::where('id',$id)->first();
        return view('admin.post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'subtitle' => 'required',
            'body' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:4000',
        ]);

        //return $request->all();
        $post = Post::find($id);
        $post->title = $request->title;
        $post->subtitle = $request->subtitle??0;
        $post->body = $request->body;
        $post->status = $request->status;
        //return $request->all();
        if($request->hasFile('image')){
            $image = $request->file('image')->store('posts/');
            $post->image =bucketUrl($image);
        }  

        if($post->save()){ 
            return redirect()->route('admin.post.index')->with(['class'=>'success','message'=>'Post Created successfully.']);
        }

        return redirect()->back()->with(['class'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Post::where('id',$id)->delete()){
            
            return response()->json(['message'=>'Post Deleted successfully ...', 'class'=>'success']);  
        }
        return response()->json(['message'=>'Whoops, looks like something went wrong ! Try again ...', 'class'=>'error']);
    }
}
