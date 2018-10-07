<?php
/**
 * Created by PhpStorm.
 * User: batman
 * Date: 25/05/2018
 * Time: 15:24
 */

namespace Modules\Group\Http\Controllers;


use  App\Cluster;
use App\Http\Controllers\ManageApiController;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;

class ManageGroupApiController extends ManageApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function assignGroupInfo($cluster, $request, $user_id)
    {
        $cluster->name = $request->name;
        $cluster->description = $request->description;
        $cluster->creator_id = $user_id;
        $cluster->save();
    }

    public function getGroupList(Request $request)
    {
        $query = trim($request->search);
        $limit = $request->limit ? intval($request->limit) : 20;
        $clusters = Cluster::query();
        if ($query) {
            $clusters = $clusters->where('name', 'like', "%$query%");
        }
        if ($limit == -1) {
            $clusters = $clusters->orderBy('created_at', 'desc')->get();
            return $this->respondSuccessWithStatus([
                'groups' => $clusters->map(function ($cluster) {
                    return $cluster->getData();
                })
            ]);
        }
        $clusters = $clusters->orderBy('created_at', 'desc')->paginate($limit);
        return $this->respondWithPagination($clusters, [
            'groups' => $clusters->map(function ($cluster) {
                return $cluster->getData();
            })
        ]);
    }

    public function createGroup(Request $request)
    {
        $cluster = new Cluster;
        $this->assignGroupInfo($cluster, $request, $this->user->id);
        return $this->respondSuccessWithStatus([
            'message' => 'Tạo nhóm thành công'
        ]);
    }

    public function editGroup($clusterId, Request $request)
    {
        $cluster = Cluster::find($clusterId);
        if ($cluster == null) {
            return $this->respondErrorWithStatus([
                'message' => 'Không tồn tại nhóm này'
            ]);
        }
        $this->assignGroupInfo($cluster, $request, $cluster->creator_id);
        return $this->respondSuccessWithStatus([
            'message' => 'Sửa nhóm thành công'
        ]);
    }
}