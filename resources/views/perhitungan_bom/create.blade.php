@extends('layouts.app')

@section('title', 'Tambah BOM')

@section('page-title', 'Tambah BOM')

@section('breadcrumb', 'Dashboard / Perhitungan BOM / Tambah')

@vite('resources/css/bom.css')

@section('content')

<div class="page-header">
    <div class="title">
        <h2>Tambah Bill of Material</h2>
        <p>Tambahkan data kebutuhan bahan baku untuk produk baru.</p>
    </div>
</div>

@if ($errors->any())
    <div class="alert-box alert-error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-card">
    <form action="{{ route('perhitungan-bom.store') }}" method="POST">
        @csrf

        <div class="form-grid">
            <div class="form-group">
                <label>Kode Produk</label>
                <input type="text" name="kode_produk" value="{{ old('kode_produk') }}" placeholder="Contoh: PRD-001" required>
            </div>

            <div class="form-group">
                <label>Nama Produk</label>
                <input type="text" name="nama_produk" value="{{ old('nama_produk') }}" placeholder="Contoh: Kemeja Flannel" required>
            </div>

            <div class="form-group full-width">
                <label>Bahan Baku</label>
                <select name="bahan_baku_id" id="bahanSelect" required>
                    <option value="">Pilih Bahan Baku</option>
                    @foreach ($bahan as $item)
                        <option value="{{ $item->id }}"
                            data-satuan="{{ $item->satuan }}"
                            data-harga="{{ $item->harga }}"
                            data-stok="{{ $item->stok }}"
                            data-kode="{{ $item->kode_bahan }}"
                            {{ old('bahan_baku_id') == $item->id ? 'selected' : '' }}>
                            {{ $item->kode_bahan }} - {{ $item->nama_bahan }} ({{ $item->kategori }}) | Stok: {{ $item->stok }} {{ $item->satuan }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group full-width bahan-info" id="bahanInfo" style="display:none;">
                <div class="info-card">
                    <div class="info-row">
                        <span class="info-label">Kode</span>
                        <span class="info-value" id="infoKode">-</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Stok Tersedia</span>
                        <span class="info-value" id="infoStok">-</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Harga Satuan</span>
                        <span class="info-value" id="infoHarga">-</span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Qty per Produk</label>
                <input type="number" name="qty_per_produk" value="{{ old('qty_per_produk') }}" step="0.01" min="0" placeholder="0" required>
            </div>

            <div class="form-group">
                <label>Waste (%)</label>
                <input type="number" name="waste" value="{{ old('waste', 0) }}" step="0.01" min="0" max="100" placeholder="0">
            </div>

            <div class="form-group full-width">
                <label>Keterangan</label>
                <textarea name="keterangan" rows="3" placeholder="Catatan tambahan (opsional)">{{ old('keterangan') }}</textarea>
            </div>
        </div>

        <div class="form-action">
            <a href="{{ route('perhitungan-bom.index') }}" class="btn-secondary">Kembali</a>
            <button type="submit" class="btn-primary">Simpan Data</button>
        </div>
    </form>
</div>

@endsection

@push('scripts')
<script>
document.getElementById('bahanSelect').addEventListener('change', function() {
    const opt = this.options[this.selectedIndex];
    const info = document.getElementById('bahanInfo');
    if (this.value) {
        document.getElementById('infoKode').textContent = opt.dataset.kode;
        document.getElementById('infoStok').textContent = opt.dataset.stok + ' ' + opt.dataset.satuan;
        document.getElementById('infoHarga').textContent = 'Rp ' + Number(opt.dataset.harga).toLocaleString('id-ID');
        info.style.display = 'block';
    } else {
        info.style.display = 'none';
    }
});
</script>
@endpush
