<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    protected $table = 'barangs';
    protected $fillable =[
        'namabarang',
        'stok',
        'keterangan',
        'category_id',
        'harga',
        'itemid',
        'images'
    ];

    public function pesanan_detail(){
        return $this->hasMany(pesanandetail::class,'barang_id','id');
    }

    public function pesanan(){
        return $this->belongsTo(pesanan::class,'pesanan_id','id');
    }

    public function category()
    {
        return $this->belongsTo(category::class, 'category_id', 'id');
    }

    public function rules()
    {
        return [
            'name' => "required|string|min:3|unique:product_categories,name",
            'description' => 'nullable|string',
            'slug' => "required|string|min:3|unique:product_categories,slug",
        ];
    }

}
