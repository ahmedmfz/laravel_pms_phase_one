<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Traits\responseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Category\CatgoryResource;

class CategoryController extends Controller
{
   use responseTrait;
    

    public function index()
    {
        $category = CatgoryResource::collection(Category::all()) ;
        return $this->data($category,"data send successfully",200);
    }


    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[ 
            'name' => 'required|string|min:3',
        ]);
    
        if($validation->fails()){

            return $this->data(null,$validation->errors(),422);

        } else{
            $data = $request->all();
            $data = Category::create($data);
            $data = new CatgoryResource($data);

            return $this->data($data,"data added successfully",200);
        }
    }

    
    public function show($id)
    {
        $category = Category::find($id) ;

        if($category):
             return $this->data(new CatgoryResource($category),"data send successfully",200);
        endif;
        return $this->data(null,"no category found",404);
    }

 
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(),[ 
            'name' => 'required|min:3',
        ]);

        $data = $request->all();
        $update_data = Category::find($id);

        if($update_data){

            if($validation->fails()){
                return $this->data(null,$validation->errors(),422);
            }

            $update_data->update($data);
            $data = new CatgoryResource($data);
            
            return $this->data($data,"data updated successfully",200);
        }

        return $this->data(null,"no category found",404);
    
    }


    public function destroy($id)
    {
        $delete_data = Category::where('id',$id)->first();

        if($delete_data){
            $delete_data->delete();
            return $this->data(null,"data deleted successfully",200);
        }
        return $this->data(null,"no category found",404);
    }

}
