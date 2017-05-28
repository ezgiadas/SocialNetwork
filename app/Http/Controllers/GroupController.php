<?php
namespace App\Http\Controllers;

use App\group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function createGroup(Request $request)
    {
      $group_name = $request ['group_name'];
      $group_topic = $request ['group_topic'];
      $group_private = $request ['group_private'];

      $group = new Group();
      $group->group_name = $group_name;
      $group->group_topic = $group_topic;
      $group->group_private = $group_private;

      $group->save();

      return redirect()->back();
    }

}
