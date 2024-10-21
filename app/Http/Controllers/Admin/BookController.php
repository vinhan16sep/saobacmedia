<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Models\ProductCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class BookController extends AdminController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    public function index(Request $request) {
        $req = $request->all();

        $q = new Book();

        // Tên sản phẩm
        if (isset($req['name']) && $req['name']) {
            $q->where('name', 'LIKE', '%' . $req['name'] . '%');
        }

        $list = $q->orderBy('id', 'desc')->paginate(10)->withQueryString();
        return view('admin/book/index', [
            'list' => $list,
            'req' => $req,
        ]);
    }

    public function create() {
        return view('admin/book/create', [
        ]);
    }

    public function store(Request $request) {

        $this->validateStore($request);

        DB::beginTransaction();

        try {
            $model = new Book();
            $model->name = $request->input('name');
            $model->slug = $request->input('slug');
            $model->author = $request->input('author');
            $model->published_year = $request->input('published_year');
            $model->description = $request->input('description');
            $model->content = $request->input('content');
            $model->created_by = 1;
            $model->updated_by = 1;
            if ($model->save()) {
                
                $path = sprintf(Config::get('constants.FILE_STORAGE_PATH.BOOK_IMAGE'), $model->id);
                $upload = $this->uploadImages($path, $request);
                $model->image = json_encode($upload, JSON_UNESCAPED_SLASHES);
                $model->save();
    
                if ($model->save()) {
                    DB::commit();
                    return redirect()->route('list-book')->with('success', Config::get('constants.MESSAGE.CREATE_SUCCEEDED'));
                }
            }
            DB::rollBack();
            return redirect()->route('create-book')->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR'));

        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('create-book')->with('error', $e->getMessage()); 
        }
    }

    public function edit($id) {
        $object = Book::find($id);
        // If object not found
        if ($object == null || $object->count() == 0) {
            return redirect()->route('list-book')->with('error', Config::get('constants.MESSAGE.DATA_NOT_FOUND'));
        }

        return view('admin/book/edit', [
            'object' => $object,
            'callback' => url(URL::previous())
        ]);
    }

    public function update(Request $request, $id) {
        $object = Book::find($id);

        // If object not found
        if ($object == null || $object->count() == 0) {
            return redirect()->route('list-book')->with('error', Config::get('constants.MESSAGE.DATA_NOT_FOUND'));
        }

        $this->validateUpdate($request, $id);

        DB::beginTransaction();

        try {
            $object->name = $request->input('name');
            $object->slug = $request->input('slug');
            $object->author = $request->input('author');
            $object->published_year = $request->input('published_year');
            $object->description = $request->input('description');
            $object->content = $request->input('content');
            $object->created_by = 1;
            $object->updated_by = 1;
                
            if($request->hasfile('image')) {
                $path = sprintf(Config::get('constants.FILE_STORAGE_PATH.BOOK_IMAGE'), $id);
                $prevImg = $object->image;
                $upload = $this->updateImage($path, $request, $prevImg);
                $object->image = $upload;
            }

            if ($object->save()) {
                DB::commit();
                $parsedUrl = parse_url($request->input('callback'));
                $params = [];
                if (isset($parsedUrl['query'])) {
                    parse_str($parsedUrl['query'], $params);
                }

                return redirect()->route('list-book', $params)->with('success', Config::get('constants.MESSAGE.UPDATE_SUCCEEDED'));
            }
            DB::rollBack();
            return redirect()->route('edit-book', [
                'id' => $id, 
                'callback' => $request->input('callback')
            ])->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR'));

        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('edit-book', [
                'id' => $id, 
                'callback' => $request->input('callback')
            ])->with('error', $e->getMessage()); 
        }
    }

    public function delete(Request $request) {
        $request = $request->all();

        // If got bad parameter(s)
        if (!isset($request['id']) || empty($request['id'])) {
            return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 404);
        }

        $object = Book::find($request['id']);

        // If object not found
        if ($object == null || $object->count() == 0) {
            return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 404);
        }

        // If object is being used elsewhere
        if ($this->checkInUse($request['id'])) {
            return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.CANNOT_DELETE_IN_USING')], 404);
        }

        if ($object->delete()) {
            return response()->json(['status' => 'success','msg' => Config::get('constants.MESSAGE.DELETE_SUCCEEDED')], 200);
        }
        return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.SOMETHING_ERROR')], 403);
    }

    public function changeStatus(Request $request) {
        $request = $request->all();

        if (!isset($request['id']) || empty($request['id']) || !isset($request['status']) || ($request['status'] != '0' && $request['status'] != '1')) {
            return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 404);
        }

        $object = Book::find($request['id']);

        // If object not found
        if ($object == null || $object->count() == 0) {
            return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 404);
        }
        
        // If object is being used elsewhere
        if ($request['status'] == '0') {
            if ($this->checkInUse($request['id'])) {
                return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.CANNOT_DEACTIVE_IN_USING')], 404);
            }
        }

        $object->is_active = $request['status'];

        if ($object->save()) {
            return response()->json(['status' => 'success','msg' => Config::get('constants.MESSAGE.CHANGE_STATUS_SUCCEEDED')], 200);
        }
        return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.SOMETHING_ERROR')], 403);
    }
    
    private function validateStore($request) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:products',
            'image.*' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'name.required' => 'Chưa nhập tên',
            'slug.required' => 'Chưa có slug',
            'slug.unique' => 'Slug đã tồn tại',
            'image.required' => 'Chưa chọn ảnh',
            'image.image' => 'Chỉ chấp nhận ảnh có định dạng jpg, jpeg, png',
            'image.mimes' => 'Chỉ chấp nhận ảnh có định dạng jpg, jpeg, png',
            'image.max' => 'Dung lượng ảnh không được quá 2MB',
        ]);
    }

    private function validateUpdate($request, $id) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:products,slug,' . $id . ',id',
            'image.*' => 'image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'product_category_id.required' => 'Chưa chọn danh mục',
            'name.required' => 'Chưa nhập tên',
            'slug.required' => 'Chưa có slug',
            'slug.unique' => 'Slug đã tồn tại',
            'image.image' => 'Chỉ chấp nhận ảnh có định dạng jpg, jpeg, png',
            'image.mimes' => 'Chỉ chấp nhận ảnh có định dạng jpg, jpeg, png',
            'image.max' => 'Dung lượng ảnh không được quá 2MB',
        ]);
    }

    private function checkInUse($id) {
        return false;
    }
}
