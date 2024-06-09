<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class DatauserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.dataUser.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.dataUser.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'userType' => 'required|string|max:255',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->userType = $request->userType;
        $user->save();

        return redirect()->route('admin.dataUsers.index')->with('success', 'Data member berhasil diperbarui');
    }

    public function addPhotoForm($id)
    {
        $user = User::findOrFail($id);

        if ($user->userType === 'member') {
            return view('member.profile.edit', compact('user'));
        } elseif ($user->userType === 'admin') {
            return view('profile.edit', compact('user'));
        }

        // Default fallback, if userType is neither member nor admin
        return redirect()->route()->with('error', 'Invalid user type.');
    }

    public function addPhoto(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Hapus foto lama jika ada
        if ($user->picture) {
            Storage::disk('public')->delete($user->picture);
        }

        // Simpan foto baru
        $picturePath = $request->file('picture')->store('pictures', 'public');
        $user->picture = $picturePath;
        $user->save();

        if ($user->userType === 'member') {
            return redirect()->route('member.profile.edit', $user->id)->with('success', 'Photo added successfully.');
        } elseif ($user->userType === 'admin') {
            return redirect()->route('profile.edit', $user->id)->with('success', 'Photo added successfully.');
        }

        // Default fallback, if userType is neither member nor admin
        return redirect()->route('home')->with('error', 'Invalid user type.');
    }

    public function deletePhoto(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($user->picture) {
            Storage::disk('public')->delete($user->picture);
            $user->picture = null;
            $user->save();
        }

        if ($user->userType === 'member') {
            return redirect()->route('member.profile.edit', $user->id)->with('success', 'Photo deleted successfully.');
        } elseif ($user->userType === 'admin') {
            return redirect()->route('admin.profile.edit', $user->id)->with('success', 'Photo deleted successfully.');
        }

        // Default fallback, if userType is neither member nor admin
        return redirect()->route('home')->with('error', 'Invalid user type.');
    }

    public function editMemberProfile($id)
    {
        $user = User::findOrFail($id);
        return view('member.profile.edit', compact('user'));
    }

    public function editAdminProfile($id)
    {
        $user = User::findOrFail($id);
        return view('profile.edit', compact('user'));
    }
}
