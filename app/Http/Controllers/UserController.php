<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('panggil_login')
                ->withErrors([
                    'email' => 'Please login to access the dashboard.',
                ])->onlyInput('email');
        }

        $users = User::get();

        return view('users')->with('pengguna', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cariUser = User::find($id);
        return view('edit', compact('cariUser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $cariUser = User::find($id);

        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email:dns|max:250|unique:users,email,' . $id,
            'photo' => 'image|nullable|mimes:jpg,png,jpeg|max:5000000'
        ]);

        if ($request->hasFile('photo')) {
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;
            
            $photo = $cariUser->photo;

            // Hapus gambar asli
            $originalPath = public_path('storage/photos/original/' . $photo);
            if (File::exists($originalPath)) {
                File::delete($originalPath);
            }
            //simpan gambar asli
            $path = $request->file('photo')->storeAs('photos/original', $filenameSimpan);


            // Hapus gambar thumbnail
            $thumbnailPath = public_path('storage/photos/thumbnail/' . $photo);
            if (File::exists($thumbnailPath)) {
                File::delete($thumbnailPath);
            }
            // Buat thumbnail dengan lebar dan tinggi yang diinginkan
            $thumbnailPath = public_path('storage/photos/thumbnail/' . $filenameSimpan);
            Image::make($request->photo)
                ->fit(150, 150)
                ->save($thumbnailPath);


            // Hapus gambar square
            $squarePath = public_path('storage/photos/square/' . $photo);
            if (File::exists($squarePath)) {
                File::delete($squarePath);
            }
            // Buat versi square dengan lebar dan tinggi yang sama
            $squarePath = public_path('storage/photos/square/' . $filenameSimpan);
            Image::make($request->photo)
                ->fit(300, 300)
                ->save($squarePath);

            $path = $filenameSimpan;
            User::where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'photo' => $path,
            ]);
        }
        else {
            $cariUser->update([
            'name' => $request->name,
            'email' => $request->email,
            ]);
        }

        return redirect('/users')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cariUser = User::find($id);

        if (!$cariUser) {
            return redirect()->route('users')->with('error', 'User not found');
        }
    
        $photo = $cariUser->photo;
    
        // Hapus gambar asli
        $originalPath = public_path('storage/photos/original/' . $photo);
        if (File::exists($originalPath)) {
            File::delete($originalPath);
        }
    
        // Hapus thumbnail
        $thumbnailPath = public_path('storage/photos/thumbnail/' . $photo);
        if (File::exists($thumbnailPath)) {
            File::delete($thumbnailPath);
        }
    
        // Hapus versi persegi
        $squarePath = public_path('storage/photos/square/' . $photo);
        if (File::exists($squarePath)) {
            File::delete($squarePath);
        }
    
        // Hapus data pengguna
        $cariUser->delete();
        return redirect('/users')->withSuccess('You have successfully deleted data!');
    }
}
