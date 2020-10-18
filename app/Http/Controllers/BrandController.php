<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Post;
use DB;
use App\Cities;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $slug;
    public function index($slug)
    {
       $this->slug = $slug;
        $ads = Post::with('city' 
            )->whereHas('brand', function ($query) { $query->where('brandslug', '=',$this->slug); })
        ->select('adprice','br_id','loc_id','postedby','adimgs','adtitle','adslug','selname','created_at')->orderBy('aid', 'DESC')->paginate(24);
        return view('frontend.brand',compact('ads',$ads));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/brand/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand1 = $request->input('brand');

        $brand = new Brand;
        $brand->brand = $brand1;
        $brand->brandslug = $this->createSlug($brand1);
        $brand->save();

        return response(["success"=>true,"msg"=>"Brand added successfully"], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data['brand'] = DB::table('brands')->orderBy('brand', 'Asc')->get();
        return view('admin/brand/index',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $brand = Brand::where('bid','=', $id)->get();
        return view('admin/brand/edit',['brand'=>$brand]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $brand = $request->input('brand');
        $brandslug = $request->input('brandslug');
        DB::table('brands')->where('bid', $id)->update( [ 'brand' => $brand, 'brandslug' => $this->createSlug($brand,$id)]);
        return response(["success"=>true,"msg"=>"Brand updated successfully"], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
   public function destroy($id)
    {
       Brand::where('bid', $id)->delete();
       return redirect('admin/brand/show');
    }

    public function createSlug($title, $id = 0) {
        $slug = Str::slug($title, '-');
        $allSlugs = $this->getRelatedSlugs($slug, $id);
        if (! $allSlugs->contains('brandslug', $slug)){
            return $slug;
        }
        for ($i = 1; $i <= 10000; $i++) {
            $newSlug = $slug.'-'.$i;
            if (! $allSlugs->contains('brandslug', $newSlug)) {
                return $newSlug;
            }
        }
        throw new \Exception('Can not create a unique slug');
    }
    protected function getRelatedSlugs($slug, $id = 0) {
        return Brand::select('brandslug')->where('brandslug', 'like', $slug.'%')
            ->where('bid', '<>', $id)
            ->get();
    }
}
