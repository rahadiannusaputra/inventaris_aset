<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InventarisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'id_ruangan' => 1,
            'kode_barang' => $this->faker->numerify,
            'nama_barang' => $this->faker->word,
            'merk_type' => $this->faker->word,
            'bahan' => $this->faker->word,
            'asalusul' => $this->faker->word,
            'merk_type' => $this->faker->word,
            'tahun_perolehan' => $this->faker->year,
            'ukuran' => $this->faker->word,
            'satuan' => $this->faker->word,
            'kondisi' => 'Baik',
            'jumlah' => $this->faker->numerify,
            'harga' => $this->faker->numerify,
            'keterangan' => $this->faker->word,
            
        ];
    }
}
