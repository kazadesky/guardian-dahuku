<?php

namespace App\Http\Controllers;

use App\Models\StudentGuardian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AccountController extends Controller
{
    public function profile(string $id)
    {
        $title = "Profil";
        $user = StudentGuardian::findOrFail($id);
        return view("pages.account.profile", compact("user", "title"));
    }

    public function updateProfile(Request $request, string $id)
    {
        $request->validate(['profile' => 'required|image|mimes:png,jpg,jpeg|max:2048']);

        $user = StudentGuardian::findOrFail($id);

        if ($request->hasFile('profile')) {
            if ($user->profile) {
                $oldFilePath = storage_path('app/public/profile/guardians/' . $user->profile);
                if (File::exists($oldFilePath)) {
                    File::delete($oldFilePath);
                }
            }

            $profileFile = $request->file('profile');
            $profileName = strtolower(str_replace(' ', '_', $user->name)) . '_' . time() . '.' . $profileFile->getClientOriginalExtension();
            $profileFile->storeAs('profile', $profileName, 'public');

            $user->update(['profile' => $profileName]);
        }

        return redirect()->back()->with('success', 'Photo profil berhasil diperbarui.');
    }

    public function updateAccount(Request $request, string $id)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "email" => "required|email|unique:users,email," . Auth::user()->id,
            "nomor_telepon" => "required|numeric|min:10",
            "teacher_status" => "nullable|in:Guru Dayah,Guru Umum",
        ]);

        $user = StudentGuardian::findOrFail($id);
        $user->update([
            "name" => $request->name,
            "email" => $request->email,
            "nomor_telepon" => $request->nomor_telepon,
            "teacher_status" => $request->teacher_status,
        ]);

        return redirect()->back()->with("success", "Profil akun berhasil diperbarui.");
    }

    public function deleteAccount(string $id)
    {
        $user = StudentGuardian::findOrFail($id);
        if ($user->profile) {
            $oldFilePath = storage_path('app/public/profile/guardians/' . $user->profile);
            if (File::exists($oldFilePath)) {
                File::delete($oldFilePath);
            }
        }
        $user->delete();
        Auth::logout();
        return redirect()->route("login")->with("delete", "Akun anda atas nama " . $user->name . " berhasil dihapus.");
    }
}
