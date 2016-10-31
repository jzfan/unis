<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\User\User;

class MemberController extends Controller
{
	public function index()
	{
		$members = User::with('address', 'favorites', 'recommends')->where('role', 'member')->paginate(config('site.perPage'));
		return view('backend.member.index', compact('members'));
	}

	public function edit(User $member)
	{
		return view('backend.member.edit', compact('member'));
	}

	public function show($member)
	{
		$member = User::with('favorites', 'recommends')->where('id', $member)->first();
		return view('backend.member.show', compact('member'));
	}
}
