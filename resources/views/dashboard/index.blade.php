

        <section class="panel-grid">
      <div class="panel">
        <div class="panel-head">
            <div>
                <h3>Daftar Bahan Baku</h3>
                <div class="hint">128 item &middot; diperbarui 2 menit lalu</div>
            </div>
            <a href="#" class="link-all">Lihat semua &rarr;</a>
        </div>

        <div class="filter-row">
            <span class="chip active">Semua</span>
            <span class="chip">Kain</span>
            <span class="chip">Benang</span>
            <span class="chip">Aksesoris</span>
            <span class="chip">Stok Menipis</span>
        </div>

        <table id="stockTable">
            <thead>
                <tr>
                    <th>Bahan Baku</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Level Stok</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>
                        <span class="item-name">Kain Katun Combed 24s</span>
                        <span class="item-code">RM-KT-0012</span>
                    </td>
                    <td>Kain</td>
                    <td class="qty-cell">840 m</td>
                    <td>
                        <span class="bar-track">
                            <span class="bar-fill" style="width:82%;background:var(--success);"></span>
                        </span>
                    </td>
                    <td><span class="badge ok">Aman</span></td>
                </tr>

                <tr>
                    <td>
                        <span class="item-name">Kain Denim 12oz</span>
                        <span class="item-code">RM-KT-0031</span>
                    </td>
                    <td>Kain</td>
                    <td class="qty-cell">96 m</td>
                    <td>
                        <span class="bar-track">
                            <span class="bar-fill" style="width:22%;background:var(--warning);"></span>
                        </span>
                    </td>
                    <td><span class="badge low">Menipis</span></td>
                </tr>

                <tr>
                    <td>
                        <span class="item-name">Benang Jahit Polyester 40</span>
                        <span class="item-code">RM-BN-0104</span>
                    </td>
                    <td>Benang</td>
                    <td class="qty-cell">1.240 cone</td>
                    <td>
                        <span class="bar-track">
                            <span class="bar-fill" style="width:90%;background:var(--success);"></span>
                        </span>
                    </td>
                    <td><span class="badge ok">Aman</span></td>
                </tr>

                <tr>
                    <td>
                        <span class="item-name">Kancing Kemeja 4-Lubang</span>
                        <span class="item-code">RM-AK-0220</span>
                    </td>
                    <td>Aksesoris</td>
                    <td class="qty-cell">0 pcs</td>
                    <td>
                        <span class="bar-track">
                            <span class="bar-fill" style="width:0%;background:var(--danger);"></span>
                        </span>
                    </td>
                    <td><span class="badge out">Habis</span></td>
                </tr>

                <tr>
                    <td>
                        <span class="item-name">Ritsleting YKK 18cm</span>
                        <span class="item-code">RM-AK-0187</span>
                    </td>
                    <td>Aksesoris</td>
                    <td class="qty-cell">312 pcs</td>
                    <td>
                        <span class="bar-track">
                            <span class="bar-fill" style="width:35%;background:var(--warning);"></span>
                        </span>
                    </td>
                    <td><span class="badge low">Menipis</span></td>
                </tr>

                <tr>
                    <td>
                        <span class="item-name">Kain Drill Twill</span>
                        <span class="item-code">RM-KT-0045</span>
                    </td>
                    <td>Kain</td>
                    <td class="qty-cell">560 m</td>
                    <td>
                        <span class="bar-track">
                            <span class="bar-fill" style="width:75%;background:var(--success);"></span>
                        </span>
                    </td>
                    <td><span class="badge ok">Aman</span></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="panel">
        <div class="panel-head">
            <div>
                <h3>Peringatan Stok</h3>
                <div class="hint">Perlu tindakan segera</div>
            </div>
        </div>

        <div class="panel-head panel-head-secondary">
            <div>
                <h4>Kebutuhan MRP Minggu Ini</h4>
            </div>

            <a href="#" class="link-all">
                Detail &rarr;
            </a>
        </div>
      </div>
    </section>

    @extends('layouts.app')

@section('title','Dashboard')

@section('page-title','Dashboard')

@section('breadcrumb')

Dashboard

@endsection

@section('content')

<!-- seluruh isi dashboard -->

@endsection