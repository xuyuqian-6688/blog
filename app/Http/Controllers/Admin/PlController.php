<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Article;
use App\Pl;

class PlController extends Controller
{
    public function show()
    {
        $comments = Pl::orderBy('id', 'desc')->paginate(25);
        return View("pl/pl",['comments' => $comments,]);
    }

    /**
     * \审核方法
     */
    public function agree($id)
    {
        // 查询评论
        $comment = Pl::find($id);

        if (! $comment) {
            return back()->with('errMsg', '评论不存在!');
        }

        // 修改数据
        $comment->status = 1;

        // 保存修改
        $res = $comment->save();

        if ($res) {
            return back();
        } else {
            return back()->with('errMsg', '审核失败!');
        }
    }

    //删除
    public function del($id)
    {
        $comment = Pl::find($id);
        if($comment->delete()){
            return redirect("Admin/pl/show");
        }else{
            return back()->with("error","删除失败！");
        }
    }
}