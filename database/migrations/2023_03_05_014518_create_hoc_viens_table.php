<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hoc_viens', function (Blueprint $table) {
            $table->id();
            $table->string('ma_dang_ky');
            $table->string('so_ho_so');
            $table->string('ten_hoc_vien');
            $table->string('ngay_sinh');
            $table->string('gioi_tinh');
            $table->string('so_dien_thoai')->nullable();
            $table->string('quoc_tich');
            $table->string('anh');
            $table->string('cmnd_cccd');
            $table->String('dia_chi')->nullable();
            $table->String('cu_tru')->nullable();
            $table->String('hoc_phi')->nullable();
            $table->String('da_nop_so')->nullable();
            $table->string('da_nop_chu');
            $table->date('ngay_nhan')->nullable();
            $table->foreignId('Khoa_hoc_id')->constrained('khoa_hocs');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('hoc_viens');
    }
};
