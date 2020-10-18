<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Post;
use App\BlogCategory;
use App\Http\Requests\BlogValidation;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use File;
use Intervention\Image\Exception\NotReadableException;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data['blog']=Blog::get();
         return view('admin.blog.index',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories']=BlogCategory::get();
        
        return view('admin.blog.create',$data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogValidation $request)
    {
        
        $images = $request->file('blog_image');
       
        if ($request->hasFile('blog_image')) :
                $ImageUpload = Image::make($images);
                $originalPath = 'public/blogimages/';
                $ImageUpload->resize(730,450);
                $explodeName = explode(".", $images->getClientOriginalName());
                $ImageName = time().'-'.$explodeName[0].'.webp';
               
                $ImageUpload->save($originalPath.$ImageName);

                $thumbnailPath = 'public/blogimages/thumbnail/';
                $ImageUpload->resize(200,130);
                $ImageUpload->save($thumbnailPath.$ImageName);
        else:
                $ImageName = '';
        endif;
        $blog = new Blog();
        $blog->blog_title = $request->blog_title;
        $blog->blog_description = $request->blog_description;
        $blog->short_description = $request->short_description;
        $blog->blog_slug = $this->createSlug($request->blog_title);;
        $blog->blog_tags = $request->blog_tags;
        $blog->category_id = $request->category_id;
        $blog->blog_image = $ImageName;
        $blog->save();
        return 
        response(['success'=>true,'message'=>'blog added sucessfully']
            , Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function list(Blog $blog)
    {
        $data['blogs'] = Blog::with('category')->select('blog_title','short_description','blog_slug','blog_image','category_id','created_at')->orderBy('blog_id', 'DESC')->take(5)->paginate();
        $data['ads'] = Post::with('brand','city')->select('adprice','br_id','loc_id','postedby','adimgs','adtitle','adslug','selname')->take(20)->orderBy('aid', 'DESC')->get();
        return view('frontend.blogs',$data);
    }
    public function show(Blog $blog,$slug)
    {
        $data['blogs'] = Blog::with('category')->select('blog_title','short_description','blog_slug','blog_image','category_id','created_at')->where('blog_slug','!=',$slug)->orderBy('blog_id', 'DESC')->take(5)->get();
       $data['blog'] = Blog::with('category')->select('blog_title','blog_description','short_description','blog_slug','blog_image','category_id','created_at')->where('blog_slug','=',$slug)->first();
       $data['ads'] = Post::with('brand','city')->select('adprice','br_id','loc_id','postedby','adimgs','adtitle','adslug','selname')->take(20)->orderBy('aid', 'DESC')->get();
        return view('frontend.show',$data); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['blog']=Blog::where('blog_id',$id)->first();
        $data['categories']=BlogCategory::get();
        return view('admin.blog.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $blog=Blog::find($request->blog_id);

        $images=$request->file('blog_image');
        if ($request->hasFile('blog_image')) :
                $thumbnail_image_path = "public/blogimages/thumbnail/".$blog->blog_image;  
                if(File::exists($thumbnail_image_path)) {
                    File::delete($thumbnail_image_path);
                }
                $image_path = "public/blogimages/".$blog->blog_image;  
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
                $ImageUpload = Image::make($images);
                $originalPath = 'public/blogimages/';
                $ImageUpload->resize(700,600);
                $explodeName = explode(".", $images->getClientOriginalName());
                $ImageName = time().'-'.$explodeName[0].'.webp';
               
                $ImageUpload->save($originalPath.$ImageName);

                $thumbnailPath = 'public/blogimages/thumbnail/';
                $ImageUpload->resize(200,130);
                $ImageUpload->save($thumbnailPath.$ImageName);
                $blog->blog_image=$ImageName;
        else:
                $ImageName = '';
        endif;
        $blog->blog_title=$request->blog_title;
        $blog->blog_description=$request->blog_description;
        $blog->short_description=$request->short_description;
        $blog->blog_slug=$this->createSlug($request->blog_title,$blog->blog_id);
        $blog->blog_tags=$request->blog_tags;
        $blog->category_id=$request->category_id;
        $blog->save();
        return response(["success"=>true,"msg"=>"blog edit successfully"], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::where('blog_id',$id)->delete();
        return redirect('blog/list');
    }

    //change publish stastus
    public function changePublishStatus(Request $request)
    {
        $blog=Blog::find($request->blog_id);
        $blog->is_publish=$request->id;
        $blog->save();

        return response(["status"=>"success","message"=>"blog Status changed Successfully"],Response::HTTP_OK);

    }

    public function createSlug($title, $id = 0) {
        $slug = Str::slug($title, '-');
        $allSlugs = $this->getRelatedSlugs($slug, $id);
        if (! $allSlugs->contains('blog_slug', $slug)){
            return $slug;
        }
        for ($i = 1; $i <= 10000; $i++) {
            $newSlug = $slug.'-'.$i;
            if (! $allSlugs->contains('blog_slug', $newSlug)) {
                return $newSlug;
            }
        }
        throw new \Exception('Can not create a unique slug');
    }
    protected function getRelatedSlugs($slug, $id = 0) {
        return Blog::select('blog_slug')->where('blog_slug', 'like', $slug.'%')
            ->where('blog_id', '<>', $id)
            ->get();
    }
}
