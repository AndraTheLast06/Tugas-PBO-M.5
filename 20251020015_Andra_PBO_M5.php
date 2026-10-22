<?php

// Kontrak objek yang bisa dipinjam.
interface BisaDipinjam
{
    public function pinjam(): bool;
}

// Class induk untuk data umum obat.
abstract class Obat
{
    protected string $nama;
    protected int $stok;

    public function __construct(string $nama, int $stok)
    {
        if (trim($nama) == "" || $stok < 0) {
            throw new InvalidArgumentException("Data obat tidak valid.");
        }
        $this->nama = $nama;
        $this->stok = $stok;
    }

    abstract public function info(): string;

    public function getStok(): int
    {
        return $this->stok;
    }
}

// Obat fisik mengurangi stok saat dipinjam.
class ObatTablet extends Obat implements BisaDipinjam
{
    public function info(): string
    {
        return $this->nama . " - stok: " . $this->stok;
    }

    public function pinjam(): bool
    {
        if ($this->stok == 0) return false;
        $this->stok--;
        return true;
    }
}

// Obat digital tidak mengurangi stok fisik.
class ObatDigital extends Obat implements BisaDipinjam
{
    public function info(): string
    {
        return $this->nama . " - akses digital";
    }

    public function pinjam(): bool
    {
        return true;
    }
}

// Menyimpan dan memproses beberapa objek.
class DaftarPeminjaman
{
    private array $daftar = [];

    public function tambah(BisaDipinjam $obat): void
    {
        $this->daftar[] = $obat;
    }

    public function proses(): void
    {
        foreach ($this->daftar as $obat) {
            echo $obat->pinjam() ? "Peminjaman berhasil" : "Stok habis";
            echo PHP_EOL;
        }
    }
}

// Contoh pengujian.
$obat1 = new ObatTablet("Paracetamol", 2);
$obat2 = new ObatDigital("Panduan Dosis", 0);

echo $obat1->info() . PHP_EOL;
echo $obat2->info() . PHP_EOL;

$peminjaman = new DaftarPeminjaman();
$peminjaman->tambah($obat1);
$peminjaman->tambah($obat2);
$peminjaman->proses();

echo "Sisa stok Paracetamol: " . $obat1->getStok() . PHP_EOL;

?>
