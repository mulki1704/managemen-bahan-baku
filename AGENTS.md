# AGENTS.md

## Project

**SIKERREL.ID** — raw material management / MRP system (Bahasa Indonesia UI).

Laravel 10 + PHP 8.1, Vite, Tailwind CSS, Alpine.js, Laravel Breeze (auth). MySQL on Laragon (`localhost`). No Docker/Sail.

## Layout

The Laravel app lives in the `laravel/` subdirectory, not at the workspace root. All commands run from there.

## Dev commands

```bash
php artisan serve              # dev server
npm run dev                    # Vite dev server (HMR)
npm run build                  # Vite production build
php artisan migrate            # run migrations
php artisan migrate:fresh --seed  # reset DB + seed 5 role-based users
php artisan test               # PHPUnit (suites: Unit, Feature)
```

No lint or typecheck tools configured.

## Roles

Users have a `role` column. Login page shows role selection cards.

| Role | Seed email | Access |
|---|---|---|
| `super_admin` | superadmin@sikerrel.id | Everything |
| `admin_produksi` | admin.produksi@sikerrel.id | Bahan Baku, BOM, Dashboard |
| `staff_produksi` | staff.produksi@sikerrel.id | Jadwal Produksi, Dashboard |
| `admin_marketing` | admin.marketing@sikerrel.id | Bahan Baku, BOM, Dashboard |
| `staff_marketing` | staff.marketing@sikerrel.id | BOM (read), Dashboard |

All seeded with password: `password`. Login validates role matches the account.

## Architecture

**Routes** (`routes/web.php`): All app routes require `auth` + `verified` middleware.

| Resource | Route prefix | Controller |
|---|---|---|
| Bahan Baku (raw materials) | `/bahan-baku` | `BahanBakuController` |
| Perhitungan BOM (bill of materials) | `/perhitungan-bom` | `PerhitunganBOMController` |
| Jadwal Produksi (production schedule) | `/jadwal-produksi` | `JadwalProduksiController` |

**Models** (`app/Models/`):

- `User` — has `role` field, `ROLES` constant, `role_label` / `initials` accessors.
- `BahanBaku` — table `bahan_bakus`. Fields: kode_bahan (unique), nama_bahan, kategori, satuan, stok, stok_minimum, harga. Has many `PerhitunganBOM`.
- `PerhitunganBOM` — table `perhitungan_bom`. FK `bahan_baku_id` → `bahan_bakus` (cascade). Fields: kode_produk, nama_produk, qty_per_produk, waste, keterangan. Has `total_biaya` accessor.
- `JadwalProduksi` — table `jadwal_produksi`. Fields: kode_jadwal (unique), produk_id (nullable, no FK), qty_produksi, tanggal_mulai, tanggal_selesai, status (enum), catatan.

## CSS architecture

Page-specific CSS loaded via `@vite()` in each Blade view. Base layout styles in `dashboard.css`.

| File | Used by |
|---|---|
| `dashboard.css` | Main layout — sidebar, topbar, shared components |
| `bahan-baku.css` | BahanBaku CRUD, JadwalProduksi pages, Dashboard |
| `bom.css` | PerhitunganBOM CRUD (includes `.info-card`, `.total-highlight`) |
| `auth.css` | Login/Register (split-screen + role selection cards) |
| `app.css` | Tailwind base + font imports |

`vite.config.js` lists all CSS files as inputs.

## Design system

- Navy `#16213A` sidebar, orange/terracotta `#C1652F` accent, paper `#F6F4EF` background
- Fonts: Inter (body), Space Grotesk (headings), JetBrains Mono (labels/badges)
- Role colors: Super Admin (navy), Admin Produksi (orange), Staff Produksi (green), Admin Marketing (blue), Staff Marketing (purple)
- Status badges: `.ok` (green), `.low` (yellow), `.out` (red)
- JadwalProduksi status: Dijadwalkan (blue), Berjalan (orange), Selesai (green), Ditunda (red)