<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProdukController extends Controller
{
    //
    public function index()
    {
        $produk=Product::all();
        return view('admin.produk.index' ,compact('produk'));
    }

    public function store()
    {
        return view('admin.produk.insert');
    }
    public function create(Request $request)
    {
        $request->validate(
        [
         'nama_produk' => 'required|max:50',
         'harga' => 'required|integer',
         'GAMBAR_PRODUK' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         'deskripsi' => 'required|max:200',
        ],
        [
            'nama_produk.required' => 'Nama produk harus diisi',
            'nama_produk.max' => 'Maksimal 50 karakter',
            'harga.required' => 'Harga produk harus diisi',
            'harga.integer' => 'Harga produk harus berupa angka',
            'GAMBAR_PRODUK.image' => 'File ekstensi harus jpg, jpeg, gif, png, svg',
            'GAMBAR_PRODUK.mimes' => 'File ekstensi harus jpg, jpeg, gif, png, svg',
            'GAMBAR_PRODUK.max' => 'size gambar maksimal 2MB',
            'deskripsi.required' => 'Deskripsi produk harus diisi',
            'deskripsi.max' => 'Maksimal 200 karakter',
            
        ]
);

        $produk = new Product;
        $produk->NAMA_PRODUK = $request->nama_produk;
        $produk->HARGA_PRODUK = $request->harga;
        
        $produk->DESKRIPSI = $request->deskripsi; 
        if (request()->hasFile('GAMBAR_PRODUK')) {
            // cara kedua
            // $fileName = $request->file('foto')->store('photo_users');
            // $path = $users->foto;
            // if ($path != null) {
            //     Storage::delete($path);
            // }
            // $pathPhoto = $request->file('foto')->store('photo_users');
            // $users->foto = $pathPhoto;

            // cara pertama
            $path = '/' . $produk->GAMBAR_PRODUK;
            if ($path != null) {
                Storage::delete($path);
            }
            $photo = $request->file('GAMBAR_PRODUK');
            $extension = $photo->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;

            $request->GAMBAR_PRODUK->move(storage_path('app/public/'), $fileName);
            $produk->GAMBAR_PRODUK = $fileName;
        }
        $produk->save();
        Alert::success('Berhasil!', 'Data Produk berhasil ditambahkan');
        return redirect('/produk')->with('Berhasil!', 'Data Produk berhasil ditambahkan');
        

    }
    public function edit(String $id)
    {
        $produk = Product::all()->where('PRODUK_ID', $id);
        return view('admin.produk.edit', compact('produk'));

    }
    public function update(Request $request, String $id)
    {
        $request->validate(
            [
             'nama_produk' => 'max:50',
             'harga' => 'integer',
             'GAMBAR_PRODUK' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             'deskripsi' => 'max:200',
            ],
            [
                'nama_produk.max' => 'Maksimal 50 karakter',   
                'harga.integer' => 'Harga produk harus berupa angka',
                'GAMBAR_PRODUK.image' => 'File ekstensi harus jpg, jpeg, gif, png, svg',
                'GAMBAR_PRODUK.mimes' => 'File ekstensi harus jpg, jpeg, gif, png, svg',
                'GAMBAR_PRODUK.max' => 'size gambar maksimal 2MB',
                'deskripsi.max' => 'Maksimal 200 karakter',
            ]
    );
        $produk = product::findOrFail($id);
        $produk->NAMA_PRODUK = $request->nama_produk;
        $produk->HARGA_PRODUK = $request->harga;
        
        $produk->DESKRIPSI = $request->deskripsi; 
        $oldFileName = $produk->GAMBAR_PRODUK;
        if ($request->hasFile('GAMBAR_PRODUK')) {
            // Menghapus foto lama (jika ada)
            if ($oldFileName != null) {
                Storage::delete('/' . $oldFileName);
            }
        
            // Mendapatkan file gambar yang diunggah dari permintaan
            $photo = $request->file('GAMBAR_PRODUK');
        
            // Mendapatkan ekstensi file
            $extension = $photo->getClientOriginalExtension();
        
            // Menentukan nama file baru dengan timestamp untuk memastikan nama file unik
            $fileName = time() . '.' . $extension;
        
            // Memindahkan file gambar yang diunggah ke direktori penyimpanan yang ditentukan
            $photo->move(storage_path('app/public/'), $fileName);
        
            // Mengatur properti GAMBAR_PRODUK dengan nama file baru
            $produk->GAMBAR_PRODUK = $fileName;
        }
        $produk->save();
        Alert::success('Berhasil!', 'Data Produk berhasil di edit');
        return redirect('/produk')->with('Berhasil!', 'Data Produk berhasil di edit');

    }
    public function delete(String $id)
    {
        product::find($id)->delete();
        Alert::success('Berhasil!', 'Data Produk berhasil di hapus');
        return redirect('/produk')->with('Berhasil!', 'Data Produk berhasil dihapus');
    }
}
