<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;
use App\Http\Requests\PostValidation;
use App\Http\Requests\UpdatePost;
use App\Brand;
use App\Cities;
use App\Blog;
use App\BlogCategory;
Use Image;
use App\Http\Controllers\Mailsender;
use App\Http\Mail\PostMail;
use Ixudra\Curl\Facades\Curl;
use App\Postview;
use Intervention\Image\Exception\NotReadableException;
use DB;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['ads'] = Post::with('brand','city')->select('adprice','br_id','loc_id','postedby','adimgs','adtitle','adslug','selname','created_at')->take(20)->orderBy('aid', 'DESC')->get();
        $data['blogs'] = Blog::with('category')->select('blog_title','short_description','blog_slug','blog_image','category_id','created_at')->take(3)->orderBy('blog_id', 'DESC')->get();
        return view('frontend.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        if (Auth::guest()) {
            Session::flash('message',"Nothing"); 
            return redirect('user/signup');
        }
        else {
            $data['brands'] = Brand::get();
            $data['cities'] = Cities::get();
            return view('frontend/postad',$data);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostValidation $request)
    {
        $images = $request->file('image');
        if ($request->hasFile('image')) :
                foreach ($images as $item):
                    $ImageUpload = Image::make($item);

                    $originalPath = 'public/images/';
                    $ImageUpload->resize(700,500);
                    $explodeName = explode(".", $item->getClientOriginalName());
                    $ImageName = time().'-'.$explodeName[0].'.webp';
                    $ImageUpload->save($originalPath.$ImageName);

                    $thumbnailPath = 'public/images/thumbnail/';
                    $ImageUpload->resize(260,180);
                    $ImageUpload->save($thumbnailPath.$ImageName);

                    $arr[] = $ImageName;
                endforeach;
                $images = implode(",", $arr);
        else:
                $images = '';
        endif;
        $post= new Post;
        $post->adtitle = $request->title;
        $post->adslug  = $this->createSlug($request->title);
        $post->adimgs  = $images;
        $post->adphone = $request->phone;
        $post->adprice = $request->price;
        $post->cond = $request->cond;
        $post->ad_description = $request->ades;
        $post->br_id = $request->brand;
        $post->loc_id  = $request->location;
        $post->adadress  = $request->adadress;
        $post->cat_id  = $request->category ;
        $post->nego    = $request->neg;
        $post->adtime  = time();
        $post->postedtill = time()+(365*86400);
        $post->is_anonymus  = 1;
        $post->selname  = Session::get('name');
        $post->selemail    = Session::get('email');
        $post->postedby  = Session::get('user_id');
        $post->vcode  = '0';
        if($post->save()){
            Mailsender::PostEmail(Session::get('email'),$post->adslug);
            return response(['success' => true,'slug' => $post->adslug], Response::HTTP_OK);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    
    public function show(Request $request, $slug)
    {
        $data['item'] = Post::with('brand','city','user')->withCount('postview')->where('adslug','=',$slug)->first();
        if (isset($data['item']->aid)) { 
            $data['l_ads'] = Post::with('brand','city')->select('adprice','br_id','loc_id','postedby','adimgs','adtitle','adslug','selname','created_at')->orWhere('loc_id','=',$data['item']->loc_id)->orWhere('br_id','=',$data['item']->br_id)->take(15)->orderBy('aid', 'DESC')->get();
            $data['ads'] = Post::with('brand','city')->where(['postedby'=>$data['item']->postedby])->select('aid','adprice','br_id','loc_id','postedby','adimgs','adtitle','adslug','selname','created_at')->where('adslug','!=',$slug)->take(10)->orderBy('aid', 'DESC')->get();
            $view = Postview::where(['post_id'=>$data['item']->aid,'user_ip'=>$request->ip()])->get();
            if ($view->count() < 1) {          
                $view = new Postview();
                $view->user_id = Session::get('user_id');
                $view->post_id = $data['item']->aid;
                $view->user_ip = $request->ip();
                $view->save();
                $count = DB::table('postviews')->where('post_id',$data['item']->aid)->count();
                if($count % 5 == 0){  
                    Mailsender::PostView($data['item'],$count);
                }
            }
                return view('frontend.itemdetail',$data);
        }
        else {
            return abort(404);
        }
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePost $request, $id)
    {
        $post= Post::find($id);
        $images = $post->adimgs;
        if ($images !== '') {
            $images = explode(',', $images);
        }
        else
        {
            $images = array();
        }
        for($i = 0 ; $i < 4; $i++){
            $image = $request->file('image'.$i);
            if ($request->hasFile('image'.$i)) :
                    $ImageUpload = Image::make($image);

                    $originalPath = 'public/images/';
                    $ImageUpload->resize(700,500);
                    $explodeName = explode(".", $image->getClientOriginalName());
                    $ImageName = time().'-'.$explodeName[0].'.webp';
                    $ImageUpload->save($originalPath.$ImageName);

                    $thumbnailPath = 'public/images/thumbnail/';
                    $ImageUpload->resize(260,180);
                    $ImageUpload->save($thumbnailPath.$ImageName);

                    if (count($images) > $i && !empty($images[$i])) {
                        unlink('public/images/thumbnail/'.$images[$i]);
                        unlink('public/images/'.$images[$i]);
                        $images[$i] = $ImageName;
                    }
                    else
                    {
                        $images[] = $ImageName;
                    }
            endif;
        }
        $images = implode(",", $images);
        
        $post->adtitle = $request->title;
        $post->adslug  = $this->createSlug($request->title, $id);
        $post->adimgs  = $images;
        $post->adphone = $request->phone;
        $post->adprice = $request->price;
        $post->cond = $request->cond;
        $post->ad_description = $request->ades;
        $post->br_id = $request->brand;
        $post->loc_id  = $request->location;
        $post->adadress  = $request->adadress;
        $post->cat_id  = $request->category ;
        $post->nego    = $request->neg;
        $post->vcode  = '0';
        if($post->save()){
            //Mailsender::PostEmail(Session::get('email'),$post->adslug);
            return response(['success' => true,'slug' => $post->adslug], Response::HTTP_OK);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
    public function createSlug($title, $id = 0) {
        $slug = Str::slug($title, '-');
        $allSlugs = $this->getRelatedSlugs($slug, $id);
        if (! $allSlugs->contains('adslug', $slug)){
            return $slug;
        }
        for ($i = 1; $i <= 10000; $i++) {
            $newSlug = $slug.'-'.$i;
            if (! $allSlugs->contains('adslug', $newSlug)) {
                return $newSlug;
            }
        }
        throw new \Exception('Can not create a unique slug');
    }
    protected function getRelatedSlugs($slug, $id = 0) {
        return Post::select('adslug')->where('adslug', 'like', $slug.'%')
            ->where('aid', '<>', $id)
            ->get();
    }
}
