<?php

interface CrudInterface
{
    public function create(array $data): bool;

    public function read(): array;

    public function update(array $data): bool;

    public function delete(int $key) : bool ;
}

class Kambing implements CrudInterface {

    public function create(array $data): bool
    {
        // tulis untuk insert data ke tabel kambing
    }

    public function read(): array
    {
        // tulis untuk select data dari tabel kambing
    }

    public function update(array $data): bool
    {
        // tulis untuk update data ke tabel kambing
    }

    public function delete(int $key): bool
    {
        // tulis untuk hapus data dari tabel kambing
    }
}

class Sapia implements CrudInterface {

    public function create(array $data): bool
    {
        // tulis untuk insert data ke tabel sapi
    }

    public function read(): array
    {
        // tulis untuk select data dari tabel sapi
    }

    public function update(array $data): bool
    {
        // tulis untuk update data ke tabel sapi
    }

    public function delete(int $key): bool
    {
        // tulis untuk hapus data dari tabel sapi
    }
}


class Sapi {
    private $umur;
    private $berat;
    private $warna;
    private $jenis;

    public function __construct($umur = '', $berat = '', $warna = '', $jenis = '')
    {
        $this->umur  = $umur;
        $this->berat = $berat;
        $this->warna = $warna;
        $this->jenis = $jenis;
    }

    public function data() {
        return [
            'umur' => $this->umur,
            'berat' => $this->berat,
            'warna' => $this->warna,
            'jenis' => $this->jenis
        ];
    }
}

class SapiBuilder {
    private $umur;
    private $berat;
    private $warna;
    private $jenis;

    public function setUmur($umur)
    {
        $this->umur = $umur;
        return $this;
    }

    public function setBerat($berat)
    {
        $this->berat = $berat;
        return $this;
    }

    public function setWarna($warna)
    {
        $this->warna = $warna;
        return $this;
    }

    public function setJenis($jenis)
    {
        $this->jenis = $jenis;
        return $this;
    }

    public function save() {
        return new Sapi($this->umur, $this->berat, $this->warna, $this->jenis);
    }
}

$sapi = (new SapiBuilder())
    ->setUmur(12)
    ->setBerat(440)
    ->setUmur(12)
    ->setJenis("perempuan")
    ->save();

$sapi = (new SapiBuilder())
    ->setUmur(12)
    ->setJenis("perempuan")
    ->setUmur(12)
    ->setBerat(440)
    ->save();

$sapi = (new SapiBuilder())
    ->setUmur(12)
    ->setJenis("perempuan")
    ->save();