<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $objs = Skill::withCount('freelancerSkills', 'workSkills')
            ->orderBy('id', 'desc')
            ->paginate();

        return view('admin.skill.index')
            ->with([
                'objs' => $objs,
            ]);
    }
}
