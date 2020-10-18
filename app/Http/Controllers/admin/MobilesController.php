<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mobiles;
use App\Brand;
use App\Http\Requests\MobileValidation;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use File;

class MobilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['mobiles']=Mobiles::get();
        return view('admin.mobiles.index',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['brands']=Brand::get();
        return view('admin.mobiles.create',$data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MobileValidation $request)
    {
        
        $images = $request->file('mobile_image');
       
        if ($request->hasFile('mobile_image')) :
                $ImageUpload = Image::make($images);
                $originalPath = 'public/mobiles/';
                $ImageUpload->resize(180,350);
                $explodeName = explode(".", $images->getClientOriginalName());
                $ImageName = time().'-'.$explodeName[0].'.webp';
               
                $ImageUpload->save($originalPath.$ImageName);

                $thumbnailPath = 'public/mobiles/thumbnail/';
                $ImageUpload->resize(200,130);
                $ImageUpload->save($thumbnailPath.$ImageName);
        else:
                $ImageName = '';
        endif;
        $blog = new Mobiles();
        $blog->mobile_title = $request->mobile_title;
        $blog->mobile_description = $request->mobile_description;
        $blog->short_description = $request->short_description;
        $blog->mobile_slug = $this->createSlug($request->mobile_title);;
        $blog->mobile_tags = $request->mobile_tags;
        $blog->brand_id = $request->brand_id;
        $blog->mobile_image = $ImageName;
        $blog->save();
        return 
        response(['success'=>true,'message'=>'Mobiles added sucessfully']
            , Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function list(Mobiles $blog)
    {
        $data['blogs'] = Mobiles::with('category')->select('mobile_title','short_description','mobile_slug','mobile_image','category_id','created_at')->orderBy('mobile_id', 'DESC')->take(5)->paginate();
        $data['ads'] = Post::with('brand','city')->select('adprice','br_id','loc_id','postedby','adimgs','adtitle','adslug','selname')->take(20)->orderBy('aid', 'DESC')->get();
        return view('frontend.blogs',$data);
    }
    public function show(Blog $blog,$slug)
    {
        $data['blog'] = Blog::with('category')->select('mobile_title','mobile_description','short_description','mobile_slug','mobile_image','category_id','created_at')->where('mobile_slug','=',$slug)->first();
        if (isset($data['blog']->mobile_title)) {
            $data['ads'] = Post::with('brand','city')->select('adprice','br_id','loc_id','postedby','adimgs','adtitle','adslug','selname')->take(20)->orderBy('aid', 'DESC')->get();
            $data['blogs'] = Blog::with('category')->select('mobile_title','short_description','mobile_slug','mobile_image','category_id','created_at')->where('mobile_slug','!=',$slug)->orderBy('mobile_id', 'DESC')->take(5)->get();

            return view('frontend.show',$data);
        }
        return abort(404); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['mobile']=Mobiles::where('mobile_id',$id)->first();
        $data['brands']=Brand::get();
        return view('admin.mobiles.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mobiles $mobile)
    {
        $mobile = Mobiles::find($request->mobile_id);

        $images=$request->file('mobile_image');
        if ($request->hasFile('mobile_image')):
                $thumbnail_image_path = "public/mobiles/thumbnail/".$mobile->mobile_image;  
                if(File::exists($thumbnail_image_path)) {
                    File::delete($thumbnail_image_path);
                }
                $image_path = "public/mobiles/".$mobile->mobile_image;  
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
                $ImageUpload = Image::make($images);
                $originalPath = 'public/mobiles/';
                $ImageUpload->resize(180,350);
                $explodeName = explode(".", $images->getClientOriginalName());
                $ImageName = time().'-'.$explodeName[0].'.webp';
               
                $ImageUpload->save($originalPath.$ImageName);

                $thumbnailPath = 'public/mobiles/thumbnail/';
                $ImageUpload->resize(200,130);
                $ImageUpload->save($thumbnailPath.$ImageName);
                $mobile->mobile_image=$ImageName;
        else:
                $ImageName = '';
        endif;
        $mobile->mobile_title = $request->mobile_title;
        $mobile->mobile_description = $request->mobile_description;
        $mobile->short_description = $request->short_description;
        $mobile->mobile_slug = $this->createSlug($request->mobile_title,$mobile->mobile_id);
        $mobile->mobile_tags = $request->mobile_tags;
        $mobile->brand_id = $request->brand_id;
        $mobile->save();
        return response(["success"=>true,"msg"=>"Mobile Update successfully"], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mobiles::where('mobile_id',$id)->delete();
        return redirect('admin/mobiles/list');
    }

    //change publish stastus
    public function changePublishStatus(Request $request)
    {
        $blog=Blog::find($request->mobile_id);
        $blog->is_publish=$request->id;
        $blog->save();

        return response(["status"=>"success","message"=>"Mobile Status changed Successfully"],Response::HTTP_OK);

    }

    public function createSlug($title, $id = 0) {
        $slug = Str::slug($title, '-');
        $allSlugs = $this->getRelatedSlugs($slug, $id);
        if (! $allSlugs->contains('mobile_slug', $slug)){
            return $slug;
        }
        for ($i = 1; $i <= 10000; $i++) {
            $newSlug = $slug.'-'.$i;
            if (! $allSlugs->contains('mobile_slug', $newSlug)) {
                return $newSlug;
            }
        }
        throw new \Exception('Can not create a unique slug');
    }
    protected function getRelatedSlugs($slug, $id = 0) {
        return Mobiles::select('mobile_slug')->where('mobile_slug', 'like', $slug.'%')
            ->where('mobile_id', '<>', $id)
            ->get();
    }
}
